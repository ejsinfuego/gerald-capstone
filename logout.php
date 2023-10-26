<?php 

include('connection.php');
session_start();
//write script for logout
if(isset($_GET['logout'])){
	session_destroy();
	unset($_SESSION['user_id']);
	unset($_SESSION['username']);
	header('location: index.php');
}

//write script to check if user is logged in
?>
