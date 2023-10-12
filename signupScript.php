<?php
session_start();
include('connection.php');
if ($_POST) {
    // Retrieve form data
    var_dump($_POST);
    $email = $_POST["email"];
    $password = $_POST["pass"];
    $confirm_password = $_POST["cpass"];
    $height = $_POST["height"];
    $weight = $_POST["weight"];
    $gender = $_POST["gender"];
    $first_name = $_POST["fname"];
    $last_name = $_POST["lname"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    var_dump($_POST);
    // Validation (you can add more validation as needed)
    if ($password !== $confirm_password) {
        header("Location: signup.html?error=Passwords do not match");
        exit();
    }

    // Database connection

    // Insert data into the database
    $user = $database->query("INSERT INTO user (email, password, gender, first_name, last_name)
            VALUES ('$email', '$password', '$gender', '$first_name', '$last_name')");
    $user_id = $database->insert_id;
    $bmi = $weight / (($height / 100) * ($height / 100));
    

    $bmi = $database->query("INSERT INTO health_metrics (user_id, height, weight, bmi)
            VALUES ('$user_id', '$height', '$weight', '$bmi')");
    $_SESSION['message'] = 'Registration Successful';
    header('location: index.php');


}

?>
