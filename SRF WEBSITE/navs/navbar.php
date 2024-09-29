<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> | Hyztt</title>
    <link rel="stylesheet" href="css/navbar.css" type="text/css">
</head>
<body>

    <div class="vetical-menu" align="center">
        <nav class="navbar">
            
            <ul>
                <img src="images/aksrf.jpeg" alt="">
                <h2>SACRIFICIALS</h2>

                <li><a href="login.php" class="<?php if ($page == 'home'){echo 'active';}?>">LOGIN</a></li>
                <li><a href="tryout.php" class="<?php if ($page == 'home'){echo 'active';}?>">JOIN US</a></li>
                <li><a href="members.php" class="<?php if ($page == 'home'){echo 'active';}?>">MEMBERS</a></li>
                <li><a href="about.php" class="<?php if ($page == 'about'){echo 'active';}?>">ABOUT</a></li>
                <li><a href="index.php" class="<?php if ($page == 'home'){echo 'active';}?>">HOME</a></li>

            </ul>
        </nav>
    </div>


</body>
</html>
