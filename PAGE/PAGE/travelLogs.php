<?php
    include("../BACKEND/session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Logs</title>
    <link rel="icon" type="image/x-icon" href="../ASSETS/logo/pixienailsLogo.png">
    <link rel="stylesheet" href="../CSS/travelLogs.css">
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
                <button class="nav-button" onclick="window.location.href='home.php'">
                    <img src="../ASSETS/icons/home-icon-white.png" alt="home">
                    HOME
                </button>

               <div class="nav-planner">
                    <button id="nav-planner-id" class="nav-button" onclick="window.location.href='travelPlanner.php'">
                        <img src="../ASSETS/icons/trip-planner-icon-white.png" alt="trip planner">
                        BOOK APPOINTMENT
                    </button>
                    
                </div>


                <button class="nav-button nav-active" onclick="window.location.href='travelLogs.php'">
                    <img src="../ASSETS/icons/travel-logs-icon-selected.png" alt="travel logs">
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

            <button class="burger-home-btn" onclick="window.location.href='home.php'">
                <img src="../ASSETS/icons/home-icon-white.png" alt="home">
                HOME
            </button>

             <button class="burger-home-btn" onclick="window.location.href='travelPlanner.php'">
                    <img src="../ASSETS/icons/trip-planner-icon-white.png" alt="trip planner">
                    BOOK APPOINTMENT 
                </button>
        

            <button class="burger-home-btn nav-active" onclick="window.location.href='travelLogs.php'">
                 <img src="../ASSETS/icons/travel-logs-icon-selected.png" alt="travel logs">
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
        <div class="container sec-1">
            <p>APPOINTMENT LOGS</p>
        </div>
        <!---->

        <!--SECTION 3-->

        <?php

            include("../BACKEND/displayLogs.php");
        
        ?>

    </main>
    <!---->



    <!--SCRIPT-->
    <script type="module" src="../JS/travelLogs.js" defer></script>
    <!---->
    
</body>
</html>