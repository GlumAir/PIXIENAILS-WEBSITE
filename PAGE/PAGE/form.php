<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PixieNails</title>
    <link rel="icon" type="image/x-icon" href="../ASSETS/logo/pixienailsLogo.png"/>
    <link rel="stylesheet" href="../CSS/form.css" />
  </head>
  <body onload="activateFormOnLoad()">

    <!--CHECK FOR THE LOGIN ATTEMPTS-->
    <?php if (isset($_SESSION['login-error-msg'])) : ?>
      <?php if ($_SESSION['login-attempt'] >= $_SESSION['max-attempt']) : ?>
        <script>
          localStorage.setItem('login-lockdown', 'true');
          localStorage.setItem('lock-until', Date.now() + 30000);
        </script>

        <?php
        unset($_SESSION['login-attempt']);
        unset($_SESSION['max-attempt']);
        ?>
      <?php endif; ?>

      <div class="login-message" id="login-message-stat">
        <p><?= $_SESSION['login-error-msg'] ?></p>
        <button onclick="window.location.href='form.php'">OK</button>
      </div>
      
      <script>
        window.addEventListener("DOMContentLoaded", () => {
          document.getElementById("login-message-stat").style.display = "block";
          document.getElementById("loginForm").style.display = "none";
        })
      </script>
      
      <?php
        unset($_SESSION['login-error-msg']);
       ?>
    <?php endif; ?>

    <!--CHECK FOR THE REGISTRATION AFTER SIGNING UP-->
    <?php if (isset($_SESSION['registration_status'])) : ?>
      
      <div class="registration-message" id="registration-stat">
        <p><?= $_SESSION['registration_status_msg'] ?></p>
        <button onclick="window.location.href='form.php'">OK</button>
      </div>

      <script>
        window.addEventListener("DOMContentLoaded", () => {
          document.getElementById("registration-stat").style.display = "block";
          document.getElementById("loginForm").style.display = "none";
        })
      </script>

      <?php
        unset($_SESSION['registration_status_msg']);
        unset($_SESSION['registration_status']);
      ?>
    <?php endif; ?>
    <!---->


    <!--LOGIN-->
    <div id="loginForm" class="form active">
      <div class="container login-form">
        <div class="login-grid">
          <div class="login-grid-item form-pic">
            <img src="../ASSETS/image/form_bg.png" alt="form bg" />
          </div>
          <div class="login-grid-item form-content">
            <p class="login-txt">
              Log <span style="color: var(--color-primary-4)">in</span>
            </p>

            <form action="../BACKEND/logindb.php" method="POST" autocomplete="off">
              <div class="input-box">
                <label for="username/email">Username/Email</label>
                <input type="text" name="username/email" id="username/email" placeholder="username" required/>
              </div>

              <div class="input-box">
                <label for="passlogin">Password</label>
                <input type="password" name="passlogin" id="passlogin" placeholder="password" required/>
                <button type="button" onclick="seePassword('passlogin')">
                  <img id="passlogin-icon" src="../ASSETS/icons/see-pass-close-white.png" alt="see password"/>
                </button>
              </div>

              <div id="login-attempt-msg">
                <p>Too much attempt. Try again after 30s</p>
              </div>

              <div class="forgot-link">
                <a href="forgotPassword.php">Forgot Password?</a>
              </div>

              <button id="login-button" type="submit" class="btn-login">Login</button>
            </form>

            <button class="back" onclick="window.location.href='../index.html'">
              <img src="../ASSETS/icons/close-button-white.png" alt="back button"/>
            </button>

            <div class="sign-up-link-desktop">
              <span>Dont have an account yet?</span>
              <button class="showSignup">Sign Up</button>
            </div>
          </div>
        </div>

        <div class="container sign-up-link-mobile">
          <span>Dont have an account yet?</span>
          <button class="showSignup">Sign Up</button>
        </div>
      </div>
    </div>
    <!---->

    <!--SIGNUP-->
    <div id="signupForm" class="form">

      <div class="container signup-form">

        <div class="signup-grid">

          <div class="signup-grid-item form-pic-signup item1">
            <img src="../ASSETS/image/ABOUT_US.png" alt="form bg" />
          </div>

          <div class="signup-grid-item form-content-signup item2">
            <p class="signup-txt">Sign <span style="color: var(--color-primary-4)">Up</span></p>

            <div class="login-link-mobile">
              <span>Already have an account??</span>
              <button id="showLogin">Log in</button>
            </div>

            <form id="signup" action="../BACKEND/signupdb.php" method="POST" autocomplete="off">
              <div class="input-field">

                <div class="input-box">
                  <label for="firstname">First name</label>
                  <input type="text" name="firstname" id="firstname" required/>
                </div>

                <div class="input-box">
                  <label for="middlename">Middle name</label>
                  <input type="text" name="middlename" id="middlename" placeholder="*Optional"/>
                </div>

                <div class="input-box">
                  <label for="lastname">Last name</label>
                  <input type="text" name="lastname" id="lastname" required/>
                </div>

                <div class="input-box">
                  <label for="username">Username</label>
                  <input type="text" name="username" id="username" pattern="^@.+" title="Username must start with @" required/>
                  <p>*Username must start at @</p>
                  <p id="username-error-msg" style="display: none; color: var(--color-error); opacity: 1;"></p>
                </div>

                <div class="input-box">
                  <label for="email">Email</label>
                  <input type="email" name="email" id="email" placeholder="*email@gmail.com" required/>
                  <p id="email-error-msg" style="display: none; color: var(--color-error); opacity: 1;"></p>
                </div>

                <div class="input-box">
                  <label for="pass">Password</label>
                  <input type="password" name="pass" id="pass" pattern="^(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{6,}$" title="*Must contain 1 special character and at least 6 character long" required/>
                  <p>*Must contain 1 special character and at least 6 character long</p>
                  <button type="button" id="toggle-password" onclick="seePassword('pass')">
                    <img id="pass-icon" src="../ASSETS/icons/see-pass-close-white.png" alt="see/unsee password"/>
                  </button>
                </div>

                <div class="input-box">
                  <label for="confirmpass">Confirm Password</label>
                  <input type="password" name="confirmpass" id="confirmpass" required/>
                  <p id="confirm-pass-error-msg" style="display: none; color: var(--color-error); opacity: 1;"></p>
                  <button type="button" id="toggle-confirm-password" onclick="seePassword('confirmpass')">
                    <img id="confirmpass-icon"  src="../ASSETS/icons/see-pass-close-white.png" alt="see/unsee password"/>
                  </button>
                </div>

                <div class="input-box">
                  <label for="cellnum">Phone number</label>
                  <input type="text" name="cellnum" id="cellnum" placeholder="+63**********" pattern="^\+?\d{12}$" title="*Please follow the given format ex. +63**********" required/>
                  <p>*Phone number must start with +</p>
                </div>

              </div>

              <div class="agreement">
                <input type="checkbox" name="agreement" id="agreement" required/>
                <label for="agreement"> I agree to the
                  <a href="TaC.html" target="_blank">Terms and Condition</a> and
                  <a href="PrivacyPolicy.html" target="_blank">Privacy Policy</a>
                </label>
              </div>

              <button id="submit-btn" type="submit" class="btn-signin">Sign Up</button>
            </form>

            <button class="back" onclick="window,location.href='../index.html'">
              <img src="../ASSETS/icons/close-button-white.png" alt="back button"/>
            </button>
          </div>
        </div>
      </div>
    </div>
    <!---->


    <!--SCRIPT-->
    <script type="module" src="../JS/form.js" defer></script>
    <!---->
  </body>
</html>
