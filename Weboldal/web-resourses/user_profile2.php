<?php
// Az adatbázis kapcsolat beállítása ...

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vajdasagivibes";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Hiba a kapcsolódásban: " . $conn->connect_error);
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Felhasználónév ellenőrzése a munkamenetben
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username']; // A felhasználónév kinyerése a munkamenetből
    $query = "SELECT * FROM regisztralas WHERE felhn = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $profilePicturePath = $user['profilkep']; // A felhasználó profilképének elérési útja az adatbázisból

        if (empty($profilePicturePath)) {
            // Ha a felhasználónak nincs profilképe, használjuk az alapértelmezett képet a nem alapján
            $gender = $user['nem'];
            if($gender==='Férfi') {
                $defaultImage = "default-men.png"; // Alapértelmezett kép férfiaknak
            }else if ($gender==='Nő') {
                $defaultImage = "default-female.png"; // Alapértelmezett kép nőknek
            }else {

                $defaultImage = "default-non.png"; // Alapértelmezett kép más esetekben
            }

            $profilePicturePath = "uploads/" . $defaultImage;
        }
    } else {

        $profilePicturePath = "uploads/default-men.png";
    }
} else {

    $profilePicturePath = "resourses/login.png";
}


if (!empty($profilePicturePath)) :
    ?>
    <img style="height: 200px; width: 200px;" src="<?php echo $profilePicturePath; ?>" alt="profilkép" />
<?php else : ?>

    <img style="height: 200px; width: 200px; border-radius: 50%;" src="../resourses/login.png" alt="profilkép" />
<?php endif; ?>
<script>
    $(document).ready(function () {
        var profileImagePath = "<?php echo $profilePicturePath; ?>"; // PHP változó átadása JavaScript-nek
        if (profileImagePath !== '') {

            $('img[name="kep"]').attr('src', profileImagePath);
        }
    });
</script>


