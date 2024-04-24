<?php
// Adatbázis kapcsolódás
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vajdasagivibes";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kapcsolódás ellenőrzése
if ($conn->connect_error) {
    die("Kapcsolódási hiba: " . $conn->connect_error);
}

// Űrlap adatok fogadása
$name = $_POST['name'];
$message = $_POST['message'];

// Adatok mentése az adatbázisba
$sql = "INSERT INTO feedback (name, message) VALUES ('$name', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Visszajelzés sikeresen elküldve.";
} else {
    echo "Hiba történt az adatbázisban: " . $conn->error;
}

// Adatbázis kapcsolat bezárása
$conn->close();
?>
