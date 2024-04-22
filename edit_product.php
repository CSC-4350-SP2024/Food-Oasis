<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $product_id = $_GET['id'];


    $host = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "vendor_info";


    $conn = new mysqli($host, $username, $password, $dbname);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $select_stmt = $conn->prepare("SELECT product_name, description, image FROM products WHERE id = ?");
    $select_stmt->bind_param("i", $product_id);


    $select_stmt->execute();
    $result = $select_stmt->get_result();

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();
        $product_name = $row['product_name'];
        $description = $row['description'];
        $image = $row['image'];
    } else {
        echo "Product not found.";
    }

    $select_stmt->close();
    $conn->close();
} else {
    echo "Invalid product ID.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>

<body>
    <h2>Edit Product</h2>
    <form action="update_product.php" method="POST">
        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
        <div>
            <label for="product_name">Product Name:</label>
            <input type="text" id="product_name" name="product_name" value="<?php echo $product_name; ?>" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description" required><?php echo $description; ?></textarea>
        </div>
        <div>
            <label for="image">Image:</label>
            <input type="file" id="image" name="image" accept="image/*">
            <img src="uploads/<?php echo $image; ?>" alt="Product Image" width="100">
        </div>
        <button type="submit">Save</button>
    </form>
</body>

</html>