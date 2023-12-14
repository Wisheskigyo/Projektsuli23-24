function validateForm() {
    const userType = document.getElementById("userType").value;
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;

    if (password !== confirmPassword) {
        alert("Passwords do not match!");
        return false;
    }

    // Additional validation logic can be added here

    // Assuming the validation is successful, redirect to "fooldal.html"
    alert("Registration successful! Redirecting to fooldal.html");



    // If you want to prevent the default form submission, uncomment the line below
    // return false;
}


document.getElementById("userType").addEventListener("change", function () {
    const hostFields = document.getElementById("hostFields");

    if (this.value === "host") {
        hostFields.style.display = "block";
    } else {
        hostFields.style.display = "none";
    }
});
