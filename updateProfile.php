<?php 

session_start();

include('connection.php');


//edit profile script
if($_POST){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];

    $user = $_SESSION['user_id'];
    
    //write a code to update user table
    $database->query("UPDATE user SET first_name='$first_name', last_name='$last_name', email='$email', number='$number' , age='$age', gender='$gender',address='$address' WHERE id=".$user);

    header("Location: you.php");
}