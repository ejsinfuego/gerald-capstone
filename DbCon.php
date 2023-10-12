<?php
// Database connection parameters
$host = "localhost"; // Hostname (usually "localhost")
$username = "your_username"; // MySQL username
$password = "your_password"; // MySQL password
$database = "sign-up"; // Database name

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["pass"];
    $cpass = $_POST["cpass"];
    $age = $_POST["Age"];
    $height = $_POST["Height"];
    $weight = $_POST["Weight"];
    $gender = $_POST["Gender"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    // SQL query to insert data into the database
    $sql = "INSERT INTO users_info (email, password, cpass, birthdate, height, weight, gender, first_name, last_name, phone_num, address) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssddissss", $email, $password, $cpass, $age, $height, $weight, $gender, $fname, $lname, $phone, $address);

    if ($stmt->execute()) {
        echo "Registration successful!";
        // You can redirect to a success page or perform other actions here
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
