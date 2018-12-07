
<!doctype HTML>
    <html>
        <head>
            <title>Blog website week 5</title>
         <link rel="stylesheet" a href="Stylesheetweek4.css">
        </head>
        <body>
            <?php
            session_start();
        

         if(empty($_SESSION['username'])) 
            {
                echo '<script>';
                echo 'alert("u bent niet ingelogd. Graag eerst registreren of inloggen voordat u verder gaat.");';
                echo 'location.href="welcome.php"';    
                echo '</script>'; 
            $dummy=$_SESSION['username']; 
            } 
            ?>      
            <div class="grid-container">
            <div class="item1">
                <nav>
                    <ul>
                    <li> <a class="active" href=index.php>Home</a></li>
                    <li> <a href="blogplaatsen.php">Blog plaatsen</a></li>
                    <li><a href="blogs.php">Blogs</a></li>
                    <li>
                        <form action="zoekfunctiescript.php" method="post">   
                <input type="text" id="zoekfunctie" name="zoekfunctie" placeholder="zoeken">
                <input type="submit" id="submit" name="zoeken" value=">>">   
                </form></li> 
                <?php echo("$output");?>         
                    </ul>
                </nav>                   
            </div>
            <div class="item2"></div>
            <div class="item3">
                <br>
                <br>
                <br>
                <a href="logout.php" class="button">uitloggen</a><br>
                <br>
                
            </div>
                
            <div class="item4">
                <h1>Welkom "<?php echo $_SESSION ['username']; ?>"</h1>
             <p>Informatie over de gebruiker toevoegen? Wat voor informatie moet hier nog meer komen te staan? 
            Hier onder vind je mijn mailadres deze komt uit mijn database. Ik hoop dat ik daarmee aan de voorwaarden van die 'userstory heb voldaan'.
            
            <?php
            ini_set('display_errors',1);
                error_reporting(E_ALL);

            $host='localhost';
            $user='root';
            $pass='mysql';
            $dbase='bootcamp_week3';
            $conn= new mysqli($host,$user,$pass,$dbase);
                 
//            sql= "SELECT email FROM registreren where username = $_SESSION ['username']";
//            $result1 = mysqli_query($conn,$sql); 
//            echo "mijn email is" $result1;     
            ?> 
            <P>Hieronder kun je selecteren op de verschillende categorieën. Dit zijn de categorieën waarop blogger blogs hebben geschreven. Veel lees plezier! </P>     
            <?php
            ini_set('display_errors',1);
                error_reporting(E_ALL);

            $host='localhost';
            $user='root';
            $pass='mysql';
            $dbase='bootcamp_week3';

            $conn= new mysqli($host,$user,$pass,$dbase);
 
            ?>    
            <form action= "categoriesorteerscript.php" method="post">                 
            <select name="categorie">    
            <?php
            $sql= "SELECT distinct categorie.categorie FROM blog join blog_categorie on blog_categorie.blog_id = blog.id join categorie on blog_categorie.categorie_id = categorie.id";
            $result = mysqli_query($conn,$sql);
            while ($row = mysqli_fetch_row($result)) {
                echo '<option>' . $row[0] . '</option>';
            }   
            ?>               
            
            </select>    
            </form>
                
            <?php
            $conn->close();
            ?> 
            </div>
            <div class="item5"></div>
            <div class="item6"></div>
            <div class="item7">
                 <footer>
                    <br>
                <p align="center"> ©Code Gorilla 2018</p>
            </footer>
            </div>
            </div>
            
        </body>
    
</html>
