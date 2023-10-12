<?php 
session_start();

include('connection.php');

$user = $database->query('SELECT * FROM user WHERE id = "'.$_SESSION['user_id'].'"');
$user = $user->fetch_assoc();

$category = $database->query("select * from health_metrics where user_id={$user['id']}");
$category = $category->fetch_assoc();
$category = $category['category_id'];



if($user == null){
    header('location: beforeyoulogin.php');
}else{

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Health and Wellness </title>
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
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

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
            <li><a class="nav-link scrollto " href="#portfolio">Health Goal</a></li>
            <li><a class="nav-link scrollto" href="healthgoal.php">Meal Planning</a></li>
            
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
              <button id="closeModal">X</button>
              <h1>BMI Calculator</h1>
              <form method="post" action="savebmi.php">
              <label for="weight">Weight (kg): </label>
              <input type="number" name="weight" id="weight" step="0.01"><br>
              <label for="height">Height (cm): </label>
              <input name="height" type="number" id="height"><br>
              <label for="age">Age: </label>
              <input type="number" name="age" id="age"><br>
              <button id="calculate">Calculate BMI</button>
              <h2 id="result"></h2>
              <input type="hidden" name="bmi" id="bmiInput">
              <input type="hidden" name="category" id="categoryInput">
              <button id="calculate" type="submit" name="submit">
              Save
              </button>
              </form>
              <br>

            </div>
            <script>
              const openModalLink = document.getElementById("openModalLink");
              const modal = document.getElementById("modal");
              const closeModalButton = document.getElementById("closeModal");
              const calculateButton = document.getElementById("calculate");
              const weightInput = document.getElementById("weight");
              const heightInput = document.getElementById("height");
              const ageInput = document.getElementById("age");
              const resultElement = document.getElementById("result");
            
              openModalLink.addEventListener("click", () => {
                modal.style.display = "block";
              });
            
              closeModalButton.addEventListener("click", () => {
                modal.style.display = "none";
              });
            
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


 