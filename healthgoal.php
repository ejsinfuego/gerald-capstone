<?php

include('header.php');

$workout = $database->query('select * from exercise_activity');

$plans = $database->query('select * from goals where user_id = '.$_SESSION['user_id'].'');

$workout_plan = $database->query('select * from user_activity_id where user_id = '.$_SESSION['user_id'].'');

$day1_meal = $database->query('select * from meal_plans where category_id='.$category.' and daily_meal_schedule = "day1"');
$day1_meal = $day1_meal->fetch_all(MYSQLI_ASSOC);

$day2_meal = $database->query('select * from meal_plans where category_id='.$category.' and daily_meal_schedule = "day2"');
$day2_meal = $day2_meal->fetch_all(MYSQLI_ASSOC);

$day3_meal = $database->query('select * from meal_plans where category_id='.$category.' and daily_meal_schedule = "day3"');
$day3_meal = $day3_meal->fetch_all(MYSQLI_ASSOC);

$day4_meal = $database->query('select * from meal_plans where category_id='.$category.' and daily_meal_schedule = "day4"');
$day4_meal = $day4_meal->fetch_all(MYSQLI_ASSOC);

$day5_meal = $database->query('select * from meal_plans where category_id='.$category.' and daily_meal_schedule = "day5"');
$day5_meal = $day5_meal->fetch_all(MYSQLI_ASSOC);


$workout = $database->query('select * from workout_plans inner join exercise_activity on workout_plans.exercise_id = exercise_activity.id where workout_plans.category_id='.$category.'');



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
  <div class="text-center container">
  <button class="btn start">Start your health journey!</button>
  </div>
      <div class="container d-flex flex-wrap">
  <div class="section-title w-100" data-aos="fade-left">
          <h2>Meal Recommendations</h2>
          <p style = "font-size: larger;">These are recommendation according to your BMI : <i><strong><?= $_SESSION['bmi'] .' : ' . $_SESSION['cat']; ?></strong></i> </p>
          <p style = "font-size: larger;">These are the Health Goals: </p>
  </div>
<div class="container">
  <!-- ROW FOR DAY 1 MEAL -->
   <div class="row">
      <h5 style="font-family:Arial, sans-serif" class="card-title w-100 mb-4">Day 1</h5>
        <?php foreach($day1_meal as $day1): ?>
              <?php if($day1['plan_name'] == 'breakfast'): ?>
                <div class="card mx-3" style="width: 18rem; font-family:Arial,sans-serif;">
                <img src="assets/img/samlpe.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title" style="font-family:Arial,sans-serif;" ><?php echo ucfirst($day1['plan_name']); ?></h5>
                  <p class="card-text">These are the meals recommended for this period</p>
                </div>
                <ul class="list-group list-group-flush">
                <?php $meals = explode("\n", $day1["portion_sizes"]); 
                      foreach($meals as $meal):
                ?>
                  <li class="list-group-item"><?php echo ucwords($meal); ?></li>
                  <?php endforeach; ?>
                </ul>
                </div>    
                <?php break; ?>
              </div>
              <?php endif; ?>  
      <?php endforeach; ?>

      <?php foreach($day1_meal as $day1): ?>
              <?php if($day1['plan_name'] == 'lunch'): ?>
                <div class="card mx-3" style="width: 18rem; font-family:Arial,sans-serif;">
                <img src="assets/img/samlpe.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title" style="font-family:Arial,sans-serif;" ><?php echo ucfirst($day1['plan_name']); ?></h5>
                  <p class="card-text">These are the meals recommended for this period</p>
                </div>
                <ul class="list-group list-group-flush">
                <?php $meals = explode("\n", $day1["portion_sizes"]); 
                      foreach($meals as $meal):
                ?>
                  <li class="list-group-item"><?php echo ucwords($meal); ?></li>
                  <?php endforeach; ?>
                </ul>
                </div>    
                <?php break; ?>
              </div>
              <?php endif; ?>  
      <?php endforeach; ?>

      <?php foreach($day1_meal as $day1): ?>
        <?php if($day1['plan_name'] == 'snack'): ?>
          <div class="card mx-3" style="width: 18rem; font-family:Arial,sans-serif;">
          <img src="assets/img/samlpe.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title" style="font-family:Arial,sans-serif;" ><?php echo ucfirst($day1['plan_name']); ?></h5>
            <p class="card-text">These are the meals recommended for this period</p>
          </div>
          <ul class="list-group list-group-flush">
          <?php $meals = explode("\n", $day1["portion_sizes"]); 
                foreach($meals as $meal):
          ?>
            <li class="list-group-item"><?php echo ucwords($meal); ?></li>
            <?php endforeach; ?>
          </ul>
          </div>    
          <?php break; ?>
        </div>
        <?php endif; ?>  
      <?php endforeach; ?>

      <?php foreach($day1_meal as $day1): ?>
        <?php if($day1['plan_name'] == 'dinner'): ?>
          <div class="card mx-3" style="width: 18rem; font-family:Arial,sans-serif;">
          <img src="assets/img/samlpe.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title" style="font-family:Arial,sans-serif;" ><?php echo ucfirst($day1['plan_name']); ?></h5>
            <p class="card-text">These are the meals recommended for this period</p>
          </div>
          <ul class="list-group list-group-flush">
          <?php $meals = explode("\n", $day1["portion_sizes"]); 
                foreach($meals as $meal):
          ?>
            <li class="list-group-item"><?php echo ucwords($meal); ?></li>
            <?php endforeach; ?>
          </ul>
          </div>    
          <?php break; ?>
        </div>
        <?php endif; ?>
      <?php endforeach; ?>  

