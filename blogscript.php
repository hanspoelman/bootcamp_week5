<?php

//  verbinding maken en gegevens opslaan
    ini_set('display_errors',1);
    error_reporting(E_ALL);

    $host='localhost';
    $user='root';
    $pass='mysql';
    $dbase='bootcamp_week3';
        
    $conn= new mysqli($host,$user,$pass,$dbase);
    $titel=$_POST['titel'];
    $auteur=$_POST['auteur'];
    $blog=$_POST['blog'];

//  Blog versturen
      
    $sql = "INSERT INTO blog (titel,auteur,blog) VALUES (?,?,?)";

    if ($stmt=$conn->prepare($sql)) {
        $stmt->bind_param("sss", $mytitel, $myauteur, $myblog);
        $mytitel=$titel;
        $myauteur=$auteur;
        $myblog=$blog;
        
        $stmt->execute();
    }

//  Nieuwe categorie aanmaken

    $nieuwe_categorie=$_POST['nieuwe_categorie'];
    if (isset($nieuwe_categorie))0;{
        
    } 

    $sql = "INSERT INTO categorie (categorie) VALUES (?)";

    if ($stmt=$conn->prepare($sql)) {
        $stmt->bind_param("s", $mynieuwe_categorie);
        $mynieuwe_categorie=$nieuwe_categorie;
        
        $stmt->execute();
    }

//   Aangemaakte blog_id opvragen

    $sql = "SELECT id FROM blog order by id DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $blogid = mysqli_fetch_row($result)[0]; 


//  Blog_id en categorie_id versturen naar combinatietabel

    $categorie_id=$_POST['categorie_id'];
    

    $sql = "INSERT INTO blog_categorie (blog_id,categorie_id) VALUES (?,?)";
                          
    for ($i=0; $i<count ($categorie_id); $i++) {
            
    if ($stmt=$conn->prepare($sql)) {      
        $stmt->bind_param("ii", $myblogid, $mycategorie_id);
        $mycategorie_id=$categorie_id[$i];
        $myblogid=$blogid; 
            
        $stmt->execute();      
            }
        }
            
//  Na het plaatsen van de blogs ga je naar de blogpagina        
    header("location: blogs.php");
   

    $conn->close();
?>
