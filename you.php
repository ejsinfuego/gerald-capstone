<?php 

include('header.php');

$category_word = $database->query("select category from category where id={$category}");
$category_word = $category_word->fetch_column();
if($category_word == null){
    $category_word = "Not set, please set it in bmi calculator";
}else{
    $category_word = $category_word['category'];
}
$progress= 0;
$health_progress = $database->query('select * from achievement where user_id='.$_SESSION['user_id']);

foreach($health_progress as $health_progress){
  $progress = ++$progress;
}
//gets the total count of the goals
$meals = $database->query('select * from goals where user_id='.$_SESSION['user_id']);
$meals = count($meals->fetch_all());
$finished_meals = $database->query('select * from achievement where user_id='.$_SESSION['user_id'].'');

$finished_meals = count($finished_meals->fetch_all());


$finished_activities = 0;


$done_activities = $database->query('select * from user_activity_id where user_id ='.$_SESSION['user_id']);

$activities = count($done_activities->fetch_all()); //count all the unfinished activities

 //get the percentage of the finished activities
foreach($done_activities as $done_activities){
  if($done_activities['date_end'] != '0000-00-00 00:00:00'){
    $finished_activities = ++$finished_activities;
  }
}

$total_goals = $meals + $activities;
$total_achievements = $finished_meals + $finished_activities;
//get the percentage of the progress
if($total_goals == 0 and $total_achievements == 0){
    $progress = 0;
}else{
    $progress = ($total_achievements / $total_goals) * 100;
    $progress = round($progress, 2);
}

if($finished_activities == 0 and $activities == 0){
    $percentage_for_activities = 0;
}else{
    $percentage_for_activities = ($finished_activities / $activities) * 100;
    $percentage_for_activities = round($percentage_for_activities, 2);
}

if($finished_meals == 0 and $meals == 0 ){
    $percentage_for_meals = 0;
}else{
    $percentage_for_meals = ($finished_meals / $meals) * 100;
    $percentage_for_meals = round($percentage_for_meals, 2);
}




$goals = count($database->query('select * from goals where user_id='.$_SESSION['user_id'])->fetch_all());

?>

    <!---- You Section -->
   <!-- ==== You Section ==== -->
   <section id="You" class="you section-bg" style="padding-top: 150px;">
    <div class="container">
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                                    <div class="mt-3">
                                        <h4></h4> </h4>
                                        <p class="text-secondary mb-1"></p>
                                        <p class="text-muted font-size-sm"></p>
                                        <button class="btn btn-primary">Update</button>
                                        <button class="btn btn-outline-primary">View your progress</button>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <ul class="list-group list-group-flush">
                                  
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter me-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                                        <span class="text-secondary"></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram me-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                                        <span class="text-secondary"></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook me-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                                        <span class="text-secondary"></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">

                            <div class="card-body">
                                <form method="post" action="updateProfile.php">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">First Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="first_name" class="form-control" value="<?php echo $user['first_name']; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Last Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="last_name" class="form-control" value="<?php echo $user['last_name']; ?>">
                                    </div>
                                </div>
                              
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="email" class="form-control" value="<?php echo $user['email']; ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="number" type="text" pattern="^\d{11}$" class="for m-control" value="<?php echo (isset($user['phone_number']) ? $user['phone_number'] : 'Not Available'); ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Age</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="age" type="number" class="form-control" value="<?php echo (isset($user['age']) ? $user['age'] : 'Not Available'); ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Gender</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="gender" type="number" class="form-control" value="<?php echo (isset($user['gender']) ? $user['gender'] : 'Not Available'); ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea type="text" name="address" class="form-control" value="<?php echo (isset($user['address']) ? $user['age'] : 'Not Available'); ?>">
                                        <?php echo (isset($user['address']) ? $user['address'] : 'Not Available'); ?></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <button type="submit" class="btn btn-primary px-4" value="Save Changes">Update</button>
                              
                                    </div>
                                    <div class="row my-2">
                                      <div class="col-sm-3"></div>
                                      <div class="col-sm-9 text-secondary">
                                          <button type="button" class="btn btn-primary px-4 delete-button">Delete Account</button>
                                      </div>
                                      </div>
                            </div>
                        </form>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="d-flex align-items-center mb-3">Health Status</h5>
                                        <div class=""> 
                                            <p>BMI</p>
                                           <p>
                                            <?php echo $category_word; ?>
                                           </p>
                                        </div>
                                        <!-- <div>
                                           <p>Physical Fitness</p>
                                        <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div> 
                                        </div> -->
                                        
                                        <p>Health Progress</p>
                                        <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $progress.'%' ; ?>" aria-valuenow="<?php echo $progress; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                       
                                        <p>Meal Planning </p>
                                        <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: <?= $percentage_for_meals; ?>%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p>Workout Ethics </p>
                                        <div class="progress" style="height: 5px">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: <?= $percentage_for_meals ?>%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End You Section -->
  
  <!-- ======= Footer ======= -->
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