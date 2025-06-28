<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORGOT PASSWORD</title>
    <link rel="icon" type="image/x-icon" href="../ASSETS/logo/pixienailsLogo.png"/>
    <link rel="stylesheet" href="../CSS//forgotPassword.css" />
</head>
<body>
     <!--CHECK EMAIL INPUT-->
    <?php if(isset($_SESSION['checked-email-result'])) : ?>
        <?php if($_SESSION['checked-email-result'] == "ok") : ?>
            <script>
                window.addEventListener("DOMContentLoaded", () => {
                    document.getElementById('check-email-id').style.display = "none";
                    document.getElementById('change-pass-id').style.display = "block";
                })
            </script>
        <?php else: ?>
            <script>
                window.addEventListener("DOMContentLoaded", () => {
                    const errMsg = document.getElementById('err-msg');

                    errMsg.textContent = "User not found!";
                    errMsg.style.display = "block";
                })
            </script>
        <?php endif; ?>

        <?php
            unset($_SESSION['checked-email-result']);
        ?>
    <?php endif; ?>

    <!--CREATE NEW PASSWORD-->
    <?php if(isset($_SESSION['password-update'])) : ?>
        <div class="pass-update-msg" id="pass-upadate-msg-id">
            <p><?= $_SESSION['password-update'] ?></p>
            <button onclick="window.location.href='form.php'">OK</button>
        </div>

        <script>
            window.addEventListener("DOMContentLoaded", () => {
                document.getElementById("pass-upadate-msg-id").style.display = "block";
                document.getElementById("check-email-id").style.display = "none";
            })
        </script>

        <?php
            unset($_SESSION['password-update']);
        ?>
    <?php endif; ?>


    <div class="container forgotpass">

        <!--CHECKED EMAAIL-->
        <div class="checked-email" id="check-email-id">
            <h2>FORGOT PASSWORD</h2>

            <form class="checked-email-form" action="../BACKEND/forgotCheckedEmail.php" method="POST" autocomplete="off">
                <div class="input-box">
                    <label for="check-email">Enter your email address</label>
                    <input type="email" name="check-email" id="check-email" required>
                </div>

                <div class="error-msg" id="err-msg">User not found!</div>
                <button type="submit" class="submit-btn" id="check-email-btn">OK</button>
                <button type="button" class="submit-btn" onclick="window.location.href='form.php'">BACK</button>
            </form>
        </div>

        <!--CHANGE PASS-->
        <div class="change-pass" id="change-pass-id">
            <h2>FORGOT PASSWORD</h2>

            <form class="change-pass-form" action="../BACKEND/forgotCreateNewPass.php" method="POST" autocomplete="off">
                <div class="input-box">
                    <label for="new-pass">Create New Password</label>
                    <input type="password" name="new-pass" id="new-pass" pattern="^(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{6,}$" title="*Must contain 1 special character and at least 6 character long" required/>
                    <button type="button" onclick="seePassword('new-pass')">
                        <img id="new-pass-icon" src="../ASSETS/icons/see-pass-close-white.png" alt="see password"/>
                    </button>
                </div>

                <div class="input-box">
                    <label for="confirm-new-pass">Confirm New Password</label>
                    <input type="password" name="confirm-new-pass" id="confirm-new-pass" required/>
                    <button type="button" onclick="seePassword('confirm-new-pass')">
                        <img id="confirm-new-pass-icon" src="../ASSETS/icons/see-pass-close-white.png" alt="see password"/>
                    </button>
                </div>

                <div class="error-msg-confirm-pass" id="err-msg-confirm-pass"></div>
                <button type="submit" class="submit-btn" id="submit-btn-create-pass">CREATE</button>
            </form>
        </div>
    </div>

    <script src="../JS/forgotPass.js" defer></script>
</body>
</html>