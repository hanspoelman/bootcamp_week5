
<!doctype HTML>
    <html>
        <head>
            <title>Blog website week4</title>
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
                <h1>Welkom op mijn blogsite!</h1>
                <p>Leuk dat je een blog wilt plaatsen op mijn blogsite. Voordat je een blog gaat plaatsen wil ik wel graag weten wie je bent.<br>
                    Vul je gegevens. Succes met plaatsen en bedankt voor je medewerking.</p>
                <h2> Hieronder kun je een blogplaatsen!</h2>
            <header>
            </header>
                    <form action="blogscript.php" method="post"> 
                        <label for="titel"> Titel</label><br>
                        <input type="text" id="titel" name="titel" required><br>
                    
                        <label for="auteur"> Auteur</label><br>
                        <input type="<?php $_SESSION ['username']?>"  id="auteur" name="auteur" required><br>
                        
<!--                        <label for="email">e-mail</label><br>-->
<!--                        <input type="email" id=email name="email" required><br>    -->
                        
                        <div class="tabel">
                        <label for="categorie">categorie</label><br>
                        <table style="border: 1px solid grey;"><br>
                        
                        <?php
                        $host='localhost';
                        $user='root';
                        $pass='mysql';
                        $dbase='bootcamp_week3';
        
                        $conn= new mysqli($host,$user,$pass,$dbase);
                        
                        $sql= "SELECT * FROM categorie";
                        $result = mysqli_query($conn, $sql);
                        
                        while ($row = mysqli_fetch_row($result)) {   
                        
                        echo '<tr><td>';
                        echo '<input type ="checkbox" name= "categorie_id[]" value=' . $row[0] . '>';       echo '</td>';
                            foreach ($row as $key => $value)
                            echo '<td>'.htmlspecialchars($value).'</td>';  echo '</tr>'; 
                        }
                        ?>
                        </table>
                        </div>    
                        <br> 
                        <label for="categorie_toevoegen"> Categorie toevoegen</label><br>
                        <input type="text" id="niewe_categorie" name="nieuwe_categorie"><br>
                                      
                        <label for="blog">Blog</label><br> 
                        <textarea id="blog" name="blog" required>
                        </textarea> <br>
                        <label for="verzenden"></label><br>
                        <input type="submit" id="verzenden" name="verzenden"><br>
                        <br>
                      
                    </form>  
                
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
<!--             <script src="ckeditor.js"></script>-->
            <script>
//                ClassicEditor
//                    .create( document.querySelector( '#blog' ) )
//                    .catch( error => {
//                    console.error( error );
//               } );

            </script>
    
            
        </body>
        
     
</html>