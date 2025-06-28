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