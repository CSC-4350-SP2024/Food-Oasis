<?php

$host = 'localhost';
$username = 'root';
$password = 'root';
$database = 'vendor_info';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];


    $stmt = $conn->prepare("SELECT email, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];
        if (password_verify($password, $hashed_password)) {

            session_start();
            $_SESSION['email'] = $email;
            header("Location: vendorprofile.php");
            exit();
        } else {

            echo "Incorrect password";
        }
    } else {

        echo "There is no account under this email";
    }

    $stmt->close();
    $conn->close();
}
?>