</div>
<!-- END OF ROW FOR DAY 1 MEALS -->
<!-- ROW FOR WORKOUT -->
<div class="row">
<h5 style="font-family:Arial, sans-serif" class="card-title w-100 mb-4">Workout for Day 1</h5>
      <?php foreach($workout as $exercise): ?>
        <?php if($exercise['plan_name'] == 'day1'): ?>
          <div class="card mx-3" style="width: 18rem; font-family:Arial,sans-serif;">
          <img src="assets/img/samlpe.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title" style="font-family:Arial,sans-serif;" ><?php echo ucfirst($exercise['activity_name']); ?></h5>
            <p class="card-text">These are the meals recommended for this period</p>
          </div>
          <ul class="list-group list-group-flush">
          <?php $meals = explode("\n", $exercise["description"]); 
                foreach($meals as $meal):
          ?>
            <li class="list-group-item"><?php echo ucwords($meal); ?></li>
            <?php endforeach; ?>
          </ul>
          </div>    
          <?php break; ?>
        </div>
        <?php endif; ?>
      <?php endforeach; ?>  
</div>
<!-- END OF ROW FOR WORKOUT -->

<!-- END ROW FOR DAY 1 -->

<!-- ROW FOR DAY 2 MEAL -->
<div class="row">
      <h5 style="font-family:Arial, sans-serif" class="card-title w-100 mb-4">Day 2</h5>
        <?php foreach($day2_meal as $day2): ?>
              <?php if($day2['plan_name'] == 'breakfast'): ?>
                <div class="card mx-3" style="width: 18rem; font-family:Arial,sans-serif;">
                <img src="assets/img/samlpe.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title" style="font-family:Arial,sans-serif;" ><?php echo ucfirst($day2['plan_name']); ?></h5>
                  <p class="card-text">These are the meals recommended for this period</p>
                </div>
                <ul class="list-group list-group-flush">
                <?php $meals = explode("\n", $day2["portion_sizes"]); 
                      foreach($meals as $meal):
                ?>
                  <li class="list-group-item"><?php echo ucwords($meal); ?></li>
                  <?php endforeach; ?>
                </ul>
                </div>    
                <?php break; ?>
              </div>
              <?php endif; ?>  
      <?php endforeach; ?>

      <?php foreach($day2_meal as $day2): ?>
              <?php if($day2['plan_name'] == 'lunch'): ?>
                <div class="card mx-3" style="width: 18rem; font-family:Arial,sans-serif;">
                <img src="assets/img/samlpe.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title" style="font-family:Arial,sans-serif;" ><?php echo ucfirst($day2['plan_name']); ?></h5>
                  <p class="card-text">These are the meals recommended for this period</p>
                </div>
                <ul class="list-group list-group-flush">
                <?php $meals = explode("\n", $day2["portion_sizes"]); 
                      foreach($meals as $meal):
                ?>
                  <li class="list-group-item"><?php echo ucwords($meal); ?></li>
                  <?php endforeach; ?>
                </ul>
                </div>    
                <?php break; ?>
              </div>
              <?php endif; ?>  
      <?php endforeach; ?>

      <?php foreach($day2_meal as $day2): ?>
        <?php if($day2['plan_name'] == 'snack'): ?>
          <div class="card mx-3" style="width: 18rem; font-family:Arial,sans-serif;">
          <img src="assets/img/samlpe.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title" style="font-family:Arial,sans-serif;" ><?php echo ucfirst($day2['plan_name']); ?></h5>
            <p class="card-text">These are the meals recommended for this period</p>
          </div>
          <ul class="list-group list-group-flush">
          <?php $meals = explode("\n", $day2["portion_sizes"]); 
                foreach($meals as $meal):
          ?>
            <li class="list-group-item"><?php echo ucwords($meal); ?></li>
            <?php endforeach; ?>
          </ul>
          </div>    
          <?php break; ?>
        </div>
        <?php endif; ?>  
      <?php endforeach; ?>

      <?php foreach($day2_meal as $day2): ?>
        <?php if($day2['plan_name'] == 'dinner'): ?>
          <div class="card mx-3" style="width: 18rem; font-family:Arial,sans-serif;">
          <img src="assets/img/samlpe.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title" style="font-family:Arial,sans-serif;" ><?php echo ucfirst($day2['plan_name']); ?></h5>
            <p class="card-text">These are the meals recommended for this period</p>
          </div>
          <ul class="list-group list-group-flush">
          <?php $meals = explode("\n", $day2["portion_sizes"]); 
                foreach($meals as $meal):
          ?>
            <li class="list-group-item"><?php echo ucwords($meal); ?></li>
            <?php endforeach; ?>
          </ul>
          </div>    
          <?php break; ?>
        </div>
        <?php endif; ?>
      <?php endforeach; ?>  

