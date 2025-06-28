import { setupBurgerMenu } from "./burger.js";

const close = document.getElementById('close-btn');
const burgerMenu = document.getElementById('burger-menu-id');
const burgerIcon = document.getElementById('burger-icon');

let clickedOnce = false;

setupBurgerMenu(burgerIcon, burgerMenu, close);

//for trip planner -desktop
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

//for trip planner -mobile
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

//for viewving you log page 
document.getElementById('view-log').addEventListener('click', function() {
    document.getElementById('travelog-home').style.display = 'none';
    document.getElementById('your-log-id').style.display = 'flex';

    document.getElementById('log-home').style.display = 'block';
    this.style.display = 'none'
})

//for viewing back on the log page
document.getElementById('log-home').addEventListener('click', function() {
    document.getElementById('travelog-home').style.display = 'flex';
    document.getElementById('your-log-id').style.display = 'none';

    document.getElementById('view-log').style.display = 'block';
    this.style.display = 'none';
})