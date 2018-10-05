<?php
include 'config.php';
$id=$_GET['id'];
$q="DELETE from request where id=$id";
mysqli_query($conn,$q);
header('location:display.php');
?>