<?php
global $conn;
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $username = mysqli_real_escape_string($conn, $_POST["user"]);
    $password = mysqli_real_escape_string($conn, $_POST["pass"]);
    $repassword = mysqli_real_escape_string($conn, $_POST["repass"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $phonenumber = mysqli_real_escape_string($conn, $_POST["phone"]);
    $birthdate = mysqli_real_escape_string($conn, $_POST["birth"]);
    $address = mysqli_real_escape_string($conn, $_POST["address"]);
    $address2 = mysqli_real_escape_string($conn, $_POST["address2"]);
    $country = mysqli_real_escape_string($conn, $_POST["country"]);
    $city = mysqli_real_escape_string($conn, $_POST["city"]);
    $region = mysqli_real_escape_string($conn, $_POST["region"]);
    $postalcode = mysqli_real_escape_string($conn, $_POST["post"]);

    // Validate form data (you can add more validation as needed)
    if (empty($name) || empty($username) || empty($password) || empty($repassword) || empty($email) || empty($phonenumber) || empty($birthdate)  || empty($address) || empty($country) || empty($city) || empty($postalcode)) {
        echo "All fields are required";
    } elseif ($password !== $repassword) {
        echo "Passwords do not match";
    } else {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // SQL query to insert data into the 'users' table
        $sql = "INSERT INTO users (name, user, pass, email, phone, birth, address, address2, country, city, region, post)
                VALUES ('$name', '$username', '$hashedPassword', '$email', '$phonenumber', '$birthdate', '$address', '$address2', '$country', '$city', '$region', '$postalcode')";

        // Execute the query
        if ($conn->query($sql) === TRUE) {
            echo "User registered successfully";
        } else {
            echo "Error registering user: " . $conn->error;
        }
    }
}

$conn->close();
?>
