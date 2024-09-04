<?php
    $title = 'Home';
    $page = 'home';
    include_once('navbar.php')
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <!--
    <img src="images/aksrf.jpeg" width="325px" alt="125px">
    <h1>MAIN PAGE</h1>
    <br><br><br><br><br><br><br><br><br><br>
    

    <button>HOME<br></button>
    <button>ABOUT<br></button>
    <button>MEMBERS<br></button>
    <form action="tryout.php">
        <button>Join Us<br></button>
    </form>
    <form action="login.php">
        <button>LOGIN<br></button>
    </form>
    <button>LOGOUT<br></button>
    -->


</body>
</html>
    
    
<?php
    session_start();
    include("database.php");
    
?>
