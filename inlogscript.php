<?php
    session_start();

    ini_set('display_errors',1);
    error_reporting(E_ALL);

    $host='localhost';
    $user='root';
    $pass='mysql';
    $dbase='bootcamp_week3';
        
    $conn= new mysqli($host,$user,$pass,$dbase);

    $username=$_POST["username"];
    $password=$_POST["password"];    

    $query = "SELECT * FROM registreren WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);
        if ($result->num_rows> 0){
            while ($row = $result->fetch_assoc()){
                    $_SESSION ['username'] = $username;
                    echo '<script>';
                    echo 'alert("u bent ingelogd!");';
                    echo 'location.href="index.php"';
                    echo '</script>';             
            }
        }
         else {  
            echo '<script>';
            echo 'alert("gebruikersnaam en of wachtwoord zijn onjuist");';
            echo 'location.href="inlog.php"';
            echo '</script>'; 
            } 

   $conn->close();
?>