</div>
<!-- END OF ROW FOR DAY 2 MEALS -->
<!-- ROW FOR WORKOUT -->
<div class="row">
<h5 style="font-family:Arial, sans-serif" class="card-title w-100 mb-4">Workout for Day 2</h5>
      <?php foreach($workout as $exercise): ?>
        <?php if($exercise['plan_name'] == 'day2'): ?>
          <div class="card mx-3" style="width: 18rem; font-family:Arial,sans-serif;">
          <img src="assets/img/samlpe.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title" style="font-family:Arial,sans-serif;" ><?php echo ucfirst($exercise['activity_name']); ?></h5>
            <p class="card-text">These are the meals recommended for this period</p>
          </div>
          <ul class="list-group list-group-flush">
          <?php $meals = explode("\n", $exercise["description"]); 
                foreach($meals as $meal):
          ?>
            <li class="list-group-item"><?php echo ucwords($meal); ?></li>
            <?php endforeach; ?>
          </ul>
          </div>    
          <?php break; ?>
        </div>
        <?php endif; ?>
      <?php endforeach; ?>  
</div>
<!-- END OF ROW FOR WORKOUT -->

<!-- END ROW FOR DAY 2 -->


<!-- ROW FOR DAY 3 MEAL -->
  <div class="row">
        <h5 style="font-family:Arial, sans-serif" class="card-title w-100 mb-4">Day 3</h5>
          <?php foreach($day3_meal as $day3): ?>
                <?php if($day3['plan_name'] == 'breakfast'): ?>
                  <div class="card mx-3" style="width: 18rem; font-family:Arial,sans-serif;">
                  <img src="assets/img/samlpe.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title" style="font-family:Arial,sans-serif;" ><?php echo ucfirst($day3['plan_name']); ?></h5>
                    <p class="card-text">These are the meals recommended for this period</p>
                  </div>
                  <ul class="list-group list-group-flush">
                  <?php $meals = explode("\n", $day3["portion_sizes"]); 
                        foreach($meals as $meal):
                  ?>
                    <li class="list-group-item"><?php echo ucwords($meal); ?></li>
                    <?php endforeach; ?>
                  </ul>
                  </div>    
                  <?php break; ?>
                </div>
                <?php endif; ?>  
        <?php endforeach; ?>

        <?php foreach($day3_meal as $day3): ?>
                <?php if($day3['plan_name'] == 'lunch'): ?>
                  <div class="card mx-3" style="width: 18rem; font-family:Arial,sans-serif;">
                  <img src="assets/img/samlpe.jpg" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title" style="font-family:Arial,sans-serif;" ><?php echo ucfirst($day3['plan_name']); ?></h5>
                    <p class="card-text">These are the meals recommended for this period</p>
                  </div>
                  <ul class="list-group list-group-flush">
                  <?php $meals = explode("\n", $day3["portion_sizes"]); 
                        foreach($meals as $meal):
                  ?>
                    <li class="list-group-item"><?php echo ucwords($meal); ?></li>
                    <?php endforeach; ?>
                  </ul>
                  </div>    
                  <?php break; ?>
                </div>
                <?php endif; ?>  
        <?php endforeach; ?>

        <?php foreach($day3_meal as $day3): ?>
          <?php if($day3['plan_name'] == 'snack'): ?>
            <div class="card mx-3" style="width: 18rem; font-family:Arial,sans-serif;">
            <img src="assets/img/samlpe.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title" style="font-family:Arial,sans-serif;" ><?php echo ucfirst($day3['plan_name']); ?></h5>
              <p class="card-text">These are the meals recommended for this period</p>
            </div>
            <ul class="list-group list-group-flush">
            <?php $meals = explode("\n", $day3["portion_sizes"]); 
                  foreach($meals as $meal):
            ?>
              <li class="list-group-item"><?php echo ucwords($meal); ?></li>
              <?php endforeach; ?>
            </ul>
            </div>    
            <?php break; ?>
          </div>
          <?php endif; ?>  
        <?php endforeach; ?>

        <?php foreach($day3_meal as $day3): ?>
          <?php if($day3['plan_name'] == 'dinner'): ?>
            <div class="card mx-3" style="width: 18rem; font-family:Arial,sans-serif;">
            <img src="assets/img/samlpe.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title" style="font-family:Arial,sans-serif;" ><?php echo ucfirst($day3['plan_name']); ?></h5>
              <p class="card-text">These are the meals recommended for this period</p>
            </div>
            <ul class="list-group list-group-flush">
            <?php $meals = explode("\n", $day3["portion_sizes"]); 
                  foreach($meals as $meal):
            ?>
              <li class="list-group-item"><?php echo ucwords($meal); ?></li>
              <?php endforeach; ?>
            </ul>
            </div>    
            <?php break; ?>
          </div>
          <?php endif; ?>
        <?php endforeach; ?>  

  </div>
  <!-- END OF ROW FOR DAY 2 MEALS -->
  <!-- ROW FOR WORKOUT -->
  <div class="row">
  <h5 style="font-family:Arial, sans-serif" class="card-title w-100 mb-4">Workout for Day 3</h5>
        <?php foreach($workout as $exercise): ?>
          <?php if($exercise['plan_name'] == 'day3'): ?>
            <div class="card mx-3" style="width: 18rem; font-family:Arial,sans-serif;">
            <img src="assets/img/samlpe.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title" style="font-family:Arial,sans-serif;" ><?php echo ucfirst($exercise['activity_name']); ?></h5>
              <p class="card-text">These are the meals recommended for this period</p>
            </div>
            <ul class="list-group list-group-flush">
            <?php $meals = explode("\n", $exercise["description"]); 
                  foreach($meals as $meal):
            ?>
              <li class="list-group-item"><?php echo ucwords($meal); ?></li>
              <?php endforeach; ?>
            </ul>
            </div>    
            <?php break; ?>
          </div>
          <?php endif; ?>
        <?php endforeach; ?>  
  </div>
  <!-- END OF ROW FOR WORKOUT -->

