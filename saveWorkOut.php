<?php 

session_start();

include('connection.php');


if($_POST){
    $activitiy_id = $_POST['activity_id'];
    $user = $_SESSION['user_id'];
    //insert into database
    $database->query("insert into workout_plans (user_id, exercise_id) values('$user', '$activitiy_id')");
    header('location: healthgoal.php');
}