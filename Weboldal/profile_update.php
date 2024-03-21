<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vajdasagivibes";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Hiba a kapcsolódásban: " . $conn->connect_error);
}

if (isset($_POST['updateProfilePicture'])) {
    $username = $_SESSION['username'];

    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["profilePicture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Ellenőrzés, hogy a fájl egy kép-e
    $check = getimagesize($_FILES["profilePicture"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo '<script>alert("A feltöltött fájl nem kép!"); </script>';
        exit;
    }

    // Ellenőrzés, hogy a fájl mérete elfogadható-e (500 kB)
    if ($_FILES["profilePicture"]["size"] > 500000) {
        echo '<script>alert("A feltöltött fájl túl nagy!"); </script>';
        exit;
    }

    // Engedélyezett fájltípusok: csak képek (jpg, jpeg, png, gif)
    if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif") {
        echo '<script>alert("Csak JPG, JPEG, PNG és GIF fájlok engedélyezettek!"); </script>';
        exit;
    }

    // Mozgatás a célkönyvtárba
    if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $targetFile)) {
        $updateQuery = "UPDATE regisztralas SET profilkep='$targetFile' WHERE felhn='$username'";
        if ($conn->query($updateQuery) === TRUE) {
            echo '<script>alert("Profilkép frissítve!"); window.location.href = "profilszerkeszt.php";</script>';
        } else {
            echo '<script>alert("Hiba a frissítés során: ' . $conn->error . '"); </script>';
        }
    } else {
        echo '<script>alert("Hiba a fájl feltöltése során!"); </script>';
    }
}

$conn->close();
?>
