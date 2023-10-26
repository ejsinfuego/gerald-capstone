<?php 

session_start();

include('connection.php');

if($_POST){
    $goal_type = $_POST['goal_type'];
    $target_date = $_POST['target_date'];
    $type = 'meal';

    $user = $_SESSION['user_id'];
    //insert into database
    $database->query("insert into goals (user_id, type_id, type, target_date) values('$user', '$goal_type', '$type', '$target_date')");
    header('location: healthgoal.php');
}