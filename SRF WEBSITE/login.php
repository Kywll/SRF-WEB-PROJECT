<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
        <h2>Registration Form</h2>
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
    session_start();
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
            #Make try and catches or failure conditions soon
            if ($user){
                if(password_verify($password, $user["password"])){
                    $_SESSION["username"] = $username;
                    $_SESSION["password"] = $password;

                    echo "Login Successful<br>";
                    header("Location:index.php");
                    die();
                }
                else{
                    echo "Password incorrect<br>";
                }
            }
            else{
                echo "User not found<br>";
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
