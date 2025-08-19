<input type="number" class="qty-input" name="qty[]" id="qty1" min="0" value="4">

<script>
  // Wait for the DOM to be fully loaded
  document.addEventListener("DOMContentLoaded", function() {
    // Get the input elements with the class 'qty-input'
    const qtyInputs = document.querySelectorAll(".qty-input");

    // Loop through each input element
    for (let i = 0; i < qtyInputs.length; i++) {
      // Capture the initial value
      const initialValue = qtyInputs[i].value;
      
      // Add an event listener for the input event
      qtyInputs[i].addEventListener("input", function(event) {
        // Retrieve the updated value entered by the user
        const enteredValue = event.target.value;
        
        // Display an alert with the initial and updated values
        alert("Initial quantity: " + initialValue + "\nUpdated quantity: " + enteredValue);
      });
    }
  });
</script>
