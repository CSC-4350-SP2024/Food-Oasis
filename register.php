<?php
$host = 'localhost';
$username = 'root';
$password = 'root';
$database = 'vendor_info';

$conn = new mysqli($host, $username, $password, $database);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['firstName'];
    $last_name = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);
    $company_name = $_POST['companyName'];
    $address = $_POST['address'];
    $phone_number = $_POST['phoneNumber'];
    $hours_of_operations = $_POST['hours'];
    $social_media = $_POST['socialMedia'];
    $information = $_POST['information'];

    $check_stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $check_stmt->store_result();
    if ($check_stmt->num_rows > 0) {
        echo "<script>alert('There is already an account with this email.'); window.location.href = 'signup.html';</script>";
        $check_stmt->close();
        $conn->close();
        exit();
    }
    $check_stmt->close();


    $address_to_geocode = urlencode($address);
    $geocode_url = "https://maps.googleapis.com/maps/api/geocode/json?address={$address_to_geocode}&key=AIzaSyBGLIkUoW92Cqv25JdJ_4333JypQBCryVc";
    $geocode_response = file_get_contents($geocode_url);
    $geocode_data = json_decode($geocode_response);

    if ($geocode_data && isset($geocode_data->status) && $geocode_data->status == 'OK') {
        $latitude = $geocode_data->results[0]->geometry->location->lat;
        $longitude = $geocode_data->results[0]->geometry->location->lng;
    } else {
        echo "<script>alert('Geocoding failed. Error message: " . ($geocode_data ? $geocode_data->status : "Unknown error") . "'); window.location.href = 'signup.html';</script>";
        $latitude = null;
        $longitude = null;
    }


    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password, company_name, address, phone_number, hours_of_operations, social_media, information, latitude, longitude) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssdd", $first_name, $last_name, $email, $password_hashed, $company_name, $address, $phone_number, $hours_of_operations, $social_media, $information, $latitude, $longitude);

    if ($stmt->execute()) {
        echo "<script>alert('Registration successful!'); window.location.href = 'vendorprofile.php';</script>";
        exit();
    } else {
        echo "<script>alert('Error: " . $stmt->error . "'); window.location.href = 'signup.html';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>