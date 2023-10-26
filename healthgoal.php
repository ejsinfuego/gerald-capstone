<?php

include('header.php');

//inner join from goals to meal_plans and to user table
$plans = $database->query('SELECT goals.id, goals.user_id, goals.type_id, goals.type, goals.target_date, meal_plans.plan_name, meal_plans.daily_meal_schedule, meal_plans.portion_sizes FROM goals INNER JOIN meal_plans ON goals.type_id = meal_plans.id INNER JOIN user ON goals.user_id = user.id WHERE goals.user_id = "'.$_SESSION['user_id'].'"');
$plans = $plans->fetch_all(MYSQLI_ASSOC);

//inner join from user_activity_id to exercise_activity table
$workout = $database->query('SELECT * FROM workout_plans INNER JOIN exercise_activity ON workout_plans.exercise_id = exercise_activity.id WHERE workout_plans.user_id = "'.$_SESSION['user_id'].'"');
$workout = $workout->fetch_all(MYSQLI_ASSOC);

//inner join achievement to user_activity_id to exercise_activity
$done_workout = $database->query('SELECT * FROM user_activity_id INNER JOIN workout_plans ON user_activity_id.activity_id = workout_plans.exercise_id INNER JOIN exercise_activity ON workout_plans.exercise_id = exercise_activity.id WHERE user_activity_id.user_id ='.$_SESSION['user_id']);
$done_workout = $done_workout->fetch_all(MYSQLI_ASSOC);

$done_meals = $database->query('SELECT * FROM achievement INNER JOIN goals ON achievement.goal_id = goals.id INNER JOIN meal_plans ON goals.type_id = meal_plans.id where achievement.user_id ='.$_SESSION['user_id'])
?>
<style>
  .card-link{
    color: teal;
  }
  .card-link:hover{
    background-color: teal;
    color: white;
    padding: 10px;
    border-radius: 3px;
  }


  .start{
    margin-top: 50px;
    background-color: teal;
    color: white;
    border-radius: 50px;
  }

  .start:hover{
    background-color: white;
    color: teal;
    border: 1px solid teal;
  }
</style>

    <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" data-aos="fade-up" class="portfolio" style="margin-top: 100px;">

<div class="container d-flex flex-wrap">
  <div class="section-title w-100" data-aos="fade-left">
          <h2>These are your health goals so far.</h2>
          <p style = "font-size: larger;">These are the Health Goals: </p>
  </div>

  <h5 style="font-family:Arial, sans-serif" class="card-title w-100 mb-4">Day 1</h5>
  <?php foreach($plans as $plan) :?>
   
  <div class="card mx-3" style="width: 18rem; font-family:Arial,sans-serif;">
  <img src="assets/img/samlpe.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title" style="font-family:Arial,sans-serif;" ><?php echo ucfirst($plan['plan_name']); ?></h5>
    <p class="card-text">These are the meals recommended for this period</p>
  </div>
  <ul class="list-group list-group-flush">
  <?php $meals = explode("\n", $plan["portion_sizes"]); 
        foreach($meals as $meal):
  ?>
    <li class="list-group-item"><?php echo ucwords($meal); ?></li>
    <?php endforeach; ?>
  </ul
  >  <ul class="list-group list-group-flush">
    <li class="list-group-item">Target Date: <?php echo date('M d, Y', strtotime($plan['target_date'])) ; ?> </li>
  
  </ul>
    <form method="post" action="setAsDone.php">
    <input type="hidden" name="goal_id" value="<?= $plan['id'] ?>">
    <input type="hidden" name="goal_type" value="meal">
    <input type="hidden" name="description" value="<?= $plan['plan_name'] ?>">
    <input type="hidden" name="completion_date" value="<?= date('Y-m-d') ?>">
    <?php $button ='<button type="submit" class="btn card-link">
    Mark as Done</button>
   </form>'; 
    foreach($done_meals as $done_meal) : ?> 
    <?php 
    if( $plan['type_id'] == $done_meal['type_id'] ) :
    $button = '<p class"portfolio" style="margin-left: 20px; margin-top: 10px;">Completed on '.date('M d, Y', strtotime($done_meal['completion_date'])).'</p>';
    break; ?>
    <?php endif; ?>
   <?php endforeach;?>   
   <?= $button ?>
  </div>

  <?php endforeach; ?>






<h5 style="font-family:Arial, sans-serif" class="card-title w-100 mb-4 font-size-bold">Workout</h5>
<?php  foreach($workout as $workout_day): ?>

  <div class="card mx-3" style="width: 18rem; font-family:Arial,sans-serif;">
  <img src="assets/img/workout.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title" style="font-family:Arial,sans-serif;" ><?php echo ucfirst($workout_day['activity_name']); ?></h5>
    <p class="card-text">Recommended work out for your body category</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Intensity Level: <?php echo ucfirst($workout_day['intensity_level']); ?> </li>
  </ul>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Duration: <?php echo date('G', strtotime($workout_day['duration'])). ' Hour/s'; ?> </li>
  </ul>
 
  <div class="card-body">
   <form method="post" action="setAsDoing.php">
    <input type="hidden" name="activity_id" value="<?php echo $workout_day['exercise_id']; ?>">
   <?php $submit= '<button type="submit" class="btn card-link">
    Set as Doing</button>';
    
     foreach($done_workout as $workout): ?>
    <?php if($workout_day['exercise_id'] == $workout['activity_id']): ?>
      <?php if($workout['date_end'] != '0000-00-00 00:00:00'): ?>
        <?php $submit = '<p class"portfolio" style="margin-left: 20px; margin-top: 10px;">Done</p>'; break; ?>
      <?php endif; ?>
      <input type="hidden" name="user_act_id" value="<?php echo $workout['user_activity_id']; ?>">
        <input type='hidden' name='completion_date' value='<?php echo date('Y-m-d'); ?>'>
    <?php
      $submit = "<button type='submit' class='btn card-link'>Set As Done</button></form>"; break; ?>
    <?php endif; ?>
  <?php endforeach; ?>
