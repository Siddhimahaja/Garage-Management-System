<?php
if(isset($_GET["c_id"])){
    $c_id=$_GET["c_id"];
    

$servername="localhost:3307";
$username="root";
$password="";
$database="gms";
//create connection

$connection = new mysqli($servername,$username,$password,$database);

$sql="DELETE FROM customer WHERE c_id=$c_id";
$connection->query($sql);

}

header("location:/sid/customer.php");
?>