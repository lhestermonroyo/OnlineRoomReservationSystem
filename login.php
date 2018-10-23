<!DOCTYPE html>
<html>
<head>
	<title>Log In &bull; Online Room Reservation System</title>
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
        <li><a href="signup.php">Sign Up</a></li>
        <li class="active"><a href="login.php">Log In</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
  <div class="row">
    <div class="col-lg-4 col-sm-4"></div>
    <div class="col-lg-4 col-sm-4">
      <h2 class="margin-top-sm">Log In</h2>
      <p class="text-muted">Ut enim ad minim veniam, quis nostrud exercitation.</p>
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
      <form class="margin-top-lg" action="functions/verify-login.php" autocomplete="off" method="POST">
        <div class="form-group">
          <label>E-mail:</label>
          <input type="email" class="form-control input-lg" name="email" required="true">
        </div>
        <div class="form-group">
          <label>Password:</label>
          <input type="password" class="form-control input-lg" name="password" required="true">
        </div>
        <button class="btn btn-warning btn-lg" name="submit-login">Log In</button>
      </form>
      <hr>
      <p class="lead text-center">No account yet? <a href="signup.php" class="btn btn-default btn-lg">Sign Up <i class="fa fa-pencil-alt fa-fw"></i></a></p>
    </div>
    <div class="col-lg-4 col-sm-4"></div>
  </div>
  <p class="text-center text-muted margin-top-lg margin-bottom-lg">&copy; Online Room Reservation System 2017</p>
</div>    
</body>
</html>