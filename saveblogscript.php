<?php

$host='localhost';
$user='root';
$pass='mysql';
$dbase='bootcamp_week3';

$conn= new mysqli($host,$user,$pass,$dbase);

$blogId = $_POST["id"];
$message = $_POST["message"];

$sql= "UPDATE blog SET blog = '$message' WHERE ID = $blogId";

header ("location: blogs.php");