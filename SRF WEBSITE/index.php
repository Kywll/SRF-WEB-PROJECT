<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
        <h2>Welcome to Sacrificials!</h2>
        username:<br>
        <input type="text" name="username"><br>
        password:<br>
        <input type="password" name="password"><br>
        <input type="submit" name="submit" value="register">
        <br>
    </form>
</body>
</html>


<?php
    include("database.php");
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
    
        if(empty($username)){
            echo"Please enter a username";
        }
        elseif(empty($password)){
            echo"Please enter a password";
        }
        else{
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (user, password)
                    VALUES ('$username', '$hash')";
            try{
            mysqli_query($conn, $sql);
            echo"You are now registered!";
            }
            catch(mysqli_sql_exception){
                echo"Username is already taken";
            }
        }
    }

    mysqli_close($conn);

?>


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







