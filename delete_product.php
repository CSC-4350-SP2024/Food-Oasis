<?php

session_start();


$host = "localhost";
$username = "root";
$password = "root";
$dbname = "vendor_info";


$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];


    $sql = "DELETE FROM products WHERE id=$productId";

    if ($conn->query($sql) === TRUE) {

        echo "Product deleted successfully.";
    } else {

        echo "Error deleting product: " . $conn->error;
    }
} else {

    echo "Product ID not provided.";
}

$conn->close();
?>