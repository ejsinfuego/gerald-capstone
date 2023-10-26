<?php 

session_start();

include('connection.php');

if(isset($_POST['completion_date'])){
    //update user_activity_id table by setting the end date
    $user = $_SESSION['user_id'];
    $activity_id = $_POST['user_act_id'];
    $dateEnd = $_POST['completion_date'];
    //insert into database
    //update by setting the completion date today
    //look for the specific row first
    $exercise = $database->query("select * from user_activity_id where user_activity_id = '$activity_id'");
    if($exercise->num_rows > 0){
        //update
        $database->query("update user_activity_id set date_end = '$dateEnd' where user_activity_id = '$activity_id'");
    }
    header('location: mealplanning.php');
    
}else{
$user = $_SESSION['user_id'];
    $activity_id = $_POST['activity_id'];
    $dateStart = date("Y-m-d");

    $database->query("insert into user_activity_id (user_id, activity_id, date_start) values('$user', '$activity_id', '$dateStart')");
    header('location: mealplanning.php');
    
}