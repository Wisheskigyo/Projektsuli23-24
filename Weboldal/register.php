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
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Bejövő adatok feldolgozása
    $teljesnev = mysqli_real_escape_string($conn, $_POST['teljesnev']);
    $felhn = mysqli_real_escape_string($conn, $_POST['felhn']);
    $jelszo = password_hash($_POST['jelszo'], PASSWORD_DEFAULT);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $telefonszam = mysqli_real_escape_string($conn, $_POST['telefonszam']);
    $szuldat = mysqli_real_escape_string($conn, $_POST['szuldat']);
    $nem = mysqli_real_escape_string($conn, $_POST['nem']);
    $cim1 = mysqli_real_escape_string($conn, $_POST['cim1']);
    $cim2 = mysqli_real_escape_string($conn, $_POST['cim2']);
    $orszag = mysqli_real_escape_string($conn, $_POST['orszag']);
    $varos = mysqli_real_escape_string($conn, $_POST['varos']);
    $iranyitoszam = mysqli_real_escape_string($conn, $_POST['iranyitoszam']);


    // Ellenőrizze, hogy a felhasználónév már foglalt-e
    $checkUsernameQuery = "SELECT * FROM `regisztralas` WHERE `felhn` = '$felhn'";

    $checkUsernameResult = $conn->query($checkUsernameQuery);

    if ($checkUsernameResult->num_rows > 0) {
        echo "username_taken";
    } else {
        // Adatbázisba történő beillesztés
        $insertQuery = "INSERT INTO regisztralas (teljesnev, felhn, jelszo, email, telefonszam, szuldat, nem, cim1, cim2, orszag, varos, iranyitoszam) 
                VALUES ('$teljesnev', '$felhn', '$jelszo', '$email', '$telefonszam', '$szuldat', '$nem', '$cim1', '$cim2', '$orszag', '$varos', '$iranyitoszam')";

// Hibaellenőrzés a beillesztésnél
        $result = $conn->query($checkUsernameQuery);

        if (!$result) {
            echo "Error: " . $conn->error;
            exit;
        }

    }
}
error_reporting(E_ALL);
ini_set('display_errors', 1);


// Adatbázis lezárása
$conn->close();
?>
