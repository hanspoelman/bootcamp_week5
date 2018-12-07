<?php

    ini_set('display_errors',1);
    error_reporting(E_ALL);

    $host='localhost';
    $user='root';
    $pass='mysql';
    $dbase='bootcamp_week3';
        
    $conn= new mysqli($host,$user,$pass,$dbase);
    
    $output='';

if (isset($_POST['zoekfunctie'])) {
    $zoekfunctie=$_POST['zoekfunctie'];
    
    $zoekfunctie=preg_replace("#[^0-9a-z]#i","",$zoekfunctie);
    $sql= "SELECT * FROM blog WHERE blog LIKE'%$zoekfunctie%' or titel LIKE %$zoekfunctie%";
    $count=mysqli_num_rows($zoekfunctie);
    if($count == 0) {
        $output = 'Er zijn helaas geen resultaten gevonden';
    } else {
        while($row = mysqli_fetch_array($zoekfunctie)) {
            $blog = $row['blog'];
            $titel = $row['titel'];
            
            $output = '<div>'.$blog.''.$titel.'</div>';
        }
        
    }
    
    }

    header('location: index.php');
?>    
