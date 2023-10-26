<?php 

session_start();

include('connection.php');

if($_GET){
    $exercise_id = $_GET['exercise_id'];
    $user = $_SESSION['user_id'];
    $completion_date = date("Y-m-d");
    //insert into database
    //update by setting the completion date today
    //look for the specific row first
    $exercise = $database->query("select * from user_activity_id where user_id = '$user' and activity_id = '$exercise_id'");

    if($exercise->num_rows > 0){
        //update
        $database->query("update user_activity_id set date_end = '$completion_date' where user_activity_id = '$exercise_id'");
    }else{
        $_SESSION['error'] = "You have not set this exercise as doing yet.";
        header("location: mealplanning.php");
    
}
}