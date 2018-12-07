<?php
    session_start();

    ini_set('display_errors',1);
    error_reporting(E_ALL);

    $host='localhost';
    $user='root';
    $pass='mysql';
    $dbase='bootcamp_week3';

    $conn= new mysqli($host,$user,$pass,$dbase);

    $blog_id=$_POST['blog_id'];    

    $sql= "DELETE FROM blog_categorie WHERE blog_id = $blog_id";
    $result = mysqli_query($conn,$sql);
    $sql1= "DELETE FROM blog WHERE id = $blog_id";
    $result = mysqli_query($conn,$sql1);
  
    header ('location: blogs.php');
?>