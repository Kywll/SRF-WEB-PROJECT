<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
        <h2>Login</h2>
        username/email:<br>
        <input type="text" name="username"><br>
        password:<br>
        <input type="password" name="password"><br>
        <input type="submit" name="login" value="login">
        <br>
    </form>

    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
        <h2>Register</h2>
        username:<br>
        <input type="text" name="username"><br>
        email:<br>
        <input type="text" name="email"><br>
        password:<br>
        <input type="password" name="password"><br>
        confirm password:<br>
        <input type="password" name="confirm_password"><br>
        <input type="submit" name="register" value="register">
        <br>
    </form>

    <form action="index.php">
        <br>
        <button>HOME<br></button>
    </form>
    

</body>
</html>


<?php
    session_start();
    include("database.php");

    

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
        $confirm_password = filter_input(INPUT_POST, "confirm_password", FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);

        $sql = "SELECT * FROM users WHERE user = '$username' OR email = '$username'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        

        if(isset($_POST['login'])){
            if(empty($username)){
                echo"Please enter username or email";
            }
            elseif(empty($password)){
                echo"Please enter a password";
            }
            elseif ($user){
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
        elseif(isset($_POST['register'])){
            if(empty($username)){
                echo"Please enter a username";
            }
            elseif(empty($email)){
                echo"Please enter your email";
            }
            elseif(empty($password)){
                echo"Please enter a password";
            }
            elseif(empty($confirm_password)){
                echo"Please confirm your password";
            }
            elseif($password != $confirm_password){
                echo"Password does not match";
            }
            else{
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO users (user, email, password)
                        VALUES ('$username', '$email', '$hash')";
                try{
                mysqli_query($conn, $sql);
                echo"You are now registered!";
                }
                catch(mysqli_sql_exception){
                    echo"Username is already taken";
                }
            }
        }
    }

    mysqli_close($conn);

?>