<!-- END ROW FOR DAY 3 -->


<!-- ROW FOR DAY 4 MEAL -->
<div class="row">
      <h5 style="font-family:Arial, sans-serif" class="card-title w-100 mb-4">Day 4</h5>
        <?php foreach($day4_meal as $day4): ?>
              <?php if($day4['plan_name'] == 'breakfast'): ?>
                <div class="card mx-3" style="width: 18rem; font-family:Arial,sans-serif;">
                <img src="assets/img/samlpe.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title" style="font-family:Arial,sans-serif;" ><?php echo ucfirst($day4['plan_name']); ?></h5>
                  <p class="card-text">These are the meals recommended for this period</p>
                </div>
                <ul class="list-group list-group-flush">
                <?php $meals = explode("\n", $day4["portion_sizes"]); 
                      foreach($meals as $meal):
                ?>
                  <li class="list-group-item"><?php echo ucwords($meal); ?></li>
                  <?php endforeach; ?>
                </ul>
                </div>    
                <?php break; ?>
              </div>
              <?php endif; ?>  
      <?php endforeach; ?>

      <?php foreach($day4_meal as $day4): ?>
              <?php if($day4['plan_name'] == 'lunch'): ?>
                <div class="card mx-3" style="width: 18rem; font-family:Arial,sans-serif;">
                <img src="assets/img/samlpe.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title" style="font-family:Arial,sans-serif;" ><?php echo ucfirst($day4['plan_name']); ?></h5>
                  <p class="card-text">These are the meals recommended for this period</p>
                </div>
                <ul class="list-group list-group-flush">
                <?php $meals = explode("\n", $day4["portion_sizes"]); 
                      foreach($meals as $meal):
                ?>
                  <li class="list-group-item"><?php echo ucwords($meal); ?></li>
                  <?php endforeach; ?>
                </ul>
                </div>    
                <?php break; ?>
              </div>
              <?php endif; ?>  
      <?php endforeach; ?>

      <?php foreach($day4_meal as $day4): ?>
        <?php if($day4['plan_name'] == 'snack'): ?>
          <div class="card mx-3" style="width: 18rem; font-family:Arial,sans-serif;">
          <img src="assets/img/samlpe.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title" style="font-family:Arial,sans-serif;" ><?php echo ucfirst($day4['plan_name']); ?></h5>
            <p class="card-text">These are the meals recommended for this period</p>
          </div>
          <ul class="list-group list-group-flush">
          <?php $meals = explode("\n", $day4["portion_sizes"]); 
                foreach($meals as $meal):
          ?>
            <li class="list-group-item"><?php echo ucwords($meal); ?></li>
            <?php endforeach; ?>
          </ul>
          </div>    
          <?php break; ?>
        </div>
        <?php endif; ?>  
      <?php endforeach; ?>

      <?php foreach($day4_meal as $day4): ?>
        <?php if($day4['plan_name'] == 'dinner'): ?>
          <div class="card mx-3" style="width: 18rem; font-family:Arial,sans-serif;">
          <img src="assets/img/samlpe.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title" style="font-family:Arial,sans-serif;" ><?php echo ucfirst($day4['plan_name']); ?></h5>
            <p class="card-text">These are the meals recommended for this period</p>
          </div>
          <ul class="list-group list-group-flush">
          <?php $meals = explode("\n", $day4["portion_sizes"]); 
                foreach($meals as $meal):
          ?>
            <li class="list-group-item"><?php echo ucwords($meal); ?></li>
            <?php endforeach; ?>
          </ul>
          </div>    
          <?php break; ?>
        </div>
        <?php endif; ?>
      <?php endforeach; ?>  

