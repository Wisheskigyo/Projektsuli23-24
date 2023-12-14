function showFields() {
    var userType = document.getElementById("userType").value;
    var hostFields = document.getElementById("hostFields");

    try {
        // Reset the form and hide host fields when switching between Member and Host
        document.getElementById("registrationForm").reset();

        if (userType === "host") {
            hostFields.style.display = "block";
        } else if (userType==="member") {
            hostFields.style.display = "none";
            // Clear host fields explicitly
            document.getElementById("partyhouseName").value = "";
            document.getElementById("partyhouseAddress").value = "";
            document.getElementById("idNumber").value = "";
            document.getElementById("phoneNumber").value = "";
            document.getElementById("email").value = "";
            // You might want to add similar code for clearing file input fields if needed
        }
    } catch (error) {
        console.error("An error occurred while clearing fields:", error.message);
    }
}

document.getElementById("registrationForm").addEventListener("submit", function(event) {
    event.preventDefault();

    // Perform form validation and submission logic here
    console.log("Sikeressen regisztráltál!");
});
