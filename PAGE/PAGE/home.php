<?php
    include("../BACKEND/session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="icon" type="image/x-icon" href="../ASSETS/logo/pixienailsLogo.png">
    <link rel="stylesheet" href="../CSS/home.css">
</head>
<body>
    <!--NAVICATION/HEADER-->
    <div class="header">
         <div class="container header-content">
            <div class="user">
                <img src="../ASSETS/icons/user-icon.png" alt="user-profile">
                <p><?php echo htmlspecialchars($_SESSION["username"]);?></p>
            </div>

            <button id="burger-icon" class="burger"><img src="../ASSETS/icons/burger-icon-white.png" alt="burger-icon"></button>

            <div class="nav-buttons">
                <button class="nav-button nav-active" onclick="window.location.href='home.php'">
                    <img src="../ASSETS/icons/home-icon-selected.png" alt="home">
                    HOME
                </button>

                <div class="nav-planner">
                    <button id="nav-planner-id" class="nav-button" onclick="window.location.href='travelPlanner.php'">
                        <img src="../ASSETS/icons/trip-planner-icon-white.png" alt="trip planner">
                        BOOK APPOINTMENT
                    </button>
                    
                </div>


                <button class="nav-button" onclick="window.location.href='travelLogs.php'">
                    <img src="../ASSETS/icons/travel-logs-icon-white.png" alt="travel logs">
                    APPOINTMENT LOGS
                </button>

                <button class="nav-button" onclick="window.location.href='../BACKEND/logout.php'">
                    <img src="../ASSETS/icons/log-out-icon-white.png" alt="log out" >
                    LOG OUT
                </button>
            </div>
        </div>
    </div>
    <!---->

    <!--BURGER MENU-->
    <div id="burger-menu-id" class="burger-menu">
        <div class="burger-menu-content">
            <button id="close-btn" class="burger-back">
                <img src="../ASSETS/icons/close-button-white.png" alt="back">
            </button>

            <button class="burger-home-btn nav-active" onclick="window.location.href='home.php'">
                <img src="../ASSETS/icons/home-icon-selected.png" alt="home">
                HOME
            </button>

          
                <button class="burger-home-btn" onclick="window.location.href='travelPlanner.php'">
                    <img src="../ASSETS/icons/trip-planner-icon-white.png" alt="trip planner">
                   BOOK APPOINTMENT
                </button>
            
        

            <button class="burger-home-btn" onclick="window.location.href='travelLogs.php'">
                 <img src="../ASSETS/icons/travel-logs-icon-white.png" alt="travel logs">
                APPOINTMENT LOGS
            </button>

            <button class="burger-home-btn" onclick="window.location.href='../BACKEND/logout.php'">
                 <img src="../ASSETS/icons/log-out-icon-white.png" alt="logout">
                LOGOUT
            </button>
        </div>
    </div>
    <!---->

    <!--MAIN CONTENT-->
    <main>
        <!--SECTION 1-->
        <div class="sec-1 fade-in-box">
            <div class="container sec-1-content-grid">
                <p class="grid-sec1 sec-1-txt">July Girly Specials!</p>
                <p class="grid-sec1 sec-1-txt2">PROMO ALERT</p>
                <p class="grid-sec1 sec-1-txt3">
                    Enjoy 10% OFF on all our manicure services and softgel extensions! Treat yourself or a friend—because beautiful nails are always in style. Promo ends until further notice

                </p>
                <button class="active-btn grid-sec1 btn" onclick="window.location.href = 'travelPlanner.php'">BOOK NOW!</button>
            </div>
        </div>
        <!---->

        <!--SECTION 2-->
        <div class="container sec-2-content-grid">
            <p class="grid-sec2 sec-2-title">WELCOME TO PIXIENAILS</p>
            <img class="grid-sec2 sec-2-logo" src="../ASSETS/logo/LOGO-B.png" alt="compass logo">
            <p class="grid-sec2 sec-2-text">
               Welcome to PixieNails — where beauty meets creativity in over a thousand dazzling nail designs. From chic minimalist sets to bold, glittering masterpieces, we’ve got the perfect style waiting just for you. Whether you’re into timeless elegance or trendy statements, your next favorite look starts here. So go ahead, take your pick:
            </p>
        </div>
        <!---->

        <!--SECTION 3-->
        <div class="container sec-3-content-grid">
            <p class="grid-sec3 sec-3-title">HEY GIRL TIPS!</p>
            <div class="grid-sec3 sec-3-about">
                <div class="grid-sec3 sec-3-about-grid">
                    <div class="grid-sec4-item">
                        <p class="grid-sec4-item-title">BIAB (Builder in a Bottle)</p>
                        <p class="grid-sec4-item-txt"> BIAB (Builder in a Bottle) is perfect if you have weak or brittle nails and want to grow them longer with extra strength.</p>
                    </div>

                    <div class="grid-sec4-item">
                        <p class="grid-sec4-item-title">Soft Gel</p>
                        <p class="grid-sec4-item-txt">Soft Gel is ideal for creating extensions with a flexible, natural feel.</p>
                    </div>

                    <div class="grid-sec4-item">
                        <p class="grid-sec4-item-title">Gel Polish</p>
                        <p class="grid-sec4-item-txt">Gel Polish Only works best if you already have healthy, strong nails and just want lasting color and shine.</p>
                    </div>
                </div>
            </div>
            
        </div>
    </main>
    <!---->

    <!--FOOTER-->
    <div class="footer">
        <div class="container footer-content-grid">
            <div class="grid-item footer-text">
                <p>CONTACT US</p>
            </div>

            <div class="grid-item footer-socials">
                <a href="home.php" class="social">
                    <img src="../ASSETS/icons/facebook-icon-white.png" alt="facebook icon">
                </a>

                <a href="home.php" class="social">
                    <img src="../ASSETS/icons/instagram-icon-white.png" alt="instagram icon">
                </a>

                <a href="home.php" class="social">
                    <img src="../ASSETS/icons/twitter-icon-white.png" alt="twitter icon">
                </a>

                <a href="home.php" class="social">
                    <img src="../ASSETS/icons/email-icon-white.png" alt="email icon">
                </a>
            </div>
        </div>
    </div>
    <!---->

    <!--SCRIPT-->
    <script type="module" src="../JS/home.js" defer></script>
    <!---->
</body>
</body>
</html>