</div>
<!-- END OF ROW FOR DAY 4 MEALS -->
<!-- ROW FOR WORKOUT -->
<div class="row">
<h5 style="font-family:Arial, sans-serif" class="card-title w-100 mb-4">Workout for Day 4</h5>
      <?php foreach($workout as $exercise): ?>
        <?php if($exercise['plan_name'] == 'day4'): ?>
          <div class="card mx-3" style="width: 18rem; font-family:Arial,sans-serif;">
          <img src="assets/img/samlpe.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title" style="font-family:Arial,sans-serif;" ><?php echo ucfirst($exercise['activity_name']); ?></h5>
            <p class="card-text">These are the meals recommended for this period</p>
          </div>
          <ul class="list-group list-group-flush">
          <?php $meals = explode("\n", $exercise["description"]); 
                foreach($meals as $meal):
          ?>
            <li class="list-group-item"><?php echo ucwords($meal); ?></li>
            <?php endforeach; ?>
          </ul>
          </div>    
          <?php break; ?>
        </div>
        <?php endif; ?>
      <?php endforeach; ?>  
</div>
<!-- END OF ROW FOR WORKOUT -->

<!-- END ROW FOR DAY 4 -->

<!-- ROW FOR DAY 5 MEAL -->
<div class="row">
      <h5 style="font-family:Arial, sans-serif" class="card-title w-100 mb-4">Day 5</h5>
        <?php foreach($day5_meal as $day5): ?>
              <?php if($day5['plan_name'] == 'breakfast'): ?>
                <div class="card mx-3" style="width: 18rem; font-family:Arial,sans-serif;">
                <img src="assets/img/samlpe.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title" style="font-family:Arial,sans-serif;" ><?php echo ucfirst($day5['plan_name']); ?></h5>
                  <p class="card-text">These are the meals recommended for this period</p>
                </div>
                <ul class="list-group list-group-flush">
                <?php $meals = explode("\n", $day5["portion_sizes"]); 
                      foreach($meals as $meal):
                ?>
                  <li class="list-group-item"><?php echo ucwords($meal); ?></li>
                  <?php endforeach; ?>
                </ul>
                </div>    
                <?php break; ?>
              </div>
              <?php endif; ?>  
      <?php endforeach; ?>

      <?php foreach($day5_meal as $day5): ?>
              <?php if($day5['plan_name'] == 'lunch'): ?>
                <div class="card mx-3" style="width: 18rem; font-family:Arial,sans-serif;">
                <img src="assets/img/samlpe.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title" style="font-family:Arial,sans-serif;" ><?php echo ucfirst($day5['plan_name']); ?></h5>
                  <p class="card-text">These are the meals recommended for this period</p>
                </div>
                <ul class="list-group list-group-flush">
                <?php $meals = explode("\n", $day5["portion_sizes"]); 
                      foreach($meals as $meal):
                ?>
                  <li class="list-group-item"><?php echo ucwords($meal); ?></li>
                  <?php endforeach; ?>
                </ul>
                </div>    
                <?php break; ?>
              </div>
              <?php endif; ?>  
      <?php endforeach; ?>

      <?php foreach($day5_meal as $day5): ?>
        <?php if($day5['plan_name'] == 'snack'): ?>
          <div class="card mx-3" style="width: 18rem; font-family:Arial,sans-serif;">
          <img src="assets/img/samlpe.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title" style="font-family:Arial,sans-serif;" ><?php echo ucfirst($day5['plan_name']); ?></h5>
            <p class="card-text">These are the meals recommended for this period</p>
          </div>
          <ul class="list-group list-group-flush">
          <?php $meals = explode("\n", $day5["portion_sizes"]); 
                foreach($meals as $meal):
          ?>
            <li class="list-group-item"><?php echo ucwords($meal); ?></li>
            <?php endforeach; ?>
          </ul>
          </div>    
          <?php break; ?>
        </div>
        <?php endif; ?>  
      <?php endforeach; ?>

      <?php foreach($day5_meal as $day5): ?>
        <?php if($day5['plan_name'] == 'dinner'): ?>
          <div class="card mx-3" style="width: 18rem; font-family:Arial,sans-serif;">
          <img src="assets/img/samlpe.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title" style="font-family:Arial,sans-serif;" ><?php echo ucfirst($day5['plan_name']); ?></h5>
            <p class="card-text">These are the meals recommended for this period</p>
          </div>
          <ul class="list-group list-group-flush">
          <?php $meals = explode("\n", $day5["portion_sizes"]); 
                foreach($meals as $meal):
          ?>
            <li class="list-group-item"><?php echo ucwords($meal); ?></li>
            <?php endforeach; ?>
          </ul>
          </div>    
          <?php break; ?>
        </div>
        <?php endif; ?>
      <?php endforeach; ?>  

</div>
<!-- END OF ROW FOR DAY 5 MEALS -->
<!-- ROW FOR WORKOUT -->
<div class="row">
<h5 style="font-family:Arial, sans-serif" class="card-title w-100 mb-4">Workout for Day 5 </h5>
      <?php foreach($workout as $exercise): ?>
        <?php if($exercise['plan_name'] == 'day5'): ?>
          <div class="card mx-3" style="width: 18rem; font-family:Arial,sans-serif;">
          <img src="assets/img/samlpe.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title" style="font-family:Arial,sans-serif;" ><?php echo ucfirst($exercise['activity_name']); ?></h5>
            <p class="card-text">These are the meals recommended for this period</p>
          </div>
          <ul class="list-group list-group-flush">
          <?php $meals = explode("\n", $exercise["description"]); 
                foreach($meals as $meal):
          ?>
            <li class="list-group-item"><?php echo ucwords($meal); ?></li>
            <?php endforeach; ?>
          </ul>
          </div>    
          <?php break; ?>
        </div>
        <?php endif; ?>
      <?php endforeach; ?>  
</div>
<!-- END OF ROW FOR WORKOUT -->

<!-- END ROW FOR DAY 4 -->

</div>
</section>


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