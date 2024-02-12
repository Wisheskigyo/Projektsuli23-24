<?php
$hostname = "sql208.infinityfree.com";
$username = "if0_35967989";
$password = "ZPE9OKbNCIS2qkd";
$database = "if0_35967989_vajdasagivibe";

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

?>
