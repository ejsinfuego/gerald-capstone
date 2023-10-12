
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST["email"];
    $password = $_POST["pass"];
    $confirm_password = $_POST["cpass"];
    $birthdate = $_POST["Age"];
    $height = $_POST["Height"];
    $weight = $_POST["Weight"];
    $gender = $_POST["Gender"];
    $first_name = $_POST["fname"];
    $last_name = $_POST["lname"];
    $phone_num = $_POST["phone"];
    $address = $_POST["address"];

    // Validation (you can add more validation as needed)
    if ($password !== $confirm_password) {
        header("Location: Login22.html");
        exit();
    }

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "newsignup"; // Change to your database name

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the database
    $sql = "INSERT INTO userinfo (email, password, birthdate, height, weight, gender, first_name, last_name, phone_num, address)
            VALUES ('$email', '$password', '$birthdate', '$height', '$weight', '$gender', '$first_name', '$last_name', '$phone_num', '$address')";

    if ($conn->query($sql) === TRUE) {
        header("Location: Loggedin.html"); // Redirect to a success page
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
