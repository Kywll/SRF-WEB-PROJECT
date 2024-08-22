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
        <input type="submit" name="login" value="login">
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

        $sql = "SELECT * FROM users WHERE user = '$username'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);


        if(empty($username)){
            echo"Please enter a username";
        }
        elseif(empty($password)){
            echo"Please enter a password";
        }
        elseif(isset($_POST['login'])){
            if ($user){
                echo "Login Successful<br>";
                header("Location:index.php");;
                /*
                if(passowrd_verify($password, $user["password"])){
                }
                */
            }
            else{
                echo "Login Failed<br>";
            }
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