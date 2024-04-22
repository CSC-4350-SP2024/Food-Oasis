<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);



// Database connection parameters
$host = "localhost";
$username = "root";
$password = "root";
$dbname = "vendor_info";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$email = isset($_GET['email']) ? $_GET['email'] : null;


// Fetch product information based on the provided email
$sql = "SELECT product_name, description, image FROM products WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $product_info = "";
    // Output each product
    while ($product_row = $result->fetch_assoc()) {
        // Start a container for each product
        $product_info .= "<p style='margin-top:20px; font-weight:bold; font-size:36px;'>Vendor Products:</p>";
        $product_info .= "<div class='product-container'>";
        // Product name and description
        $product_info .= "<p><strong>Product Name:</strong> " . $product_row['product_name'] . "</p>";
        $product_info .= "<p><strong>Description:</strong> " . $product_row['description'] . "</p>";
        // Adjust the image path to point to the "uploads" folder
        $image_path = 'uploads/' . $product_row['image'];
        // Display the image using an <img> tag with a maximum width and height
        $product_info .= "<img src='" . $image_path . "' alt='Product Image' style='max-width: 200px; max-height: 200px;'>";
        // Close the product container
        $product_info .= "</div>";
        $product_info .= "<hr>"; // Add a horizontal line between products
    }
    echo $product_info;
}



$conn->close();
?>