

<!doctype html>
    <html>
        <head>
         <title>blogs</title>
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
            } 
            ?>
            <div class="grid-container">
                <div class="item1">
                  <nav>
                    <ul>
                     <li> <a class="active" href=index.php>Home</a></li>
                     <li> <a href="blogplaatsen.php">Blog plaatsen</a></li>
                     <li><a href="blogs.php">Blogs</a></li>
                    </ul>
                </nav>
                </div>
                <div class="item2"></div>
                <div class="item3">
                <br>
                <?php echo $_SESSION ['username']; ?> 
                <br>
                <br>
                <a href="logout.php" class="button">uitloggen</a><br>
                <br>
                
            </div>
                <div class="item4">
                    
                    
                <?php
                ini_set('display_errors',1);
                error_reporting(E_ALL);

                $host='localhost';
                $user='root';
                $pass='mysql';
                $dbase='bootcamp_week3';

                $conn= new mysqli($host,$user,$pass,$dbase);

                $sql= "SELECT * FROM blog post ORDER BY id DESC";
                $result = mysqli_query($conn,$sql);
                    
                while ($row = mysqli_fetch_row($result))    
                { 
                echo "<div class='blog'>";
                echo "<strong>";    
                echo $row[1]. "</strong><br>"; 
                echo "<br>"; 
                echo $row[4]. "<br>";
                echo "<br>";
                echo $row[2]. "<br><i>";
                echo $row[5]. "<br></i>";
                echo "<br>";
                echo "<form action='deletescript.php' method='post'>";
                echo "<input type='hidden' name='blog_id' value='$row[0]'>";
                echo "<input type='submit' id='delete' name='delete' value='DELETE'>";
                echo "</form>";
                echo "<form>";
                ?>
                    
                <form action='editscript.php' method='post'>
                <input type='hidden' name='blog_id' value='<?php echo $row[0]?>'>
                <input type='hidden' name='blog' value='<?php echo $row[4]?>'>    
                <input type='submit' id='submit' name='submit' value='EDIT'>
                <a href='editscript.php?blog_id=<?php echo $row[0] ?>'>Edit</a>
                 </form>
                <?php
                echo "<HR WIDTH='100%' ALIGN='right'>";
                echo "<strong>Bedankt voor het lezen van dit blog. Hier onder kunt u uw mening geven</strong>.";
                echo "<br>";    
                echo "<form action='commentscript.php' method='post'>";
                echo "<input type='text1' id='comment' name='comment'>";    
                $dummy=$_SESSION['username'];
                echo "<input type='hidden' name='auteur' value='$dummy'>"; 
                echo "<br>";    
                echo "<input type='hidden' name='blog_id' value='$row[0]'>";
                echo "<input type='radio' name='id_verbergen' value='0'> naam zichtbaar";
                echo "<br>";    
                echo "<input type='radio' name='id_verbergen' value='1'> naam onzichtbaar"; 
                echo "<br>";    
                echo "<input type='submit' id='submit' name='submit' value='COMMENT'>";    
                echo "</form>";
                echo "<br>";
           
                $sql= "SELECT comment,auteur,id_verbergen FROM comment WHERE blog_id=$row[0]";    
                $result1 = mysqli_query($conn,$sql);     
                    
                while ($row1 = mysqli_fetch_assoc($result1)){   
                if ($row1['id_verbergen']==0) {
                    echo $row1["comment"]." ".$row1["auteur"]."<br>";
                } else { 
                    echo $row1["comment"]." ". "auteur anoniem"."<br>";
                } 
                }
      
                echo "</div>"; 
                }
                    
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