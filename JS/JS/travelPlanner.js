import { setupBurgerMenu } from "./burger.js";


const close = document.getElementById('close-btn');
const burgerMenu = document.getElementById('burger-menu-id');
const burgerIcon = document.getElementById('burger-icon');

setupBurgerMenu(burgerIcon, burgerMenu, close);


//check submit
document.getElementById('trip-form').addEventListener('submit', function(e) {
    const country = this.querySelector('select[name="country"]').value;
    const city = this.querySelector('select[name="city"]').value;
    const actChecked = this.querySelectorAll('input[name="activities[]"]:checked').length;
    const infoChecked = this.querySelectorAll('input[name="information[]"]:checked').length;

    if(!country || !city || actChecked === 0 || infoChecked === 0) {
        e.preventDefault();
    }
})




//THIS IS FOR COMPUTATION OF TOTAL COST


  document.addEventListener('DOMContentLoaded', function () {
    const checkboxes = document.querySelectorAll('input[type="checkbox"][data-price]');
    const totalDisplay = document.getElementById('total_cost');

    function updateTotal() {
      let total = 0;

      checkboxes.forEach(checkbox => {
        if (checkbox.checked) {
          total += parseFloat(checkbox.getAttribute('data-price')) || 0;
        }
      });

      totalDisplay.value = 'PHP ' + total.toFixed(2);
    }

    checkboxes.forEach(checkbox => {
      checkbox.addEventListener('change', updateTotal);
    });

    // Call once on load to set initial value
    updateTotal();
  });

