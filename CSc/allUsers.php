<?php
require 'conn.php';
session_start(); 
$sql = "SELECT * FROM users ";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

# code...

?>
<?php




foreach ($rows as  $value) :

    if ($value['email'] == $_SESSION['email']) {
    } else {
?>
        <tr>
            <td><?php echo $value['id'] ?></td>
            <td><?php echo $value['fname'] ?></td>
            <td><?php echo $value['lname'] ?></td>
            <td><?php echo $value['email'] ?></td>
            <td><?php echo $value['address'] ?></td>
            <td><?php echo $value['gender'] ?></td>
            <?php if($value['activation']==1){ ?>
            <td>Active</td>
            <?php } else {?>
                <td>Not Active</td>
                <?php }?>
            <td>
                <form action="activation.php" method="post" style="display: inline-block;">
                    <input type="hidden" name="active" value="<?php echo $value["activation"] ?>">
                    <input type="hidden" name="id" value="<?php echo $value["id"] ?>">
                    <button type="submit" class="btn btn-sm btn-info">Activate</button>
                </form>
            </td>
            <td>

            <form action="singleUserMark.php" method="post" style="display: inline-block;">
                  
                    <input type="hidden" name="id" value="<?php echo $value["id"] ?>">
                    <button type="submit" class="btn btn-sm btn-info">Marks</button>
                </form>
            </td>
            <td>
                <form action="edit.php" method="GET" style="display: inline-block;">
                    <input type="hidden" name="id" value="<?php echo $value["id"] ?>">
                    <button type="submit" class="btn btn-sm btn-primary">Edit</button>
                </form>
              

                   
                    <button type="button" class="btn btn-sm btn-danger" onclick="deletuser(<?php echo $value['id'] ?>)">Delete</button>
                
            </td>
<!-- <td><button type="button" class="btn btn-primary" onclick="deletuser(<?php echo $value['id'] ?>)"  >Button</button></td> -->


        </tr>
<?php }
endforeach; ?>
<?php


mysqli_close($conn);
?>