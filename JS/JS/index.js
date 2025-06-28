import { setupBurgerMenu } from "./burger.js";

const close = document.getElementById('close-btn');
const burgerMenu = document.getElementById('burger-menu-id');
const burgerIcon = document.getElementById('burger-icon');

window.scrollToTop = function () {
    window.scrollTo({top: 0, behavior: "smooth"});
};

window.setForm = function (type) {
    localStorage.setItem('formType', type);
    window.location.href = 'PAGE/form.php';
};

setupBurgerMenu (burgerIcon, burgerMenu, close);
