<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vajdasagivibes";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Hiba a kapcsolódásban: " . $conn->connect_error);
}

function uploadProfilePicture($file)
{
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($file["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));


    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["profilePicture"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    if ($_FILES["profilePicture"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    if ($uploadOk > 0) {
        if (move_uploaded_file($file["tmp_name"], $targetFile)) {
            return $targetFile;
        } else {
            echo "Sorry, there was an error uploading your file.";
            return null;
        }
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk > 0) {
          if (move_uploaded_file($file["tmp_name"], $targetFile)) {
        return $targetFile;
    } else {
        echo "Sorry, there was an error uploading your file.";
        return null;
    }
}

}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $teljesnev = mysqli_real_escape_string($conn, $_POST['teljesnev']);
    $felhn = mysqli_real_escape_string($conn, $_POST['felhn']);
    $jelszo = password_hash($_POST['jelszo'], PASSWORD_DEFAULT);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $tel = mysqli_real_escape_string($conn, $_POST['tel']);
    $szuldat = mysqli_real_escape_string($conn, $_POST['szuldat']);
    $nem = mysqli_real_escape_string($conn, $_POST['nem']);
    $cim1 = mysqli_real_escape_string($conn, $_POST['cim1']);
    $cim2 = mysqli_real_escape_string($conn, $_POST['cim2']);
    $orszag = mysqli_real_escape_string($conn, $_POST['orszag']);
    $varos = mysqli_real_escape_string($conn, $_POST['varos']);
    $iranyitoszam = mysqli_real_escape_string($conn, $_POST['iranyitoszam']);

    $checkUsernameQuery = "SELECT * FROM `regisztralas` WHERE `felhn` = '$felhn'";
    $checkUsernameResult = $conn->query($checkUsernameQuery);
    $profilePicturePath = isset($_FILES['profilePicture']) && uploadProfilePicture($_FILES['profilePicture']);


    if ($checkUsernameResult->num_rows > 0) {
        echo "username_taken";
    } else {
        $insertQuery = "INSERT INTO regisztralas (teljesnev, felhn, jelszo, email, tel, szuldat, nem, cim1, cim2, orszag, varos, iranyitoszam, profilkep) 
            VALUES ('$teljesnev', '$felhn', '$jelszo', '$email', '$tel', '$szuldat', '$nem', '$cim1', '$cim2', '$orszag', '$varos', '$iranyitoszam', '$profilePicturePath')";

        $result = $conn->query($insertQuery);

        if (!$result) {
            echo "Error: " . $conn->error;
            exit;
        } else {
            echo "success";
        }
    }
}

$conn->close();
?>
