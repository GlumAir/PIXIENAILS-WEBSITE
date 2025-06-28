
function seePassword(id) {
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


const errorMsg = document.getElementById('err-msg-confirm-pass');
const submitBtn = document.getElementById('submit-btn-create-pass');

function checkConfirmPass(e) {
    const pass = document.getElementById('new-pass').value;
    const confirmPass = document.getElementById('confirm-new-pass').value;

    if (pass != confirmPass) {
        e.preventDefault();

        errorMsg.style.display = 'block';
        errorMsg.textContent = 'Incorrect password!';
    }
    else {
         errorMsg.style.display = 'none';
         errorMsg.textContent = '';
    }

}

submitBtn.addEventListener('click', checkConfirmPass);