<?php

    ini_set('display_errors',1);
    error_reporting(E_ALL);

    $host='localhost';
    $user='root';
    $pass='mysql';
    $dbase='bootcamp_week3';
        
    $conn= new mysqli($host,$user,$pass,$dbase);

    if ($conn->connect_error){
	die ("Geen verbinding: " . $conn->connect_error);
    }


?>