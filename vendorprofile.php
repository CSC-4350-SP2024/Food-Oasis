<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Oasis - Vendor Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .profile-info {
            margin: 20px;
            padding: 20px;
            border-radius: 5px;

        }

        .profile-info p {
            margin: 10px 0;
        }

        .profile-info p strong {
            margin-right: 10px;
            font-weight: bold;
        }

        .container {
            margin: 20px auto;
            /* Set top and bottom margin to 20px and left and right margin to auto */
            padding: 80px;
            border-radius: 5px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            border: 1px solid #ccc;
        }


        .container label {
            color: #689D38;
        }

        .container input,
        .container textarea {
            font-size: 20px;
            color: white;
        }

        /* For textareas with id="description" */
        textarea[id="description"],
        textarea[id="address"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-bottom: 2px solid #ffffff;
            background: transparent;
            border-radius: 0;
            box-sizing: border-box;
            transition: border-bottom-color 0.3s ease-out;
        }

        /* For textareas with id="description" when focused */
        textarea[id="description"]:focus,
        textarea[id="address"]:focus {
            border-bottom-color: #4f722d;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            grid-gap: 20px;
            /* Align items horizontally center */
            margin-top: 20px;
            /* Add space at the top */
            margin-left: 250px;
        }

        .product {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            /* Center text content */
            overflow: hidden;
            word-wrap: break-word;
        }

        .product-name {
            font-size: 36px;

        }

        .product-description {
            font-size: 20px;
        }

        .image-container {
            width: 100%;
            height: 150px;
            /* Adjust as needed */
            overflow: hidden;
        }

        .image-container img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .edit-mode input[type="text"],
        .edit-mode textarea {
            display: block;
            margin-bottom: 10px;
            color: white;
        }

        .edit-mode .btn-save,
        .edit-mode .btn-cancel {
            display: inline-block;
            margin-right: 10px;
        }

        .vendor-products {
            border: 1px solid #ccc;
        }

        .container input[type="file"] {
            background-color: none;
            /* Hide the default file input */
        }
    </style>
</head>

