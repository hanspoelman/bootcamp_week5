<?php
    session_start();

    ini_set('display_errors',1);
    error_reporting(E_ALL);

    $host='localhost';
    $user='root';
    $pass='mysql';
    $dbase='bootcamp_week3';
    
    $conn= new mysqli($host,$user,$pass,$dbase);

    $blog_id = $_GET['blog_id'];
        
    $sql= "SELECT * FROM blog WHERE id = $blog_id ";
    
    $result = mysqli_query($conn,$sql);

    $blog = mysqli_fetch_assoc($result);
    
    ?>

<form action="saveblogscript.php" method="post">
    <input type="hidden" name="id" value="<?php echo $blog["id"]; ?>">
    <input type="text" name="message" value="<?php echo $blog["blog"]; ?>">
    <input type="submit" name="submit">
</form>

<?php
//    echo "<table>";
//     echo "<td>";
//       echo "<tr>" . "ID-Nummer:" . $blog ['id'] . "</tr>" . "<br>";
//       echo "<tr>" . "Blogtitel:" . $blog ['titel'] . "</tr>" . "<br>";
//       echo "<tr>" . "Naam van de auteur:" . $blog ['auteur'] . "</tr>" . "<br>";
//       echo "<tr>" . "het blog:" . $blog ['blog'] . "</tr>" . "<br>";
//       echo "</td>";
//       echo "</table>";
        
//     $blog['Blog']; 
//     $Blognew=$_POST['Blog'];
//     $blog['id']=$_POST['update_id'];
//     $sql= "UPDATE blog SET Blog = '" . $Blognew . "' WHERE ID = " . $blog['id'];
    
//    header ("location: blogs.php");
?>
    
    