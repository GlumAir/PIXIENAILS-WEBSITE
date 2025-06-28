import { checkAccountAvailability } from "./checkAccountAvailability.js";

const loginForm = document.getElementById('loginForm');
const signupForm = document.getElementById('signupForm');
const submitBtn = document.getElementById('submit-btn');

const emailField = document.getElementById('email');
const usernameField = document.getElementById('username');

const emailErr = document.getElementById('email-error-msg');
const usernameErr = document.getElementById('username-error-msg');
const errorMsg = document.getElementById('confirm-pass-error-msg');




window.activateFormOnLoad = function() {
    
    const type = localStorage.getItem('formType');

    if (type === 'signup') {
        signupForm.classList.add('active');
        loginForm.classList.remove('active');
    }
    else {
        signupForm.classList.remove('active');
        loginForm.classList.add('active');
    }

    localStorage.removeItem('formType');

    const isLocked = localStorage.getItem('login-lockdown') == 'true';
    const lockUntil = localStorage.getItem('lock-until');

    if (isLocked && Date.now() < lockUntil) {
        const loginAttemptMsg = document.getElementById('login-attempt-msg');
        const button = document.getElementById('login-button')
        let countdown = Math.floor((lockUntil - Date.now()) / 1000);
        button.disabled = true;
        loginAttemptMsg.style.display = "block";

        const timer = setInterval(() => {
            countdown--;
            button.textContent = countdown;

            if(countdown <= 0){
                clearInterval(timer);
                button.textContent = "Login";
                loginAttemptMsg.style.display = "none";
                button.disabled = false;
                localStorage.removeItem('login-lockdown');
                localStorage.removeItem('lock-until');
            }
        }, 1000);
    }
}


//to see and unsee password
window.seePassword = function(id) {
    const passField = document.getElementById(id);
    const passIcon = document.getElementById(`${id}-icon`);

    if (passField.type === "password") {
        passField.type = 'text';
        passIcon.src = "../ASSETS/icons/see-pass-open-white.png";
    }
    else {
        passField.type = 'password';
        passIcon.src = "../ASSETS/icons/see-pass-close-white.png";
    }
}

//check if conrfirm pass field is equal to password field
window.checkConfirmPass = function(e) {
    const pass = document.getElementById('pass').value;
    const confirmPass = document.getElementById('confirmpass').value;

    const noError = !emailErr.textContent && !usernameErr.textContent && !errorMsg.textContent;

    if (pass != confirmPass) {
        e.preventDefault();

        errorMsg.style.display = 'block';
        errorMsg.textContent = 'Incorrect password!';
    }
    else {
         errorMsg.style.display = 'none';
         errorMsg.textContent = '';
    }

    if (!noError) {
        e.preventDefault();
    }

}
submitBtn.addEventListener('click', checkConfirmPass);


//to display login form
document.getElementById('showLogin').addEventListener('click', () => {
    loginForm.classList.add('active');
    signupForm.classList.remove('active');
    document.getElementById('username/email').focus();
  });



//to display signup form
const _signupBtn = document.querySelectorAll('.showSignup');

_signupBtn.forEach(button => {
    button.addEventListener('click', () => {
        loginForm.classList.remove('active');
        signupForm.classList.add('active');
        document.getElementById('firstname').focus();
    });
});



//for checking the username and email if it is available or not
emailField.addEventListener("blur", () => {
    check();
})

usernameField.addEventListener("blur", () => {
    check();
})

function check() {
    const email = emailField.value.trim();
    const username = usernameField.value.trim();

    checkAccountAvailability(email, username).then((data) =>{

        emailErr.style.display = data.emailExist ? "block" : "none";
        emailErr.textContent = data.emailExist ? "Email already exist!" : "";

        usernameErr.style.display = data.usernameExist ? "block" : "none";
        usernameErr.textContent = data.usernameExist ? "Username already exist!" : "";
    });
};

