<?php

session_start();

include('connection.php');

if($_POST){
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $age = $_POST['age'];
    $bmi = $_POST['bmi'];
    $category = $_POST['category'];
    $user = $_SESSION['user_id'];

    $check = $database->query('SELECT * FROM health_metrics WHERE user_id = "'.$user.'"');


    if($check->num_rows > 0){
        $database->query('UPDATE health_metrics SET weight = "'.$weight.'", height = "'.$height.'", age = "'.$age.'", bmi = "'.$bmi.'", category_id = "'.$category.'" WHERE user_id = "'.$user.'"');

        header('location: mealplanning.php');

    }else{
        $database->query('INSERT INTO health_metrics (user_id, weight, height, age, bmi, category_id) VALUES ("'.$user.'", "'.$weight.'", "'.$height.'", "'.$age.'", "'.$bmi.'", "'.$category.'")');

        header('location: mealplanning.php');
    }
}