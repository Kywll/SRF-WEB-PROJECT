<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="tryout.php" method="post">
        <h2>Welcome to Sacrificials!</h2>
        <label>IGN:</label>
        <input type="text" name="ign"><br>

        <label>Main Role:</label>
        <input type="text" name="main_role"><br>

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
    session_start();

    $userist = $_SESSION["username"];
    echo $_SESSION["username"] . "<br>";
    echo $userist;

    #Problems Here Probably
    $sql = "SELECT id FROM users WHERE user = '$userist'";

    $result = mysqli_query($conn, $sql);
    $userid = mysqli_fetch_array($result, MYSQLI_ASSOC);

    /* 
    $username = "jci";
    $password = "jancedron";
    $hash = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO users (user, password )
            VALUES ('$username', '$hash')";

    try{
        mysqli_query($conn, $sql);
        echo"User is now registered";
    }
    catch(mysqli_sql_exception){
        echo"Could not register user";
    }
    

    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) >  0){
        while ($row = mysqli_fetch_assoc($result)){
            echo $row["id"] . "<br>";
            echo $row["user"] . "<br>";
            echo $row["reg_date"] . "<br>";
        };
    }
    else{
        echo "No user found";
    }

    mysqli_close($conn);
    */

    

    $ign = $_POST["ign"];
    $main_role = $_POST["main_role"];
    $second_role = $_POST["second_role"];
    $rating = $_POST["rating"];

    $sql = "INSERT INTO resume (ign, owner_id, main_role, second_role, rating)
            VALUES ('$ign', '$userid', '$main_role', '$second_role', '$rating')";
    
    mysqli_query($conn, $sql);
    
    mysqli_close($conn);

    

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