<body>
    <header class="header">
        <a href="#" class="logo">
            <i class="fa-light fa-plate-utensils"></i>
        </a>
        <h1 class="heading" id="heading" style="text-align: center;">Food <span> Oasis </span>
        </h1>
        <nav class="navbar">
            <a href="index.html">Home</a>
            <a href="googlemap.php">Browse Now</a>
            <a href="vendorprofile.php">Vendor Dashboard</a>
            <a href="index.html">Sign Out</a>
        </nav>
        <div class="icons">
            <div class="fas fa-bars" id="menu-btn"></div>
        </div>
    </header>
    <section class="vendor-profile">
        <h2 style="color:#666666;">Vendor Profile</h2>

        <div class="profile-info">
            <?php
            // Start the session
            session_start();

            // Database connection parameters
            $host = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "vendor_info";

            // Create connection
            $conn = new mysqli($host, $username, $password, $dbname);


            // Check if the form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Handle form submission to update profile info
                // Retrieve submitted data
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $company_name = $_POST['company_name'];
                $address = $_POST['address'];
                $phone_number = $_POST['phone_number'];
                $hours_of_operations = $_POST['hours_of_operations'];

                // Prepare SQL statement for updating profile info
                $update_stmt = $conn->prepare("UPDATE users SET first_name=?, last_name=?, company_name=?, address=?, phone_number=?, hours_of_operations=? WHERE email=?");
                $update_stmt->bind_param("sssssss", $first_name, $last_name, $company_name, $address, $phone_number, $hours_of_operations, $_SESSION['email']);

                if ($update_stmt->execute()) {
                    echo "<script>alert('Profile information updated successfully!');</script>";
                } else {
                    echo "<script>alert('Error updating profile information: " . $update_stmt->error . "');</script>";
                }
            }
            ?>
            <!-- Vendor profile section -->
            <section class="vendor-profile">
                <h2>Vendor <span style="color:#689D38;">Profile</sppan>
                </h2>

                <div class="profile-info">
                    <?php
                    if (isset($_SESSION['email'])) {
                        $email = $_SESSION['email'];
                        $sql = "SELECT first_name, last_name, email, company_name, address, phone_number, hours_of_operations FROM users WHERE email='$email'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            ?>
                            <!-- Display mode -->
                            <div class="view-mode">
                                <p><strong style="color:white;">First Name:</strong> <?php echo $row['first_name']; ?></p>
                                <p><strong style="color:white;">Last Name:</strong> <?php echo $row['last_name']; ?></p>
                                <p><strong style="color:white;">Company Name:</strong> <?php echo $row['company_name']; ?></p>
                                <p><strong style="color:white;">Address:</strong> <?php echo $row['address']; ?></p>
                                <p><strong style="color:white;">Phone Number:</strong> <?php echo $row['phone_number']; ?></p>
                                <p><strong style="color:white;">Hours of Operations:</strong>
                                    <?php echo $row['hours_of_operations']; ?></p>
                                <button class="btn-edit">Edit</button>
                            </div>
                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    const editButton = document.querySelector('.btn-edit');
                                    const viewMode = document.querySelector('.view-mode');
                                    const editMode = document.querySelector('.edit-mode');

                                    editButton.addEventListener('click', function () {
                                        viewMode.style.display = 'none';


                                        editMode.style.display = 'block';


                                        const firstNameInput = document.querySelector('.edit-mode input[name="first_name"]');
                                        const lastNameInput = document.querySelector('.edit-mode input[name="last_name"]');
                                        const companyNameInput = document.querySelector('.edit-mode input[name="company_name"]');
                                        const addressTextarea = document.querySelector('.edit-mode textarea[name="address"]');
                                        const phoneNumberInput = document.querySelector('.edit-mode input[name="phone_number"]');
                                        const hoursOfOperationsInput = document.querySelector('.edit-mode input[name="hours_of_operations"]');

                                        firstNameInput.value = '<?php echo $row['first_name']; ?>';
                                        lastNameInput.value = '<?php echo $row['last_name']; ?>';
                                        companyNameInput.value = '<?php echo $row['company_name']; ?>';
                                        addressTextarea.value = '<?php echo $row['address']; ?>';
                                        phoneNumberInput.value = '<?php echo $row['phone_number']; ?>';
                                        hoursOfOperationsInput.value = '<?php echo $row['hours_of_operations']; ?>';
                                    });
                                });
                            </script>
                            <?php
                        } else {
                            echo "0 results";
                        }
                    } else {
                        echo "Email not found in session";
                    }
                    ?>
                </div>

                <div class="edit-mode" style="display: none;">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="form-group">
                            <label for="first_name">First Name:</label>
                            <input type="text" name="first_name" required>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name:</label>
                            <input type="text" name="last_name" required>
                        </div>
                        <div class="form-group">
                            <label for="company_name">Company Name:</label>
                            <input type="text" name="company_name" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <textarea name="address" id=address required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number:</label>
                            <input type="text" name="phone_number" required>
                        </div>
                        <div class="form-group">
                            <label for="hours_of_operations">Hours of Operations:</label>
                            <input type="text" name="hours_of_operations" required>
                        </div>
                        <button class="btn-save" type="submit">Save</button>
                        <button class="btn-cancel" type="button">Cancel</button>
                    </form>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const editButton = document.querySelector('.btn-edit');
                        const viewMode = document.querySelector('.view-mode');
                        const editMode = document.querySelector('.edit-mode');

                        editButton.addEventListener('click', function () {
                            // Hide view mode
                            viewMode.style.display = 'none';

                            // Show edit mode
                            editMode.style.display = 'block';
                        });
                    });
                </script>

            </section>

            <div class="container">
                <h2>Add <span style="color:#689D38;">Product</span></h2>
                <form action="upload_product.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="product_name">Product Name:</label>
                        <input type="text" id="product_name" name="product_name" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea id="description" name="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" id="image" name="image" accept="image/*" required>
                    </div>
                    <button type="submit">Upload Product</button>
                </form>
            </div>

            <section class="vendor-products">
                <h2>Uploaded <span style="color:#689D38;">Products</span></h2>

                <div class="product-grid">
                    <?php
                    $vendor_email = $_SESSION['email'];
                    $products_sql = "SELECT id, product_name, description, image FROM products WHERE email='$vendor_email'";
                    $products_result = $conn->query($products_sql);

                    if ($products_result->num_rows > 0) {
                        while ($product_row = $products_result->fetch_assoc()) {
                            echo "<div class='product'>";
                            echo "<h3 class='product-name' style='color:white;'>" . $product_row['product_name'] . "</h3>";
                            echo "<p class='product-description'>" . $product_row['description'] . "</p>";
                            echo "<div class='image-container'>";
                            echo "<img src='uploads/" . $product_row['image'] . "' alt='Product Image'>";
                            echo "</div>";
                            echo "<div class='product-actions'>";
                            echo "<button class='delete-button' data-product-id='" . $product_row['id'] . "'>Delete</button>";
                            echo "</div>";
                            echo "</div>";

                        }
                    } else {
                        echo "<p class='no-products' style='margin-left: 330px; font-size: 30px; display: inline-block;'>No products uploaded yet.</p>";
                    }
                    ?>

                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const editButton = document.querySelector('.btn-edit');
                        const viewMode = document.querySelector('.view-mode');
                        const editMode = document.querySelector('.edit-mode');

                        editButton.addEventListener('click', function () {

                            viewMode.style.display = 'none';

                            editMode.style.display = 'block';


                            const firstNameInput = document.querySelector('.edit-mode input[name="first_name"]');
                            const lastNameInput = document.querySelector('.edit-mode input[name="last_name"]');
                            const companyNameInput = document.querySelector('.edit-mode input[name="company_name"]');
                            const addressTextarea = document.querySelector('.edit-mode textarea[name="address"]');
                            const phoneNumberInput = document.querySelector('.edit-mode input[name="phone_number"]');
                            const hoursOfOperationsInput = document.querySelector('.edit-mode input[name="hours_of_operations"]');

                            firstNameInput.value = '<?php echo $row['first_name']; ?>';
                            lastNameInput.value = '<?php echo $row['last_name']; ?>';
                            companyNameInput.value = '<?php echo $row['company_name']; ?>';
                            addressTextarea.value = '<?php echo $row['address']; ?>';
                            phoneNumberInput.value = '<?php echo $row['phone_number']; ?>';
                            hoursOfOperationsInput.value = '<?php echo $row['hours_of_operations']; ?>';
                        });
                        const saveButton = document.querySelector('.btn-save');
                        saveButton.addEventListener('click', function () {
                        });
                        const cancelButton = document.querySelector('.btn-cancel');
                        cancelButton.addEventListener('click', function () {
                        });
                    });
                    document.addEventListener('DOMContentLoaded', function () {
                        const products = document.querySelectorAll('.product');

                        products.forEach(product => {
                            const deleteButton = product.querySelector('.delete-button');

                            deleteButton.addEventListener('click', function () {
                                const productId = deleteButton.getAttribute('data-product-id');
                                fetch('delete_product.php', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/x-www-form-urlencoded',
                                    },
                                    body: `product_id=${productId}`
                                })
                                    .then(response => {
                                        if (response.ok) {
                                            product.remove();
                                        } else {
                                            throw new Error('Error deleting product.');
                                        }
                                    })
                                    .catch(error => {
                                        console.error(error);
                                    });
                            });
                        });
                    });
                </script>

            </section>
            <script src="script.js"></script>
</body>

</html>