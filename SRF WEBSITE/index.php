<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="get">
        <label>IGN:</label>
        <input type="text" name="ign"><br>
        <label>Role:</label>
        <input type="text" name="role"><br>
        <label>Second Role:</label>
        <input type="text" name="second_role"><br>
        <label>Rating:</label>
        <input type="text" name="rating"><br>
        <input type="submit" value="sumbit">
        <br>
    </form>

</body>
</html>


<?php
    include("database.php");

    $ign = $_GET["ign"];
    $role = $_GET["role"];
    $rating = $_GET["rating"];
    $second_role = $_GET["second_role"];


    echo "IGN: {$ign}<br>";
    echo "Role: {$role}<br>";
    echo "Second Role: {$second_role}<br>";
    echo "Rank: {$rating}<br>";
    

    /* 
    $name = "Hyztt";
    $email = "fake@gmail.com";

    $age = 19;
    $inventory = 4.99;

    echo"MGA <br>";
    echo"ETITS <br>";
   
    echo"Hello {$name}<br>";
    echo"Your email is {$email}<br>";
    echo"You are {$age} years old<br>";
    echo"Your inventory is worth \${$inventory} dollars<br>";
    
    //No comment
    /*  Still
        No
        Comment*/
        
    

?>







