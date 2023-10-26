<?php 
session_start();

include('connection.php');


if($_SESSION['user_id'] == null){
  header('location: login.php');
}

$user = $database->query('SELECT * FROM user WHERE id = "'.$_SESSION['user_id'].'"');
$user = $user->fetch_assoc();

$category = $database->query("select * from health_metrics where user_id={$user['id']}");

$category = $category->fetch_assoc();
if(!isset($category)){
  $category = 0;
}else{
  $category = $category['category_id'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title style="font-family: Arial, sans-serif;">Health and Wellness </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/icon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
  
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>
<style>
  #admin {
  display: none;
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: white;
  border: 1px solid #ccc;
  padding: 30px;
  box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.2);
  z-index: 9999;
  max-width: 90%;
  width: 400px;
  border-radius: 10px;
  }

</style>

<body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
      <div class="header-container d-flex align-items-center justify-content-between">
        <div class="logo">
          <h1 class="text-light"><a href="loggedin.php"><span style="font-family: roboto;">Health and Wellness</span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto active" href="loggedin.php">Home</a></li>
            <li><a class="nav-link scrollto" href="About.html">About</a></li>
            <li><a class="nav-link scrollto" href="you.php">You</a></li>
            <li><a class="nav-link scrollto " href="healthgoal.php">Health Goal</a></li>
            <li><a class="nav-link scrollto" href="mealplanning.php">Meal Planning</a></li>
            <?php if($user['user_type'] == 0) : ?>
            <li><a style="cursor: pointer" onclick="openAdmin()" class="nav-link scrollto">Add Meal Plan</a></li>
            <li><a onclick="openWorkout()" class="nav-link scrollto">Add Workout</a></li>
            <?php endif ?>
              <ul>
                
                  <ul>
                    
                  </ul>
                </li>
                
              </ul>
            </li>
            <li><a class="nav-link scrollto" id="openModalLink">BMI Calculator</a></li>
            <form method="get" action="logout.php">
            <input style="border: none;" type="hidden" name="logout">
            <li><button type="submit" class="getstarted scrollto">
              <?php echo(isset($_SESSION['username']) ? 'Logout' : "Login"); ?>
            </button></li>
            </form>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

      </div><!-- End Header Container -->
    </div>
  </header><!-- End Header -->

              <div id="modal">
              <button onclick="closeModal()" class="closeModal" id="closeModal">X</button>
              <h1>BMI Calculator</h1>
              <form method="post" action="savebmi.php">
              <label for="weight">Weight (kg): </label>
              <input type="number" name="weight" id="weight" step="0.01"><br>
              <label for="height">Height (cm): </label>
              <input name="height" type="number" id="height"><br>
              <label for="age">Age: </label>
              <input type="number" name="age" id="age"><br>
              <a id="calculate" onclick="calculateBMI()">Calculate BMI</a>
              <h2 id="result"></h2>
              <input type="hidden" name="bmi" id="bmiInput">
              <input type="hidden" name="category" id="categoryInput">
              <button class="btn btn-get-started" type="submit" name="submit">
              Save
              </button>
              </form>
              <br>
            </div>


            <div id="admin">
              <a style="cursor:pointer;" onclick="openWorkout()">Add Workout</a>
              <div id="meal">
              <button onclick="closeAdmin()" class="closeModal" id="closeModal">X</button>
              <h1 onclick="openWorkout()">Add Meal Plan</h1>
              <form method="post" action="saveMeal.php">
              <label for="day">Day Number (please enter day(number))</label>
              <input type="text" name="day"><br>
              <label for="meal">Breakfast, Lunch, Snack or Dinner</label>
              <input type="text" name="meal"><br>
              <label for="meals">Meals (Separate using new line)</label>
              <textarea name="meals"></textarea><br>
              <?php $categories = $database->query('select * from category'); ?>
              <label for="body_type">Recommended for what body type</label>
              <select name="body_type">
                <?php foreach($categories as $cats): ?>
                <option value="<?= $cats['id'] ?>"><?= $cats['category'] ?></option>
                <?php endforeach ?>
              </select>
              <h2 id="result"></h2>
              <input type="hidden" name="bmi" id="bmiInput">
              <input type="hidden" name="category" id="categoryInput">
              <button class="btn btn-get-started" type="submit" name="submit">
              Save
              </button>
              </form>
              </div>
              
              <br>
              <div id="addWorkout" style="display: none;">
              <h1 onclick="openWorkout()">Add Workout</h1>
              <form method="post" action="newWorkout.php">
              <label for="actname">Activity Name</label>
              <input type="text" name="actname"><br>
              <label for="intensity">Intensity Level (low, medium, high)</label>
              <input type="text" name="intensity"><br>
              <label for="duration">Duration</label>
              <input type="text" name="duration" pattern="^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$" placeholder="00:00">
              <label for="meals">Calories Burned</label>
              <input type="number" name="calories">
              
              <?php $categories = $database->query('select * from category'); ?>
              <label for="body_type">Recommended for what body type</label>
              <select name="body_type">
                <option value=""></option>
                <?php foreach($categories as $cats): ?>
                <option value="<?= $cats['id'] ?>"><?= $cats['category'] ?></option>
                <?php endforeach ?>
              </select>
              <h2 id="result"></h2>
              <input type="hidden" name="bmi" id="bmiInput">
              <input type="hidden" name="category" id="categoryInput">
              <button class="btn btn-get-started" type="submit" name="submit">
              Save
              </button>
              </form>
              </div>
             
            </div>

  


            
            <script>

              function showDate(){
                const plan = document.getElementsByName("target_date");
                plan.removeAttribute("hidden");
                document.getElementsByClassName("mealModal").setAttribute('type', 'submit');
              }
              const getStarted = document.getElementById("getStarted");

              const openModalLink = document.getElementById("openModalLink");
              const modal = document.getElementById("modal");

              const closeModalButton = document.getElementsByClassName("closeModal");

              const calculateButton = document.getElementById("calculate");
              const weightInput = document.getElementById("weight");
              const heightInput = document.getElementById("height");
              const ageInput = document.getElementById("age");
              const resultElement = document.getElementById("result");
            
              openModalLink.addEventListener("click", () => {
                modal.style.display = "block";
              });
              
              const workout = document.getElementById("addWorkout");
              const meal = document.getElementById("meal");

              function openWorkout(){
                if(meal.style.display == "block"){
                  meal.style.display = "none";
                  workout.style.display = "block";
                }else{
                  meal.style.display = "block";
                  workout.style.display = "none";
                }
                
              }


              const admin = document.getElementById("admin");
              const adminPanel = document.getElementById("adminPanel");

              adminPanel.addEventListener("click", () => {
                admin.style.display = "block";
              });
              
              // script for admin to add meal

              function openAdmin(){
                admin.style.display = "block";
              }

              function closeAdmin(){
                admin.style.display = "none";
              }

              // end script for admin add meal

              


              closeModalButton.addEventListener("click", () => {
                modal.style.display = "none";
              });

              function closeModal(){
                modal.style.display = "none";
              }

              function openModal(){
                modal.style.display = "block";
              }

              calculateButton.addEventListener("click", calculateBMI);
            
              function calculateBMI() {
                const weight = parseFloat(weightInput.value);
                const height = parseFloat(heightInput.value) / 100; // Convert cm to meters
                const age = parseInt(ageInput.value);
                
                if (isNaN(weight) || isNaN(height) || isNaN(age) || height <= 0) {
                  resultElement.textContent = "Please enter valid values.";
                  return;
                }
                
                const bmi = weight / (height * height);
                const category = getBMICategory(bmi);
                resultElement.textContent = `Your BMI: ${bmi.toFixed(2)} - ${category}`;
                document.getElementById("bmiInput").value = bmi.toFixed(2);
              }
            
              function getBMICategory(bmi) {
                if (bmi < 18.5) {
                  document.getElementById("categoryInput").value = "1";
                  return "Underweight";
                } else if (bmi < 24.9) {
                  document.getElementById("categoryInput").value = "2";
                  return "Normal Weight";
                } else if (bmi < 29.9) {
                  document.getElementById("categoryInput").value = "4";
                  return "Overweight";
                } else {
                  document.getElementById("categoryInput").value = "5";
                  return "Obese";
                }
              }
            </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<style>
  
  #workout {
  display: none;
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: white;
  border: 1px solid #ccc;
  padding: 30px;
  box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.2);
  z-index: 9999;
  max-width: 90%;
  width: 400px;
  border-radius: 10px;
  }
</style>
             

 