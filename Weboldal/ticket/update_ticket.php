<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ticketId']) && isset($_POST['ticketCount'])) {
        $ticketId = $_POST['ticketId'];
        $ticketCount = $_POST['ticketCount'];

        // Adatbázis kapcsolódás
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "vajdasagivibes";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Frissítés az adatbázisban
        $sql = "UPDATE jegyek SET mennyi = mennyi - $ticketCount WHERE jegyid = '$ticketId'";

        if ($conn->query($sql) === TRUE) {
            echo "Adatbazis frissitve";
        } else {
            echo "Hiba az adatbazis frissitesekor: " . $conn->error;
        }

        $conn->close();
    } else {
        echo "Hibás vagy hiányzó adatok";
    }
}
?>
