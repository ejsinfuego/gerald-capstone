<?php

session_start();

include('connection.php');


if($_POST){
    $name = $_POST['actname'];
    $intensity = $_POST['intensity'];
    $duration = $_POST['duration'];
    $calories = $_POST['calories'];
    $cat = $_POST['body_type'];
    

    $database->query("insert into exercise_activity (activity_name, intensity_level, duration, calories_burned, category_id) values('$name', '$intensity','$duration', '$calories','$cat')");

}
header('location: mealplanning.php');