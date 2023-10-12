<!doctype html>
<html>
<head>
    <!-- Favicons -->
    <link href="assets/img/icon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <script src="script.js"></script>
    <link rel="stylesheet" href="logindesign.css">
</head>
<!-- multistep form -->
<form id="msform" action="login.php" method="post">
    <!-- progressbar -->
    <ul id="progressbar">
        <li class="active">Account Verification</li>
        <li>BMI Info</li>
        <li>Personal Details</li>
    </ul>
    <h3 class="fs-subtitle">This is step 1</h3>

    <!-- fieldsets -->
    <fieldset>
        <h2 class="fs-title">Create your account</h2>
        <h3 class="fs-subtitle">This is step 1</h3>
        <input type="text" name="email" placeholder="Email" />
        <input type="password" name="pass" placeholder="Password" />
        <input type="password" name="cpass" placeholder="Confirm Password" />
        <a href="beforeyoulogin.html">Already Have an Account?</a><br>
        <br>
        <br>

        <input type="button" name="next" class="next action-button" value="Next" />
    </fieldset>
    <fieldset>
        <h2 class="fs-title"></h2>
        <h3 class="fs-subtitle">Your BMI</h3>
        <input type="date" name="dob" placeholder="Birthday" />
        <input type="text" name="height" placeholder="Height(cm.)" />
        <input type="text" name="weight" placeholder="Weight(kg.)" />
        <label for="Gender"></label>
        <select name="gender" id="Gender">
            <option value="-1">Please Select your gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="none">Prefer not to say</option>
        </select>
        <input type="button" name="previous" class="previous action-button" value="Previous" />
        <input type="button" name="next" class="next action-button" value="Next" />
    </fieldset>
    <fieldset>
        <h2 class="fs-title">Personal Details</h2>
        <h3 class="fs-subtitle">We will never sell it</h3>
        <input type="text" name="fname" placeholder="First Name" />
        <input type="text" name="lname" placeholder="Last Name" />
        <input type="text" name="phone" placeholder="Phone" />
        <textarea name="address" placeholder="Address"></textarea>
        <input type="button" name="previous" class="previous action-button" value="Previous" />
        <input type="submit"  class="action-button"  value="Submit">
    </fieldset>
</form>
<div>
    <script>
       
    </script>
</div>
</html>
