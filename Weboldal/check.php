<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vajdasagivibes";

$conn = new mysqli($servername, $username, $password, $dbname);

// Ellenőrizze a kapcsolódást
if ($conn->connect_error) {
    die("Hiba a kapcsolódásban: " . $conn->connect_error);
}

// AJAX kérés kezelése
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Bejövő adatok feldolgozása
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Adatbázis lekérdezés
    $sql = "SELECT * FROM regisztralas WHERE felhn = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Felhasználó létezik, ellenőrizze a jelszót
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['jelszo'])) {
            // Jelszó helyes
            echo "success";
        } else {
            // Helytelen jelszó
            echo "incorrect_password";
        }

    } else {
        // Felhasználó nem létezik
        echo "user_not_found";
    }
}
?>
