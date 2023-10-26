<?php 

session_start();

include('connection.php');


//set date

if($_POST){
    $goal_type = $_POST['goal_type'];
    $description = $_POST['description'];
    $completion_date = $_POST['completion_date'];
    $goal_id = $_POST['goal_id']; 

    $user = $_SESSION['user_id'];
    //insert into achievement table
    $database->query("insert into achievement (user_id, goal_id, achievement_name, description, completion_date) values('$user', '$goal_id', '$goal_type', '$description', '$completion_date')");
    header('location: healthgoal.php');
    //update goal table
}
