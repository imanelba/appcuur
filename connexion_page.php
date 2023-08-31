<?php

include "connexion_datapass.php";
include "con_database.php";

session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" type="text/css" href="conexion_style.css">
    
    <title>connexion</title>
</head>
<body >

    <div class="formu">

        <form  action="connexion_datapass.php" method="post" >
           
            <h1 class="a">Welcome  </h1>

            <label id="i" for="email">Email</label><br>
           
            <input id="t" type="email" id="em" name="em"><br><br>

            <label id="i" for="password">Password</label><br>
            
            <input id="t" type="text" id="pass" name="pass"><br><br>

            <input id="t" class="b" type="submit" name="submit" value="Go">
          
        </form>
     </div> 
    
</body>
</html>