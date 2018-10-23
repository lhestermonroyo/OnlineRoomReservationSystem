<?php include "functions/account-session.php";?>
<!DOCTYPE html>
<html>
<head>
  <title>Reserve Room &bull; Online Room Reservation System</title>
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
        <li class="active"><a href="reserve.php">Reserve Room</a></li>
        <li><a href="reservations.php">Reservations</a></li>
        <li><a href="records.php">Records</a></li>
        <li class="dropdown">
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
  <h2 class="margin-top-sm">Reserve Room</h2>
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
      <h4 class="margin-top-sm margin-bottom-lg">Search your ideal room</h4>
      <form action="reserve-search.php" method="GET">
        <div class="form-group">
          <label>Room Type:</label>
           <select class="form-control input-lg" name="room_type" <?=$_GET['room_type'];?> required="true">
            <option <?php if($_GET['room_type'] == "Classic"){echo "selected";}?> value="Classic">Classic</option>
            <option <?php if($_GET['room_type'] == "Luxury"){echo "selected";}?> value="Luxury">Luxury</option>
            <option>Select room type...</option>
          </select>
        </div>
        <div class="form-group">
          <label>Room Capacity:</label>
          <select class="form-control input-lg" name="room_capacity" required="true">
            <option <?php if($_GET['room_capacity'] == "6 Persons"){echo "selected";}?> value="6 Persons">6 Persons</option>
            <option <?php if($_GET['room_capacity'] == "5 Persons"){echo "selected";}?> value="5 Persons">5 Persons</option>
            <option <?php if($_GET['room_capacity'] == "4 Persons"){echo "selected";}?> value="4 Persons">4 Persons</option>
            <option <?php if($_GET['room_capacity'] == "3 Persons"){echo "selected";}?> value="3 Persons">3 Persons</option>
            <option <?php if($_GET['room_capacity'] == "2 Persons"){echo "selected";}?> value="2 Persons">2 Persons</option>
            <option <?php if($_GET['room_capacity'] == "1 Person"){echo "selected";}?> value="1 Person">1 Person</option>
            <option>Select room capacity...</option>
          </select>  
        </div>
        <div class="form-group">
          <label>Room Price:</label>
          <input type="text" class="form-control input-lg" value="<?=$_GET['room_price'];?>" name="room_price" required="true">
        </div>
        <button type="submit" class="btn btn-warning btn-lg" name="submit-search"><i class="fa fa-search fa-fw"></i> Search Room</button>
        <a href="reserve.php" class="btn btn-warning btn-lg"><i class="fa fa-th fa-fw"></i> Reset Room List</a>
      </form>
      <hr>
      <?php
        $cnt_room_query = $conn->query("select count(room_id) as room_id from room_tbl where room_type like '%".$_GET['room_type']."%' and room_capacity like '%".$_GET['room_capacity']."%' and room_price like '%".$_GET['room_price']."%'");
        $cnt_room_row = $cnt_room_query->fetch();
        ?>
        <p class="lead"><strong>Results: </strong> <?=$cnt_room_row['room_id'];?> Rooms</p>
        <?php
      ?>  
    </div>
    <div class="col-lg-8 col-sm-8">
      <div class="row">
      <?php  
        if ($cnt_room_row['room_id'] != 0) {
            $room_query = $conn->query("select * from room_tbl where room_type like '%".$_GET['room_type']."%' and room_capacity like '%".$_GET['room_capacity']."%' and room_price like '%".$_GET['room_price']."%' order by room_id asc");
            while ($room_row = $room_query->fetch()) {
              if ($room_row['room_status'] == "Available") {
                ?>
                <div class="col-lg-6 col-sm-6">
                  <div class="panel panel-default">
                    <img src="<?=substr($room_row['room_photo'], 3);?>" class="img-responsive" style="height: 185px; width: 100%;">
                    <div class="panel-body">
                      <h4 class="margin-top-sm margin-bottom"><?=$room_row['room_name'];?> <span class="label label-success"><?=$room_row['room_status'];?></span></h4>
                      <p><?=$room_row['room_description'];?></p>
                      <p><strong>Room Type: </strong> <?=$room_row['room_type'];?></p>
                      <p><strong>Capacity: </strong> <?=$room_row['room_capacity'];?></p>
                      <p><strong>Price: </strong> PHP <?=$room_row['room_price'];?>/Day</p>
                      <button data-toggle="modal" data-target="#selectroom<?=$room_row['room_id']?>" class="btn btn-warning btn-lg btn-block">Select Room</button>
                      <?php include "modals/modal-selectroom.php";?>
                    </div>
                  </div>
                </div>
                <?php
              }
              if ($room_row['room_status'] == "Pending") {
                ?>
                <div class="col-lg-6 col-sm-6">
                  <div class="panel panel-default">
                    <img src="<?=substr($room_row['room_photo'], 3);?>" class="img-responsive" style="height: 185px; width: 100%;">
                    <div class="panel-body">
                      <h4 class="margin-top-sm margin-bottom"><?=$room_row['room_name'];?> <span class="label label-warning"><?=$room_row['room_status'];?></span></h4>
                      <p><?=$room_row['room_description'];?></p>
                      <p><strong>Room Type: </strong> <?=$room_row['room_type'];?></p>
                      <p><strong>Capacity: </strong> <?=$room_row['room_capacity'];?></p>
                      <p><strong>Price: </strong> PHP <?=$room_row['room_price'];?>/Day</p>
                      <a href="" class="btn btn-warning btn-lg btn-block disabled">Select Room</a>
                    </div>
                  </div>
                </div>
                <?php
              }
              else if ($room_row['room_status'] == "On Use") {
                ?>
                <div class="col-lg-6 col-sm-6">
                  <div class="panel panel-default">
                    <img src="<?=substr($room_row['room_photo'], 3);?>" class="img-responsive" style="height: 185px; width: 100%;">
                    <div class="panel-body">
                      <h4 class="margin-top-sm margin-bottom"><?=$room_row['room_name'];?> <span class="label label-default"><?=$room_row['room_status'];?></span></h4>
                      <p><?=$room_row['room_description'];?></p>
                      <p><strong>Room Type: </strong> <?=$room_row['room_type'];?></p>
                      <p><strong>Capacity: </strong> <?=$room_row['room_capacity'];?></p>
                      <p><strong>Price: </strong> PHP <?=$room_row['room_price'];?>/Day</p>
                      <a href="" class="btn btn-warning btn-lg btn-block disabled">Select Room</a>
                    </div>
                  </div>
                </div>
                <?php
              }
            }
          }
          else {
          ?>
            <div class="col-lg-12 col-sm-12">
              <div class="panel panel-default">
                <div class="panel-body text-center">
                  <i class="fa fa-frown fa-fw fa-10x"></i>
                  <p class="lead">No search results.</p>
                </div>
              </div>
            </div>
          <?php
          }
        ?>  
      </div>
    </div>
  </div>    
</div>
<p class="text-center text-muted margin-top-lg margin-bottom-lg">&copy; Online Room Reservation System 2017</p>
</body>
</div>