<!DOCTYPE html>
<html>
<head>
	<title>Admin Log In &bull; Online Room Reservation System</title>
	<?php include "../includes/libraries-in.php";?>
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
  </div>
</nav>
<div class="container">
  <div class="row">
    <div class="col-lg-4 col-sm-4"></div>
    <div class="col-lg-4 col-sm-4">
      <h2>Admin Log In</h2>
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
      <form class="margin-top-lg" action="../functions/verify-login-2.php" autocomplete="off" method="POST">
        <div class="form-group">
          <label>Username:</label>
          <input type="text" class="form-control input-lg" name="username" required="true">
        </div>
        <div class="form-group">
          <label>Password:</label>
          <input type="password" class="form-control input-lg" name="password" required="true">
        </div>
        <button class="btn btn-warning btn-lg" name="submit-login">Log In</button>
      </form>
    </div>
    <div class="col-lg-4 col-sm-4"></div>
  </div>
  <p class="text-center text-muted margin-bottom-lg" style="margin-top: 100px;">&copy; Online Room Reservation System 2017</p>
</div>    
</body>
</html>