<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    
    <img src="images/aksrf.jpeg" width="325px" alt="125px">
    <h1>MAIN PAGE</h1>
    <br><br><br><br><br><br><br><br><br><br>
    
    <form action="tryout.php">
        <button>Join Us<br></button>
    </form>
</body>
</html>
    
    
<?php
    session_start();


    echo $_SESSION["username"] . "<br>";

    
?>
