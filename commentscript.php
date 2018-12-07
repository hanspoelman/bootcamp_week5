<?php
    session_start();

    ini_set('display_errors',1);
    error_reporting(E_ALL);

    $host='localhost';
    $user='root';
    $pass='mysql';
    $dbase='bootcamp_week3';
    
    $conn= new mysqli($host,$user,$pass,$dbase);

    $comment=$_POST['comment'];
    $auteur=$_POST['auteur'];
    $blog_id=$_POST['blog_id'];
    $id_verbergen=$_POST['id_verbergen'];

    $sql = "INSERT INTO comment (comment,auteur,blog_id,id_verbergen) VALUES (?,?,?,?)";

    if ($stmt=$conn->prepare($sql)) {
        $stmt->bind_param("ssss", $mycomment, $myauteur, $myblog_id, $myid_verbergen);
        $mycomment=$comment;
        $myauteur=$auteur;
        $myblog_id=$blog_id;
        $myid_verbergen=$id_verbergen;
        
        $stmt->execute();
    }

   header('location: blogs.php');
?>