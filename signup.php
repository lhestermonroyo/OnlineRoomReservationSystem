<!DOCTYPE html>
<html>
<head>
	<title>Sign Up &bull; Online Room Reservation System</title>
	<?php include "includes/libraries-out.php";?>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#">Online Room Reservation System</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">Home</a></li>
        <li class="active"><a href="signup.php">Sign Up</a></li>
        <li><a href="login.php">Log In</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
  <div class="row">
    <div class="col-lg-2 col-sm-2"></div>
    <div class="col-lg-8 col-sm-8">
      <h2 class="margin-top-sm">Sign Up</h2>
      <p class="text-muted">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <?php
        if (isset($_GET['message'])) {
        ?>
        <div class="alert alert-warning alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?php  
          echo $_GET['message'];
        ?>
        </div>
        <?php  
        }
      ?>
      <form class="row margin-top-lg" action="functions/verify-signup.php" autocomplete="off" method="POST">
        <div class="col-lg-6 col-sm-6">
          <div class="form-group">
            <label>E-mail:</label>
            <input type="email" class="form-control input-lg" name="email" required="true">
          </div>
        </div>
        <div class="col-lg-6 col-sm-6">
          <div class="form-group">
            <label>Password:</label>
            <input type="password" class="form-control input-lg" name="password" required="true">
          </div>
        </div>
        <div class="col-lg-6 col-sm-6">
          <div class="form-group">
            <label>Firstname:</label>
            <input type="text" class="form-control input-lg" name="firstname" required="true">
          </div>
        </div>
        <div class="col-lg-6 col-sm-6">
          <div class="form-group">
            <label>Lastname:</label>
            <input type="text" class="form-control input-lg" name="lastname" required="true">
          </div>
        </div>
        <div class="col-lg-6 col-sm-6">
          <div class="form-group">
            <label>Gender:</label>
            <select class="form-control input-lg" name="gender" required="true">
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              <option selected="selected">Select gender...</option>
            </select>
          </div>
        </div>
        <div class="col-lg-6 col-sm-6">
          <div class="form-group">
            <label>Address:</label>
            <input type="text" class="form-control input-lg" name="address" required="true">
          </div>
        </div>
         <div class="col-lg-12 col-sm-12">
           <button type="submit" class="btn btn-warning btn-lg" name="submit-signup">Create Account</button>
         </div>
      </form>
      <hr>
      <p class="lead text-center">Already have an account? <a href="login.php" class="btn btn-default btn-lg">Log In <i class="fa fa-sign-in-alt fa-fw"></i></a></p>
    </div>
    <div class="col-lg-2 col-sm-2"></div>
  </div>
  <p class="text-center text-muted margin-top-lg margin-bottom-lg">&copy; Online Room Reservation System 2017</p>
</div>
</body>
</html>