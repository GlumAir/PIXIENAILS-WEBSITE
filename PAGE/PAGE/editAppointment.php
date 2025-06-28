<?php
    include("../BACKEND/session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Appointment</title>
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
                    document.getElementById('input-msg').textContent = 'EDIT SUCCESSFUL!';
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
                <button id="ok-btn" onclick="document.getElementById('resultModal').classList.remove('modal-show'); window.location.href='travelLogs.php';">OK</button>
            </div>
        </div>
    <!---->

   

    <!--MAIN CONTENT-->
    <div class="main-content-grid">
        <!--SECTION 1-->
        <div class="sec-1 fade-in-box">
            <div class="container sec-1-content">
                <p>EDIT APPOINTMENT</p>
            </div>
        </div>
        <!---->

        <!--SECTION 2-->
        <div class="sec-2">
            <div class="container sec-2-content">
                <p class="sec-2-select-map">CHOOSE YOUR PREFERRED SERVICE BELOW</p>
                
                <form id="trip-form" action="../BACKEND/editAppointment_backend.php" method="POST">
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
                         <input type="hidden" name="appointment-id" value="<?= htmlspecialchars($_GET['appointment-id']) ?>">
                        <button id="submit-btn" type="submit" >SUBMIT</button>
                        <button id="submit-btn" type="button" onclick="window.location.href='travelLogs.php';" style="background-color: red; margin-top: 1rem; color: white;" >CANCEL EDIT</button>
                    </div>
                </form>
            </div>
        </div>
         <!---->
    </div>
        
    <!---->

    <!--SCRIPT-->
    <script src="../JS/editAppointment.js" defer></script>
    <!---->
</body>
</html>