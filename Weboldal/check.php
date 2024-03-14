<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vajdasagivibes";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Hiba a kapcsolódásban: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $felhn = mysqli_real_escape_string($conn, $_POST['username']);
    $jelszo = mysqli_real_escape_string($conn, $_POST['password']);

    $getPasswordQuery = "SELECT jelszo, felhn FROM `regisztralas` WHERE `felhn` = '$felhn'";
    $result = $conn->query($getPasswordQuery);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $storedPassword = $row['jelszo'];
        $storedUsername = $row['felhn'];

        // Ellenőrzés: Az adatbázisban tárolt jelszó és a felhasználó által megadott jelszó egyezik-e
        if (password_verify($jelszo, $storedPassword)) {
            // Sikeres bejelentkezés
            session_start();
            $_SESSION['username'] = $storedUsername; // Felhasználónév session változóba mentése
            echo "success" ;
        } else {
            // Sikertelen bejelentkezés
            echo "failure";
        }
    } else {
        // Felhasználói fiók nem található
        echo "user_not_found";
    }
}

$conn->close();
?>
