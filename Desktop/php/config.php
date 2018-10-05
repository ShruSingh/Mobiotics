<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="login_sys";

$conn=new mysqli($dbhost,$dbuser,$dbpass,$dbname);
if($conn->connect_error)
{
    die();
}
echo "connected successfully";
?>