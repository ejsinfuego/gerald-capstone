<?php 
session_start();

	include("connection.php");

  if(!isset($category)){
    $category = 1;
  }
  
  $breakfast_day1 = $database->query('select * from meal_plans where category_id='.$category.' and daily_meal_schedule = "day1" and plan_name = "breakfast"');
  $breakfast_day1 = $breakfast_day1->fetch_assoc();
  
  $lunch_day1 = $database->query('select * from meal_plans where category_id='.$category.' and daily_meal_schedule = "day1" and plan_name = "lunch"');
  $lunch_day1 = $lunch_day1->fetch_assoc();
  
  $snack_day1 = $database->query('select * from meal_plans where category_id='.$category.' and daily_meal_schedule = "day1" and plan_name = "snack"');
  $snack_day1 = $snack_day1->fetch_assoc();
  
  $dinner_day1 = $database->query('select * from meal_plans where category_id='.$category.' and daily_meal_schedule = "day1" and plan_name = "dinner"');
  $dinner_day1 = $dinner_day1->fetch_assoc();

  $user = 0;

  if(isset($_SESSION['user_id'])){
    $user = $_SESSION['user_id'];
  }else{
    $user = 0;
  }

  $plans = $database->query('select * from goals where user_id = '.$user.'');

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

  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

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
            
              <ul>
                
                  <ul>
                    
                  </ul>
                </li>
                
              </ul>
            </li>
            <li><a class="nav-link scrollto" id="openModalLink">BMI Calculator</a></li>
            <a href="login.php">
            <input style="border: none;" type="hidden" name="logout">
            <li><button type="submit" class="getstarted scrollto">
              Login
            </button></li>
            </a>
            
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
              <input class="mb-4" type="number" name="age" id="age"><br>
              <a id="calculate" class="mb-2" onclick="calculateBMI()">Calculate BMI</a>
              <h2 id="result"></h2>
              <input type="hidden" name="bmi" id="bmiInput">
              <input type="hidden" name="category" id="categoryInput">
              <a href="login
			  .php" class="mt-3" type="submit" name="submit">
              Save
			 </a>
              </form>
              <br>

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

<section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
      <h1 style="font-family: roboto">Your Online Health and Wellness Consultant </h1>
      <h2 style="font-family: roboto;">We are team of Health and Wellness Expert</h2>
      <a href="#meals" class="btn-get-started scrollto">Get's Started</a>
    </div>
  </section><!-- End Hero -->
  <section id="portfolio" data-aos="fade-up" class="portfolio" style="margin-top: 100px;">
      <div class="container d-flex flex-wrap">
  <div class="section-title w-100" data-aos="fade-left">
          <h2>Meal Recommendations</h2>
          <p style = "font-size: larger;">These are the Health Goals: </p>
  </div>
  <h5 style="font-family:Arial, sans-serif" class="card-title w-100 mb-4">Day 1</h5>
  <div class="card mx-3" style="width: 18rem; font-family:Arial,sans-serif;">
  <img src="assets/img/samlpe.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title" style="font-family:Arial,sans-serif;" ><?php echo ucfirst($breakfast_day1['plan_name']); ?></h5>
    <p class="card-text">These are the meals recommended for this period</p>
  </div>
  <ul class="list-group list-group-flush">
  <?php $meals = explode("\n", $breakfast_day1["portion_sizes"]); 
        foreach($meals as $meal):
  ?>
    <li class="list-group-item"><?php echo ucwords($meal); ?></li>
    <?php endforeach; ?>
  </ul>
  <?php foreach($plans as $goal) :?>
    
  <?php if($goal['type_id'] != $breakfast_day1['id']):?>
    <?php else: ?>
    <?php $form = '<a href="#" class="btn-sm" style="padding-left: 15px; padding-bottom: 10px;">Aready Included in Your Plan</a> '; 
    break; ?>
    <?php endif; ?>
    
    <?php endforeach;?>
    <?php $form = '<div class="card-body">
    <form action="setGoal.php" method="post">
    <input type="hidden" value='.$breakfast_day1['id'].' name="goal_type">
    <label id="plan" class="plan" style="font-family:Arial,sans-serif; font-size: 11px;">Set Target Date</label>
    <input type="date" name="target_date" id="plan" class="plan form-control">
    <button type="submit" class="btn card-link">Include in my Plan</button>
    </form>
    </div>'; ?>
    <?php echo $form; ?>
</div>

