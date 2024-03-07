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
$(document).ready(function () {
    $("#registration-form").submit(function (event) {
        // Form küldése AJAX segítségével
        event.preventDefault();

        var teljesnev = $("#name").val();
        var felhn = $("#user").val();
        var jelszo = $("#pass").val();
        var email = $("#emailInput").val();
        var telefonszam = $("#phone").val();
        var szuldat = $("#birth").val();
        var nem = $("input[name='gender']:checked").val();
        var cim1 = $("#address").val();
        var cim2 = $("#address2").val();
        var orszag = $("#country").val();
        var varos = $("#city").val();
        var iranyitoszam = $("#post").val();

        $.ajax({
            type: "POST",
            url: "regisztracio.php", // A regisztrációs PHP fájl elérési útvonala
            data: {
                teljesnev: teljesnev,
                felhn: felhn,
                jelszo: jelszo,
                email: email,
                telefonszam: telefonszam,
                szuldat: szuldat,
                nem: nem,
                cim1: cim1,
                cim2: cim2,
                orszag: orszag,
                varos: varos,
                iranyitoszam: iranyitoszam
            },
            success: function (response) {
                if (response === "success") {
                    alert("Sikeres regisztráció!");
                    window.location.href = "fooldal.html"; // Sikeres regisztráció esetén átirányítás
                } else if (response === "username_taken") {
                    alert("A felhasználónév már foglalt!");
                } else {
                    alert("Hiba a regisztráció során.");
                }
            },
            error: function () {
                alert("Hiba a kérés során.");
            }
        });
    });
});
