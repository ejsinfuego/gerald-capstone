<?php 

session_start();

include('connection.php');

if($_POST){
    $day = $_POST['day'];
    $meal = $_POST['meal'];
    $meals = $_POST['meals'];
    $category_id = $_POST['body_type'];

    $database->query("insert into meal_plans (plan_name, daily_meal_schedule, portion_sizes, category_id) values('$meal', '$day', '$meals', '$category_id')");
    }
    
header('location: mealplanning.php');