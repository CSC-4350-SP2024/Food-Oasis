<?php
session_start();

$host = 'localhost';
$username = 'root';
$password = 'root';
$database = 'vendor_info';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $image_name = $_FILES["image"]["name"];

    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        if ($_FILES["image"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            exit();
        }

        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            exit();
        }

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $user_email = $_SESSION['email'];

            $stmt = $conn->prepare("INSERT INTO products (product_name, description, image, email) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $product_name, $description, $image_name, $user_email);
            if ($stmt->execute()) {
                echo "<script>window.location.href = 'vendorprofile.php';</script>";
                exit();
            } else {
                echo "Error uploading product.";
            }
            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "File is not an image.";
        exit();
    }
}
$conn->close();
?>