function validateEmail() {
    // Get the input value
    var emailInput = document.getElementById('emailInput').value;

    // Regular expression for basic email validation
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    // Check if the email is valid
    var isValid = emailRegex.test(emailInput);

    // Get the label element
    var resultLabel = document.getElementById('resultLabel');

    // Update the label based on the validation result
    if (isValid) {
        resultLabel.textContent = 'Érvényes email cím';
        resultLabel.className = ''; // Remove any previous error class
    } else {
        resultLabel.textContent = 'Érvénytelen email cím';
        resultLabel.className = 'error'; // Apply error class for styling
    }
}