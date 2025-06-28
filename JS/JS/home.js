import { setupBurgerMenu } from "./burger.js";

const close = document.getElementById('close-btn');
const burgerMenu = document.getElementById('burger-menu-id');
const burgerIcon = document.getElementById('burger-icon');

let clickedOnce = false;

setupBurgerMenu(burgerIcon, burgerMenu, close);

document.getElementById('nav-planner-id').addEventListener("click", function() {
    if(!clickedOnce) {
        document.getElementById('nav-planner-side-id').style.display = 'flex'
        clickedOnce = true;
    }
    else {
        document.getElementById('nav-planner-side-id').style.display = 'none'
        clickedOnce = false;
    }
})

document.getElementById('burger-nav-planner-id').addEventListener("click", function() {
    if(!clickedOnce) {
        document.getElementById('burger-nav-planner-side-id').style.display = 'flex'
        clickedOnce = true;
    }
    else {
        document.getElementById('burger-nav-planner-side-id').style.display = 'none'
        clickedOnce = false;
    }
})

