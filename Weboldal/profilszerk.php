<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vajdasagivibes";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Hiba a kapcsolódásban: " . $conn->connect_error);
}

session_start(); // Munkamenet megkezdése

// Felhasználónév ellenőrzése a munkamenetben
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username']; // A felhasználónév kinyerése a munkamenetből
    $query = "SELECT * FROM regisztralas WHERE felhn = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $profilePicturePath = $user['profilkep']; // A felhasználó profilképének elérési útja az adatbázisból
        $name = $user['teljesnev']; // A felhasználó nevének kinyerése az adatbázisból
        $email = $user['email']; // A felhasználó email címének kinyerése az adatbázisból
        $phone = $user['tel']; // A felhasználó telefonszámának kinyerése az adatbázisból
    }
}

// Kijelentkezés feldolgozása
if (isset($_POST['logout'])) {
    // Munkamenetek törlése és átirányítás a fooldal2.php oldalra
    session_unset();
    session_destroy();
    header("Location: fooldal.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Profil szerkesztés</title>
    <link rel="stylesheet" href="profilszerkesztes.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class="container emp-profile">

    <div class="row">
        <div class="col-md-4">
            <div class="profile-img">
                <?php require 'user_profile2.php' ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="profile-head">
                <h5>
                    <?php echo $username; ?>
                </h5>
                <h6>
                    VajdaságiVibez tag
                </h6>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Rólam</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-2">
            <input type="button" class="profile-edit-btn" onclick="window.location.href='profilszerkeszt.php'" value="Profil szerkesztése"/>
            <form method="post">
                <input type="submit" class="profile-edit-btn" name="logout" value="Kijelentkezés">
            </form>
        </div>

    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="profile-work">
            </div>
        </div>
        <div class="col-md-8">
            <div class="tab-content profile-tab" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Felhasznaló név</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $username; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Név</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $name; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Email</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $email; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Phone</label>
                        </div>
                        <div class="col-md-6">
                            <p><?php echo $phone; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