<?= $submit ?>
</form>
</div>
</div>
<?php endforeach; ?>


    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container">

        <div class="row">
          <div class="col-lg-4">
            <div class="section-title" data-aos="fade-right">
              <h2>Health Facts that you should Know </h2>
              <p> This might help you soon.</p>
            </div>
          </div>
          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="50">

            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="50">
              <div class="swiper-wrapper">

                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <p>
                      <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                      Added Sugar Is a Disaster.
                      <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    <img src="" class="testimonial-img" alt="">
                    <h3>Health Facts </h3> 
                  </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <p>
                      <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                      Omega-3 Fats Are Crucial and Most People Don't Get Enough.
                      <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    <img src="" class="testimonial-img" alt="">
                    <h3>Health Facts </h3>
                    
                  </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <p>
                      <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                      There Is No Perfect Diet for Everyone, but you can still do it.
                      <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    <img src="" class="testimonial-img" alt="">
                    <h3>Health Facts</h3>
                    
                  </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <p>
                      <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                      Artificial Trans Fats Are Very Unhealthy.
                      <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    <img src="" class="testimonial-img" alt="">
                    <h3>Health Facts </h3>
                    

                  </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <p>
                      <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                      It Is Critical to Avoid a Vitamin D Deficiency.
                      <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                    <img src="" class="testimonial-img" alt="">
                    <h3>Health Facts</h3>
                    
                  </div>
                </div><!-- End testimonial item -->

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="row">
          <div class="col-lg-4">
            <div class="section-title" data-aos="fade-right">
              <h2>Team</h2>
              <p>We are a group of studdents.</p>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="row">

              <div class="col-lg-6">
                <div class="member" data-aos="zoom-in" data-aos-delay="100">
                  <div class="pic"><img src="" class="img-fluid" alt=""></div>
                  <div class="member-info">
                    <h4>Raymond Lopez</h4>
                    <span>Developer</span>
                    <p>Studied at Partido State University</p>
                    <div class="social">
                      <a href=""><i class="ri-twitter-fill"></i></a>
                      <a href=""><i class="ri-facebook-fill"></i></a>
                      <a href=""><i class="ri-instagram-fill"></i></a>
                      <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 mt-4 mt-lg-0">
                <div class="member" data-aos="zoom-in" data-aos-delay="200">
                  <div class="pic"><img src="" class="img-fluid" alt=""></div>
                  <div class="member-info">
                    <h4>Gerald Villar </h4>
                    <span>Developer </span>
                    <p>Studied at Partido State University</p>
                    <div class="social">
                      <a href=""><i class="ri-twitter-fill"></i></a>
                      <a href=""><i class="ri-facebook-fill"></i></a>
                      <a href=""><i class="ri-instagram-fill"></i></a>
                      <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 mt-4">
                <div class="member" data-aos="zoom-in" data-aos-delay="300">
                  <div class="pic"><img src="" class="img-fluid" alt=""></div>
                  <div class="member-info">
                    <h4>Arabela Del Valle</h4>
                    <span>Developer</span>
                    <p>Studied at Partido State University</p>
                    <div class="social">
                      <a href=""><i class="ri-twitter-fill"></i></a>
                      <a href=""><i class="ri-facebook-fill"></i></a>
                      <a href=""><i class="ri-instagram-fill"></i></a>
                      <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 mt-4">
                <div class="member" data-aos="zoom-in" data-aos-delay="400">
                  <div class="pic"><img src="" class="img-fluid" alt=""></div>
                  <div class="member-info">
                    <h4>RJ Abio </h4>
                    <span>Advisor</span>
                    <p>Works at Partido State University</p>
                    <div class="social">
                      <a href=""><i class="ri-twitter-fill"></i></a>
                      <a href=""><i class="ri-facebook-fill"></i></a>
                      <a href=""><i class="ri-instagram-fill"></i></a>
                      <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                    </div>
                  </div>
                </div>
              </div>

            </div>

          </div>
        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <div class="section-title">
              <h2>Contact</h2>
              <p></p>
            </div>
          </div>

          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
            <!-- <iframe style="border:0; width: 100%; height: 270px;" src="http://www.maplandia.com/philippines/region-5/camarines-sur/goa/" title="google satellite map of Goa"><img src="http://www.maplandia.com/images/icon.gif" width="88" height="31" border="0" alt="Goa google map"/></a>" frameborder="0" allowfullscreen></iframe> -->
            <div class="info mt-4">
              <i class="bi bi-geo-alt"></i>
              <h4>Location:</h4>
              <p>San Juan Evangelista Street, Goa, Camarines Sur</p>
            </div>
            <div class="row">
              <div class="col-lg-6 mt-4">
                <div class="info">
                  <i class="bi bi-envelope"></i>
                  <h4>Email:</h4>
                  <p>info@example.com</p>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="info w-100 mt-4">
                  <i class="bi bi-phone"></i>
                  <h4>Call:</h4>
                  <p>+1 5589 55488 55s</p>
                </div>
              </div>
            </div>

            <form action="forms/contact.php" method="post" role="form" class="php-email-form mt-4">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>
        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

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
          <!-- Designed by <a href="https://web.facebook.com/GeraldJean.villar.34">Gerald Villar</a> -->
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