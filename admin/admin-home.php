<?php include "../functions/account-session-2.php";?>
<!DOCTYPE html>
<html>
<head>
  <title>Home &bull; Online Room Reservation System</title>
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
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="admin-home.php">Home</a></li>
        <li><a href="admin-roommanager.php">Room Manager</a></li>
        <li><a href="admin-reservations.php">Reservations</a></li>
        <li><a href="admin-records.php">Records</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?=$admin_row['firstname'];?> <?=$admin_row['lastname'];?>
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="" data-toggle="modal" data-target="#account-settings"><i class="fa fa-cog fa-fw"></i> Account Settings</a></li>
            <li><a href="../functions/verify-logout-2.php"><i class="fa fa-sign-out-alt fa-fw"></i> Log Out</a></li>
          </ul>
      </li>
      </ul>
    </div>
  </div>
</nav>
<?php include "../modals/modal-accountsettings.php";?>
<div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-top: -20px;">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" style="height: 580px;">
    <div class="item active">
      <img src="../web-images/2.jpeg" alt="Chania" style="height: 580px; width: 100%;">
      <div class="carousel-caption">
        <h2>Welcome to Online Room Reservation System</h2>
        <p class="lead">Food is my passion. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <a href="admin-roommanager.php" class="btn btn-warning btn-lg margin-bottom-lg">Room Manager <i class="fa fa-th fa-fw"></i></a>
        <a href="admin-reservations.php" class="btn btn-warning btn-lg margin-bottom-lg">Reservations <i class="fa fa-list fa-fw"></i></a>
      </div>
    </div>
    <div class="item">
      <img src="../web-images/3.jpeg" alt="Chicago" style="height: 580px; width: 100%;">
      <div class="carousel-caption">
        <h2>Welcome to Online Room Reservation System</h2>
        <p class="lead">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <a href="admin-roommanager.php" class="btn btn-warning btn-lg margin-bottom-lg">Room Manager <i class="fa fa-th fa-fw"></i></a>
      </div>
    </div>
    <div class="item">
      <img src="../web-images/5.jpeg" alt="New York" style="height: 580px; width: 100%;">
      <div class="carousel-caption">
        <h2>Welcome to Online Room Reservation System</h2>
        <p class="lead">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit.</p>
        <a href="admin-records.php" class="btn btn-warning btn-lg margin-bottom-lg">Reservations <i class="fa fa-list fa-fw"></i></a>
      </div>
    </div>
  </div>
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="container margin-top-lg margin-bottom-lg">
  <h2 class="text-center">Our Services</h2>
  <div class="row">
    <div class="col-lg-3 col-sm-3 text-center">
      <i class="fa fa-book fa-8x margin-top-lg margin-bottom-lg"></i>
      <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
    </div>
    <div class="col-lg-3 col-sm-3 text-center">
      <i class="fa fa-bed fa-8x margin-top-lg margin-bottom-lg"></i>
      <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
    </div>
    <div class="col-lg-3 col-sm-3 text-center">
      <i class="fa fa-calendar-check fa-8x margin-top-lg margin-bottom-lg"></i>
      <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
    </div>
    <div class="col-lg-3 col-sm-3 text-center">
      <i class="fa fa-tag fa-8x margin-top-lg margin-bottom-lg"></i>
      <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
    </div>
  </div>
</div>
<nav class="navbar navbar-inverse margin-top-lg" style="margin-bottom:-20px;">
  <p class="text-center text-muted padding-lg">&copy; Online Room Reservation System 2017</p>
</nav>
</body>
</html>