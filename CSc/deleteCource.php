<?php
require 'conn.php';
session_start(); 
if($_SESSION['isLogin'] == true){

}else{
    header("location: login.php");
}
$id=$_GET['deleteId'];

$sql = "DELETE FROM courses WHERE id='$id'";

$conn->query($sql);
    header("location:allCourses.php");
