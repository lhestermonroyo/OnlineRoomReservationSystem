<?php include "../functions/account-session-2.php";?>
<!DOCTYPE html>
<html>
<head>
  <title>Room Manager &bull; Online Room Reservation System</title>
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
        <li><a href="admin-home.php">Home</a></li>
        <li class="active"><a href="admin-roommanager.php">Room Manager</a></li>
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
<div class="container">
  <h2 class="margin-top-sm">Room Manager</h2>
  <hr>
  <button class="btn btn-default btn-lg margin-bottom-lg" data-toggle="collapse" data-target="#newroom"><i class="fa fa-plus fa-fw"></i> New Room</button>
  <div id="newroom" class="collapse margin-bottom-lg">
    <form class="form-horizontal" action="../functions/save-room.php" enctype="multipart/form-data" autocomplete="off" method="POST">
      <div class="form-group">
        <label class="control-label col-sm-2">Room Name:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control input-lg" name="room_name" required="true">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Description:</label>
        <div class="col-sm-10"> 
          <textarea class="form-control input-lg" name="room_description" maxlength="125" required="true"></textarea>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Room Type:</label>
        <div class="col-sm-10"> 
          <select class="form-control input-lg" name="room_type" required="true">
            <option value="Classic">Classic</option>
            <option value="Luxury">Luxury</option>
            <option selected="selected">Select room type...</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Room Capacity:</label>
        <div class="col-sm-10"> 
          <select class="form-control input-lg" name="room_capacity" required="true">
            <option value="6 Persons">6 Persons</option>
            <option value="5 Persons">5 Persons</option>
            <option value="4 Persons">4 Persons</option>
            <option value="3 Persons">3 Persons</option>
            <option value="2 Persons">2 Persons</option>
            <option value="1 Person">1 Person</option>
            <option selected="selected">Select room capacity...</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Room Price:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control input-lg" name="room_price" required="true">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Room Photo:</label>
        <div class="col-sm-10">
          <input type="file" class="form-control input-lg" name="room_photo" required="true">
        </div>
      </div>
      <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-warning btn-lg margin-bottom-lg" name="submit-room">Save Room</button>
        </div>
      </div>
    </form>
    <hr>
  </div>
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
    <?php
      $cnt_room_query = $conn->query("select count(room_id) as room_id from room_tbl");
      $cnt_room_row = $cnt_room_query->fetch();

      if ($cnt_room_row['room_id'] != 0) {
        $room_query = $conn->query("select * from room_tbl order by room_id asc");
        while ($room_row = $room_query->fetch()) {
          if ($room_row['room_status'] == "Available") {
            ?>
            <div class="col-lg-4 col-sm-4">
              <div class="panel panel-default">
                <img src="<?=$room_row['room_photo'];?>" class="img-responsive" style="height: 185px; width: 100%;">
                <div class="panel-body">
                  <div class="dropdown pull-right">
                    <button class="btn btn-default btn-lg no-border dropdown-toggle" style="margin-top: -7px;" type="button" data-toggle="dropdown"><i class="fa fa-ellipsis-v fa-fw"></i></button>
                    <ul class="dropdown-menu">
                      <li><a href="#" data-toggle="modal" data-target="#editroom<?=$room_row['room_id'];?>"><i class="fa fa-edit fa-fw"></i> Edit</a></li>
                      <li><a href="#" data-toggle="modal" data-target="#deleteroom<?=$room_row['room_id'];?>"><i class="fa fa-trash fa-fw"></i>Delete</a></li>
                    </ul>
                  </div>
                  <?php
                    include "../modals/modal-editroom.php";
                    include "../modals/modal-deleteroom.php";
                  ?>
                  <h4 class="margin-top-sm margin-bottom"><?=$room_row['room_name'];?> <span class="label label-success"><?=$room_row['room_status'];?></span></h4>
                  <p><?=$room_row['room_description'];?></p>
                  <p><strong>Room Type: </strong> <?=$room_row['room_type'];?></p>
                  <p><strong>Capacity: </strong> <?=$room_row['room_capacity'];?></p>
                  <p><strong>Price: </strong> PHP <?=$room_row['room_price'];?>/Day</p>
                  <p class="text-muted margin-top-lg"><i class="fa fa-clock fa-fw"></i> <?=date("F j, Y - h:ia", strtotime($room_row['room_added']));?></p>
                </div>
              </div>
            </div>
            <?php
          }
          else if ($room_row['room_status'] == "Pending") {
            ?>
            <div class="col-lg-4 col-sm-4">
              <div class="panel panel-default">
                <img src="<?=$room_row['room_photo'];?>" class="img-responsive" style="height: 185px; width: 100%;">
                <div class="panel-body">
                  <h4 class="margin-top-sm margin-bottom"><?=$room_row['room_name'];?> <span class="label label-warning"><?=$room_row['room_status'];?></span></h4>
                  <p><?=$room_row['room_description'];?></p>
                  <p><strong>Room Type: </strong> <?=$room_row['room_type'];?></p>
                  <p><strong>Capacity: </strong> <?=$room_row['room_capacity'];?></p>
                  <p><strong>Price: </strong> PHP <?=$room_row['room_price'];?>/Day</p>
                  <p class="text-muted margin-top-lg"><i class="fa fa-clock fa-fw"></i> <?=date("F j, Y - h:ia", strtotime($room_row['room_added']));?></p>
                </div>
              </div>
            </div>
            <?php
          }
          else if ($room_row['room_status'] == "On Use") {
            ?>
            <div class="col-lg-4 col-sm-4">
              <div class="panel panel-default">
                <img src="<?=$room_row['room_photo'];?>" class="img-responsive" style="height: 185px; width: 100%;">
                <div class="panel-body">
                  <h4 class="margin-top-sm margin-bottom"><?=$room_row['room_name'];?> <span class="label label-default"><?=$room_row['room_status'];?></span></h4>
                  <p><?=$room_row['room_description'];?></p>
                  <p><strong>Room Type: </strong> <?=$room_row['room_type'];?></p>
                  <p><strong>Capacity: </strong> <?=$room_row['room_capacity'];?></p>
                  <p><strong>Price: </strong> PHP <?=$room_row['room_price'];?>/Day</p>
                  <p class="text-muted margin-top-lg"><i class="fa fa-clock fa-fw"></i> <?=date("F j, Y - h:ia", strtotime($room_row['room_added']));?></p>
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
              <p class="lead">No room added yet.</p>
            </div>
          </div>
        </div>
      <?php
      }
    ?>
  </div>
  <p class="text-center text-muted margin-top-lg margin-bottom-lg">&copy; Online Room Reservation System 2017</p>
</div>
</body>
</html>