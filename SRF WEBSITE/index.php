<?php
    $title = 'Home';
    $page = 'home';
    include_once('navs/navbar.php');
    
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

    <img src="images/fazelogo.png" alt="" id="cs2page">
    <div id="home-info">
        
        <h1><stron>We are a group of CS2 players who is looking to be the best team in the world!</strong></h1>
        <h3>We hope to achieve that while still enjoying the game and helping each other grow as a team</h3>

    </div>
    
    <img src="images/srflogo.png" alt="" id="srflogo">
    <div id="infosection">
        <h2>Info About SRF</h2>
        <p>Sacrificials is a team of dedicated CS2 players who came together as online friends through our shared love for the game. Our squad is all about blending competition with enjoyment, striving to excel while keeping the fun alive. Whether we're executing a perfect strategy or sharing a laugh over a well-timed joke, our bond and passion for the game drive us forward. Join us on our journey as we push our limits and celebrate the camaraderie that makes every match memorable.</p>
    </div>
    <br><br><br>
    
    <div id="founding-members">
        <h1>Founding Members:</h1>

        <div id="members">
            <h2>Jci</h2>
            <img src="images/JC_PROFILE.jpg" alt="" id="profile-jci">
            <p id="jci-text">Rifler of SRF</p>
        </div>

        <div id="members">
            <h2>Jasteen</h2>
            <img src="images/jasteen.jpg" alt="" id="profile-jasteen">
            <p>Awper of SRF</p>
        </div>

        <div id="members">
            <h2>Hyztt</h2>
            <img src="images/hyztt.jpg" alt="" id="profile-hyztt">
            <p>IGL of SRF</p>

        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>
        <img src="images/reqruit.jpeg" alt="" id="office">
        <div id="join-us">
            <h1>Be a Part of our Team</h1>
            <p>
            We're a small, dynamic team led by gamers, and we're looking for passionate players to join us. Enjoy a collaborative environment where your voice and contributions matter. If you're enthusiastic about gaming and ready to make an impact, we'd love to hear from you.
            </p>
            <br>
            <form action="tryout.php">
                <button>Join Now</button>
            </form>
            <br>
        </div>
    </div>



</body>
</html>

<?php
    include_once('navs/footer.php');
?>
    
<?php
    
    include("database.php");
    

?>
