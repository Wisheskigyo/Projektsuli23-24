function validateEmail() {
    var emailInput = document.getElementById('emailInput').value;
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var isValid = emailRegex.test(emailInput);
    var resultLabel = document.getElementById('resultLabel');

    if (isValid) {
        resultLabel.textContent = 'Érvényes email cím';
        resultLabel.className = '';
    } else {
        resultLabel.textContent = 'Érvénytelen email cím';
        resultLabel.className = 'error';
    }
}

$(document).ready(function () {
    $("#registration-form").submit(function (event) {
        event.preventDefault();

        var teljesnev = $("#name").val();
        var felhn = $("#user").val();
        var jelszo = $("#pass").val();
        var email = $("#emailInput").val();
        var tel = $("#phone").val();
        var szuldat = $("#birth").val();

        var cim1 = $("#address").val();
        var cim2 = $("#address2").val();
        var orszag = $("#country").val();
        var varos = $("#city").val();
        var iranyitoszam = $("#post").val();
        var profilePicture = $("#profilePicture").prop("files")[0];

        if (document.getElementById("check-male").checked)
            nem = 'Férfi';
        else if (document.getElementById("check-female").checked)
            nem = 'Nő';
        else
            nem = 'Semmi';

        var formData = new FormData();
        formData.append("teljesnev", teljesnev);
        formData.append("felhn", felhn);
        formData.append("jelszo", jelszo);
        formData.append("email", email);
        formData.append("tel", tel);
        formData.append("szuldat", szuldat);
        formData.append("nem", nem);
        formData.append("cim1", cim1);
        formData.append("cim2", cim2);
        formData.append("orszag", orszag);
        formData.append("varos", varos);
        formData.append("iranyitoszam", iranyitoszam);
        formData.append("profilePicture", profilePicture);

        $.ajax({
            type: "POST",
            url: "register.php",
            processData: false,
            contentType: false,
            cache: false,
            data: formData,
            success: function (response) {
                console.log(response);
                if (response === "success") {
                    alert("Sikeres regisztráció!");
                    window.location.href = "fooldal.php";
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

