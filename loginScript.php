<?php 

session_start();

include('connection.php');

if($_POST){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = $database->query('SELECT * FROM user WHERE email = "'.$email.'"');
    if($user->num_rows > 0){
        $user = $user->fetch_assoc();
        if($user['password'] == $password){
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['first_name'];
            header("Location: loggedin.php");
        }else{
            $_SESSION['message'] = "Wrong Password";
            header('location: beforeyoulogin.php');  
        }
    }else{
        $_SESSION['message'] = "User not found";
        header('location: beforeyoulogin.php');
        echo "User not found";
    }
    
}