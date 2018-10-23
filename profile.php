<?php include "functions/account-session.php";?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile &bull; Online Room Reservation System</title>
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
        <li><a href="home.php">Home</a></li>
        <li><a href="reserve.php">Reserve Room</a></li>
        <li><a href="reservations.php">Reservations</a></li>
        <li><a href="records.php">Records</a></li>
        <li class="dropdown active">
	        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?=$cos_row['firstname'];?> <?=$cos_row['lastname'];?>
	        <span class="caret"></span></a>
	        <ul class="dropdown-menu">
	          <li><a href="profile.php"><i class="fa fa-user fa-fw"></i> Profile</a></li>
	          <li><a href="functions/verify-logout.php"><i class="fa fa-sign-out-alt fa-fw"></i> Log Out</a></li>
	        </ul>
	    </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
  <h2>Profile</h2>
  <hr>
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
  <div class="row">
    <div class="col-lg-4 col-sm-4">
      <center>
      <img src="<?=$cos_row['costumer_img'];?>" class="img-responsive img-circle img-thumbnail" style="width: 225px; height: 225px;">
      </center>
    </div>
    <div class="col-lg-8 col-sm-8">
      <button class="btn btn-default btn-lg pull-right margin-top" data-toggle="modal" data-target="#edit-profile"><i class="fa fa-edit fa-fw"></i> Edit Profile</button>
      <?php include "modals/modal-editprofile.php";?>
      <h2 class="margin-top-sm"><?=$cos_row['firstname'];?> <?=$cos_row['lastname'];?></h2>
      <p class="text-muted"><i class="fa fa-clock fa-fw"></i> <?=date("F j, Y - h:ia", strtotime($cos_row['account_created']));?></p>
      <p class="lead margin-top-lg"><strong>E-mail: </strong><?=$cos_row['email'];?></p>
      <p class="lead"><strong>Password: </strong><?=$cos_row['password'];?></p>
      <p class="lead"><strong>Gender: </strong><?=$cos_row['gender'];?></p>
      <p class="lead"><strong>Address: </strong><?=$cos_row['address'];?></p>
    </div>
  </div>
  <p class="text-center text-muted margin-bottom-lg" style="margin-top: 100px;">&copy; Online Room Reservation System 2017</p>
</div>
</body>
</html>