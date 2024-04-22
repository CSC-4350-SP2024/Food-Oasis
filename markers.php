<?php

$host = 'localhost';
$username = 'root';
$password = 'root';
$database = 'vendor_info';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT u.`email`, u.`company_name`, u.`address`, u.`phone_number`, u.`hours_of_operations`, u.`social_media`,  u.`information`, u.`latitude`, u.`longitude`, p.`product_name`, p.`description`, p.`image` FROM `users` u LEFT JOIN `products` p ON u.`email` = p.`email`";
$result = $conn->query($sql);

$users = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($users);

?>