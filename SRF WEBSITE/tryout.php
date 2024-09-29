<?php
    $title = 'Join Us';
    $page = 'tryout';
    include_once('navs/navbar.php')
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    <img src="images/office.png" alt="" id="members-page">
    <h1 id="title"><strong>TRYOUT</strong></h1>

    <form action="tryout.php" method="get">
        <div id="sign-form">
            <h2 id="welcome">Welcome to Sacrificials!</h2>
            <div id="list-split">
            <input type="text" name="ign" id="user_info" placeholder="Enter ign" autocomplete="off" required><br>
            <p></p>
            
            <input type="text" name="steam_id" id="user_info"  placeholder="Enter steam id" autocomplete="off" required><br>
            <p></p>

            <input type="text" name="rating" id="user_info"  placeholder="Enter rating" autocomplete="off" required><br>
            <p></p>
            </div>
        </div>
            <div id="list-split2">
            <input type="text" name="main_role" id="user_info"  placeholder="Enter main role" autocomplete="off" required><br>
            <p></p>
            
            <input type="text" name="second_role" id="user_info"  placeholder="Enter second role" autocomplete="off" required><br>
            
            

            <input type="submit" value="SUBMIT" id="signing">
            <input type="submit" name="delete" value="DELETE" id="signing">
            <br><br>
            
        </div>
    </form>
    
    

</body>
</html>

<?php
    
    include("database.php");
    session_start();
    error_reporting(E_ERROR | E_PARSE);

    $userist = $_SESSION["username"];

    #Problems Here Probably
    $sql = "SELECT id FROM users WHERE user = '$userist' OR email ='$userist'";

    $result = mysqli_query($conn, $sql);
    $userid = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    $main_id = $userid['id'];

    $sql = "SELECT * FROM resume WHERE owner_id = '$main_id'";
    $result = mysqli_query($conn, $sql);
    $id_owned = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $ign = $_GET["ign"];
    $steam_id = $_GET["steam_id"];
    $main_role = $_GET["main_role"];
    $second_role = $_GET["second_role"];
    $rating = $_GET["rating"];

    if($_SERVER["REQUEST_METHOD"] == "GET"){
        if(isset($_GET['delete'])){
            $sql = "DELETE FROM resume WHERE owner_id = '$main_id'";
        }
        elseif(empty($main_id)){
            echo"Login first to submit a tryout form";
        }
        elseif($id_owned){
            echo"You already submitted a form";
        }
        elseif(empty($ign)){
            echo"Please enter your IGN";
        }
        elseif(empty($steam_id)){
            echo"Please enter your IGN";
        }
        elseif(empty($main_role)){
            echo"Please enter your main role";
        }
        elseif(empty($second_role)){
            echo"Please enter your second role";
        }
        elseif(empty($rating)){
            echo"Please enter your rating";
        }
        else{
            $sql = "INSERT INTO resume (ign, owner_id, steam_id, main_role, second_role, rating)
            VALUES ('$ign', '$main_id', '$steam_id', '$main_role', '$second_role', '$rating')";

            header('tryout.php');
        }
    }

    mysqli_query($conn, $sql);
    
    mysqli_close($conn);







    
    
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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        table {
            border-collapse: collapse;
            width: 100%;
            color: #d96459;
            font-family: monospace;
            font-size: 25px;
            text-align: left;
            background-color: lightcyan;
        }
        th {
            background-color: #d96459;
            color: white;
        }

    </style>
</head>
<body>

<br><br><br>
    <table>
        <tr>
            <th>IGN</th>
            <th>Main Role</th>
            <th>Second Role</th>
            <th>Rating</th>
        </tr>
        
        <?php
        
            $conn = mysqli_connect("localhost", "root", "", "sacrificialsdb");

            $sql = "SELECT ign, main_role, second_role, rating FROM resume";
            $result = $conn-> query($sql);
        
            if ($result-> num_rows > 0){
                while($row = $result-> fetch_assoc()){
                    echo "<tr><td>". $row["ign"] ."</td><td>". $row["main_role"] ."</td><td>". $row["second_role"] ."</td><td>". $row["rating"] ."</td><tr>";
                }
                echo "</table>";
            }
            else{
                echo "0 result";
            }
            
        ?>
        
    </table>
    <br><br><br>
</body>
</html>


<?php
    include_once("navs/footer.php");
?>
