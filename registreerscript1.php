<?php

    ini_set('display_errors',1);
    error_reporting(E_ALL);

    $host='localhost';
    $user='root';
    $pass='mysql';
    $dbase='bootcamp_week3';
        
    $conn= new mysqli($host,$user,$pass,$dbase);

    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $schrijver=$_POST['schrijver'];

    $sql = "INSERT INTO registreren (username,password,email,schrijver) VALUES (?,?,?,?)";
        
    if ($stmt=$conn->prepare($sql)) {
        $stmt->bind_param("ssss", $myusername, $mypassword, $myemail, $myschrijver);
        $myusername=$username;
        $mypassword=$password;
        $myemail=$email;
        $myschrijver=$schrijver;
        
        $stmt->execute();
        
    header("location: inlog.php");
    } 
    $conn->close();
?>        