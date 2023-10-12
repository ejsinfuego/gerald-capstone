<?php

session_start();
?>

<!doctype html>
<html>
  <head>
    
    
    <script src="script.js"></script> 
    <link rel="stylesheet" href="logindesign.css">
    <a href="Loggedin.html">Go back to Homepage</a>
  </head>
<!-- multistep form -->
<form id="msform" action="login.php" method="post">
  <!-- progressbar -->
  <ul id="progressbar">
   
  </ul>
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Login Your Account</h2>
    <h3 class="fs-subtitle"></h3>
    <p style="color: red;">
      <?php
      if(isset($_SESSION['message'])){
          echo $_SESSION['message'];
          unset($_SESSION['message']);
      }
      ?>
    <input type="text" name="email" placeholder="Email" />
    
    <input type="password" name="password" placeholder="Password" />
    
    <div class="remember-me">
      <input type="checkbox" id="remember" name="remember">
      <label for="remember">Remember Me?</label>
  </div>
  
    <a href="forgot password.html">Forgot Password?</a><br>
    
  
   <br> <button type="submit" name="submit" class="submit action-button" target="_top">Login</button>
   
  </fieldset>
</form>
</div>
</html>