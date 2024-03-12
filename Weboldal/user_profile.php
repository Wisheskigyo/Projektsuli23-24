<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vajdasagivibes";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Hiba a kapcsolódásban: " . $conn->connect_error);
}


// Felhasználói adatok lekérdezése az adatbázisból (példa, a felhasználó azonosítóját változtasd a sajátodra)
$userID = 1; // Példa: a felhasználó azonosítója
$query = "SELECT * FROM regisztralas WHERE id = $userID";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $profilePicturePath = $user['profil']; // A felhasználó profilképének elérési útja az adatbázisból

    if (empty($profilePicturePath)) {
        // Ha a felhasználónak nincs profilképe, használjuk az alapértelmezett képet a nem alapján
        $gender = $user['nem']; // A felhasználó nemének lekérése az adatbázisból
        $defaultImage = "default-" . strtolower($gender) . ".jpg"; // Alapértelmezett kép neve
        $profilePicturePath = "uploads/" . $defaultImage;
    }
} else {
    // Ha nem található a felhasználó az adatbázisban, hiba kezelése vagy további logika
    $profilePicturePath = ""; // Vagy más hiba kezelése, például egy üres képpel
}

if (!empty($profilePicturePath)) :
    ?>
    <img style="height: 40px; width: 40px; border-radius: 50%;" src="<?php echo $profilePicturePath; ?>" alt="profilkép" />
<?php else : ?>
    <!-- Alapértelmezett kép, ha nincs felhasználói kép -->
    <img style="height: 40px; width: 40px; border-radius: 50%;" src="default-avatar.jpg" alt="profilkép" />
<?php endif; ?>