<div class="card mx-3" style="width: 18rem; font-family:Arial,sans-serif;">
  <img src="assets/img/samlpe.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title" style="font-family:Arial,sans-serif;" ><?php echo ucfirst( $lunch_day1['plan_name']); ?></h5>
    <p class="card-text">These are the meals recommended for this period</p>
  </div>
  <ul class="list-group list-group-flush">
  <?php $meals = explode("\n", $lunch_day1["portion_sizes"]); 
        foreach($meals as $meal):
  ?>
    <li class="list-group-item"><?php echo ucwords($meal); ?></li>
    <?php endforeach; ?>
  </ul>
  <?php foreach($plans as $goal) :?>
    <?php if($goal['type_id'] != $lunch_day1['id']):?>
      <?php $form = '<div class="card-body">
    <form action="setGoal.php" method="post">
    <input type="hidden" value='.$lunch_day1['id'].' name="goal_type">
    <label id="plan" class="plan" style="font-family:Arial,sans-serif; font-size: 11px;">Set Target Date</label>
    <input type="date" name="target_date" id="plan" class="plan form-control">
    <button type="submit" class="btn card-link">Include in my Plan</button>
    </form>
  </div>'; ?>
  <?php else: ?>
    <?php $form = '<a href="#" class="btn-sm" style="padding-left: 15px; padding-bottom: 10px;">Aready Included in Your Plan</a> ';
    break; ?>
    <?php endif; ?>
    <?php endforeach;?>
    <?php echo $form; ?>
</div>

<div class="card mx-3" style="width: 18rem; font-family:Arial,sans-serif;">
  <img src="assets/img/samlpe.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title" style="font-family:Arial,sans-serif;" ><?php echo ucfirst( $snack_day1['plan_name']); ?></h5>
    <p class="card-text">These are the meals recommended for this period</p>
  </div>
  <ul class="list-group list-group-flush">
  <?php $meals = explode("\n", $snack_day1["portion_sizes"]); 
        foreach($meals as $meal):
  ?>
    <li class="list-group-item"><?php echo ucwords($meal); ?></li>
    <?php endforeach; ?>
  </ul>
  <?php foreach($plans as $goal) :?>
    <?php if($goal['type_id'] != $snack_day1['id']):?>
      <?php $form = '<div class="card-body">
    <form action="setGoal.php" method="post">
    <input type="hidden" value='.$snack_day1['id'].' name="goal_type">
    <label id="plan" class="plan" style="font-family:Arial,sans-serif; font-size: 11px;">Set Target Date</label>
    <input type="date" name="target_date" id="plan" class="plan form-control">
    <button type="submit" class="btn card-link">Include in my Plan</button>
    </form>
  </div>'; ?>
  <?php else: ?>
      <?php $form = '<a href="#" class="btn-sm" style="padding-left: 15px; padding-bottom: 10px;">Aready Included in Your Plan</a> '; ?>
    <?php endif; ?>
    <?php endforeach;?>
    <?php echo $form; ?>


</div>
<div id="meals" >

</div>

<div class="card mx-3" style="width: 18rem; font-family:Arial,sans-serif;">
  <img src="assets/img/samlpe.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title" style="font-family:Arial,sans-serif;" ><?php echo ucfirst($dinner_day1['plan_name']); ?></h5>
    <p class="card-text">These are the meals recommended for this period</p>
  </div>
  <ul class="list-group list-group-flush">
  <?php $meals = explode("\n", $dinner_day1["portion_sizes"]); 
        foreach($meals as $meal):
  ?>
    <li class="list-group-item"><?php echo ucwords($meal); ?></li>
    <?php endforeach; ?>
  </ul>
  <?php foreach($plans as $goal) :?>
    <?php if($goal['type_id'] != $dinner_day1['id']):?>
    <?php $form = '<div class="card-body">
    <form action="setGoal.php" method="post">
    <input type="hidden" value='.$dinner_day1['id'].' name="goal_type">
    <label id="plan" class="plan" style="font-family:Arial,sans-serif; font-size: 11px;">Set Target Date</label>
    <input type="date" name="target_date" id="plan" class="plan form-control">
    <button type="submit" class="btn card-link">Include in my Plan</button>
    </form>
  </div>'; ?>
  <?php else: ?>
      <?php $form = '<a href="#" class="btn-sm" style="padding-left: 15px; padding-bottom: 10px;">Aready Included in Your Plan</a> '; 
      break; ?>
    <?php endif; ?>
 
    <?php endforeach;?>
    <?php echo $form; ?>
    <!-- <a href="#" class="btn-sm" style="padding-left: 15px; padding-bottom: 10px;">Aready Included in Your Plan</a> -->


</div>
      </div>
  </section>

  <!-- ======= Footer ======= -->s
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Heath and Wellness</h3>
            <p>
              Goa, camarines-sur <br>
              San Juan Evangelista Street<br>
              philippines<br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Team</h4>
            <p>Send Us your message</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">
    
      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Health and Wellness</span></strong>. All Rights Reserved 2023
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bethany-free-onepage-bootstrap-theme/ -->
          Designed by <a href="https://web.facebook.com/GeraldJean.villar.34">Gerald Villar</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>