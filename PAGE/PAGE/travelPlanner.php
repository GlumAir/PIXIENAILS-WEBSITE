<?php
    include("../BACKEND/session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
    <link rel="icon" type="image/x-icon" href="../ASSETS/logo/pixienailsLogo.png">
    <link rel="stylesheet" href="../CSS/tripPlanner.css">
</head>
<body>
    
    <!--CHECK PLANNER SUBMIT-->
    <?php if (isset($_SESSION['input-planner-msg'])) : ?>
        <?php if ($_SESSION['input-planner-msg'] == 'success') : ?>
            <script>
                 window.addEventListener("DOMContentLoaded", () => {
                    document.getElementById('resultModal').classList.add('modal-show');
                    document.getElementById('input-msg').textContent = 'ADDED SUCCESFULLY!';
                })
            </script>
        <?php else : ?>
            <script>
                 window.addEventListener("DOMContentLoaded", () => {
                    document.getElementById('resultModal').classList.add('modal-show');
                    document.getElementById('input-msg').textContent = 'FAILED!';
                })
            </script>
        <?php endif; ?>

        <?php unset($_SESSION['input-planner-msg']); ?>
    <?php endif; ?>
    <!---->

    <!--MODAL IF SUCCESFUL OR NOT-->
        <div id="resultModal" class="modal" role="alertdialog" aria-modal="true" aria-labelledby="resultTitle">
            <div class="modal-content">
                <div id="text-result" class="modal-text">
                    <p id="input-msg">Hello</p>
                </div>
                <button id="ok-btn" onclick="document.getElementById('resultModal').classList.remove('modal-show');">OK</button>
            </div>
        </div>
    <!---->

    <!--NAVICATION/HEADER-->
    <div class="header">
         <div class="container header-content">
            <div class="user">
                <img src="../ASSETS/icons/user-icon.png" alt="user-profile">
                <p><?php echo htmlspecialchars($_SESSION["username"]);?></p>
            </div>

            <button id="burger-icon" class="burger"><img src="../ASSETS/icons/burger-icon-white.png" alt="burger-icon"></button>

            <div class="nav-buttons">
                <button class="nav-button " onclick="window.location.href='home.php'">
                    <img src="../ASSETS/icons/home-icon-white.png" alt="home">
                    HOME
                </button>

               
                    <button class="nav-button nav-active" onclick="window.location.href='travelPlanner.php'">
                        <img src="../ASSETS/icons/trip-planner-icon-selected.png" alt="trip planner">
                        BOOK APPOINTMENT
                    </button>
                    
           


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

            <button class="burger-home-btn" onclick="window.location.href='home.php'">
                <img src="../ASSETS/icons/home-icon-white.png" alt="home">
                HOME
            </button>
            
            
            <button class="burger-home-btn nav-active" onclick="window.location.href='travelPlanner.php'">
                    <img src="../ASSETS/icons/trip-planner-icon-selected.png" alt="trip planner">
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
    <div class="main-content-grid">
        <!--SECTION 1-->
        <div class="sec-1 fade-in-box">
            <div class="container sec-1-content">
                <p>BOOK APPOINTMENT</p>
            </div>
        </div>
        <!---->

        <!--SECTION 2-->
        <div class="sec-2">
            <div class="container sec-2-content">
                <p class="sec-2-select-map">CHOOSE YOUR PREFERRED SERVICE BELOW</p>
                
                <form id="trip-form" action="../BACKEND/submitTripPlanner.php" method="POST">
                    <p>1. SCHEDULE</p>
                    <div class="form-destination">
                        <input type="date" style="font-size: 1.5rem;" name ="appointment_date" required>
                    </div>
                    
                    <p>2. SERVICES JUST FOR YOU</p>
                    <p class="subtext">Choose from our most-loved services made for every occasion:</p>
                    <div class="form-activity">
                        <label><input type="checkbox" data-price="300" name="services[]" value="Gel Manicure">Gel Manicure -<span class="service-price"> Php 300 </span></label>
                        <label><input type="checkbox" data-price="350" name="services[]" value="Gel Manicure">BIAB - <span class="service-price">Php 350</span></label>
                        <label><input type="checkbox" data-price="400" name="services[]" value="Softgel Extension">Softgel Extension -<span class="service-price"> Php 400</span></label>
                        <label><input type="checkbox" data-price="100" name="services[]" value="Regular Polish">Regular Polish -<span class="service-price"> Php 100</span></label>
                        <label><input type="checkbox" data-price="150" name="services[]" value="Gel Removal">Gel Removal -<span class="service-price"> Php 150</span></label>
                        <label><input type="checkbox" data-price="250" name="services[]" value="Extension Removal">Extension Removal -<span class="service-price"> 250</span></label>
                        
                    </div>

                    <p>3. ADD-ONS</p>
                    <p class="subtext">Select from our premium add-ons to make your visit even more special.</p>
                    <div class="form-information">
                        <label><input type="checkbox" data-price="10" name="addOns[]" value="Charms">Charms -<span class="service-price"> Php 10</span></label>
                        <label><input type="checkbox" data-price="60" name="addOns[]" value="Embossed Art">Embossed Art -<span class="service-price"> Php 60</span></label>
                        <label><input type="checkbox" data-price="90" name="addOns[]" value="Nail Art">Nail Art -<span class="service-price"> 90</span></label>
                        <label><input type="checkbox" data-price="60" name="addOns[]" value="Ombre">Ombre -<span class="service-price"> Php 60</span></label>
                        <label><input type="checkbox" data-price="70" name="addOns[]" value="Molding Gel">Molding Gel -<span class="service-price"> Php 70</span></label>
                        <label><input type="checkbox" data-price="180" name="addOns[]" value="Cat Eye Polish">Cat Eye Polish -<span class="service-price"> Php 180</span></label>
                    </div>

                     <p>4. TOTAL</p>
                     <p class="subtext">Total amount from selected services.</p>
                     <input type="text" id="total_cost" style="font-size: 2rem; margin-bottom: 1rem; border: none; padding: 0.5rem;" placeholder="PHP 0.00" readonly name="total_price"> 


                    <div class="submit-btn">
                        <button id="submit-btn" type="submit" >SUBMIT</button>
                    </div>
                </form>
            </div>
        </div>
         <!---->
    </div>
        
    <!---->

    <!--SCRIPT-->
    <script type="module" src="../JS/travelPlanner.js" defer></script>
    <!---->
</body>
</html>