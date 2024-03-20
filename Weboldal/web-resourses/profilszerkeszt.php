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

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $query = "SELECT * FROM regisztralas WHERE felhn = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $name = $user['teljesnev'];
        $email = $user['email'];
        $phone = $user['tel'];
    }
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
    <form method="post" action="profile_update.php">
    <div class="row">
            <div class="col-md-6">
                <div class="profile-head">
                    <h5>
                        <?php echo $username; ?>
                    </h5>
                    <h6>
                        VajdaságiVibez tag
                    </h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="profilePicture">Profilkép</label>
                                <input type="file" name="profilePicture" id="profilePicture">
                            </div>
                        </div>
                        <input type="submit" name="updateProfilePicture" value="Profilkép frissítése">

                        <div class="row">
                            <div class="col-md-6">
                                <label>Felhasználó név</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="username" value="<?php echo $username; ?>"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Név</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="name" value="<?php echo $name; ?>"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label>
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" value="<?php echo $email; ?>"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Telefon</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="phone" value="<?php echo $phone; ?>"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-primary" name="update" value="Frissítés"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>
