<!doctype html>
    <html>
        <head>
            <title>inlogscherm</title>
      <link rel="stylesheet" a href=Stylesheetweek4.css>
        </head>
        <body>
            <div class="grid-container">
                <div class="item1"></div>
                <div class="item2"></div>
                <div class="item3">

                </div>
                <div class="item4">
                    <h2> Inlogscherm</h2>
                    <p> Voer u gegevens in om in te loggen.</p>
                    <br>
        
                    <form action="inlogscript.php" method="post">
                        <label for="username">gebruikersnaam</label><br>
                        <input type="text" id="username" name="username" required><br>
                        
                        <label for="wachtwoord">wachtwoord</label><br>
                        <input type="password" id="password" name="password" required><br>
                        <br>
                        <input type="submit" id="verzenden" name="verzenden"><br>
                        <br>
                    </form>
                </div>                               
                <div class="item5"></div>
                <div class="item6"></div>
                <div class="item7"></div>
            </div>
        </body>    
</html>