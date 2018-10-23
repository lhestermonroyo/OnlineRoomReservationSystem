<?php include "../functions/account-session-2.php";?>
<!DOCTYPE html>
<html>
<head>
  <title>Reservations &bull; Online Room Reservation System</title>
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
        <li><a href="admin-roommanager.php">Room Manager</a></li>
        <li class="active"><a href="admin-reservations.php">Reservations</a></li>
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
  <h2 class="margin-top-sm">Reservations</h2>
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
  <?php
    $cnt_res_query = $conn->query("select count(res_id) as res_id from reservation_tbl");
    $cnt_res_row = $cnt_res_query->fetch();

    if ($cnt_res_row['res_id'] != 0) {
      $res_query = $conn->query("select * from reservation_tbl inner join room_tbl on reservation_tbl.room_id=room_tbl.room_id inner join costumer_tbl on reservation_tbl.cos_id=costumer_tbl.cos_id");
      while ($res_row = $res_query->fetch()) {
        if ($res_row['res_status'] == "Pending") {
        ?>
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="dropdown pull-right">
              <button class="btn btn-default btn-lg no-border dropdown-toggle" style="margin-top: -7px;" type="button" data-toggle="dropdown"><i class="fa fa-ellipsis-v fa-fw"></i></button>
                <ul class="dropdown-menu">
                  <li><a href="#" data-toggle="modal" data-target="#accept-request<?=$res_row['res_id'];?>"><i class="fa fa-check fa-fw"></i> Accept</a></li>
                  <li><a href="#" data-toggle="modal" data-target="#cancel-request<?=$res_row['res_id'];?>"><i class="fa fa-times fa-fw"></i> Cancel</a></li>
                </ul>
            </div>
            <?php
              include "../modals/modal-acceptrequest.php";
              include "../modals/modal-cancelrequest.php";
            ?>
            <h3 class="margin-top-sm"><?=$res_row['room_name'];?> <span class="label label-warning"><?=$res_row['res_status'];?></span></h3>
            <p class="small text-muted margin-top-sm"><i class="fa fa-user fa-fw"></i> <?=$res_row['firstname'];?> <?=$res_row['lastname'];?> &bull; <i class="fa fa-clock fa-fw"></i> <?=date("F j, Y - h:ia", strtotime($res_row['res_added']));?></p>
            <p class="margin-top"><strong>Remarks: </strong><?=$res_row['res_remarks'];?></p>
            <p><strong>Check-in date: </strong><?=date("F j, Y", strtotime($res_row['check_in']));?></p>
            <p><strong>Check-out date: </strong><?=date("F j, Y", strtotime($res_row['check_out']));?></p>
            <p><strong>Total Payment: </strong>PHP <?=$res_row['total_payment'];?></p>
          </div>
        </div>  
        <?php
        }
        else if ($res_row['res_status'] == "On Use") {
        ?>
         <script type="text/javascript">
          $(document).ready(function(){
            setInterval(function(){
              $('#label-status<?=$res_row['res_id'];?>').load('../functions/update-status.php?res_id=<?=$res_row['res_id'];?>');
            }, 2000);
          });
        </script>
        <div class="panel panel-default">
          <div class="panel-body">
            <h3 class="margin-top-sm"><?=$res_row['room_name'];?> <span class="label label-default" id="label-status<?=$res_row['res_id'];?>"><?php include "../functions/update-status.php";?></span></h3>
            <p class="small text-muted margin-top-sm"><i class="fa fa-user fa-fw"></i> <?=$res_row['firstname'];?> <?=$res_row['lastname'];?> &bull; <i class="fa fa-clock fa-fw"></i> <?=date("F j, Y - h:ia", strtotime($res_row['res_added']));?></p>
            <p class="margin-top"><strong>Remarks: </strong><?=$res_row['res_remarks'];?></p>
            <p><strong>Check-in date: </strong><?=date("F j, Y", strtotime($res_row['check_in']));?></p>
            <p><strong>Check-out date: </strong><?=date("F j, Y", strtotime($res_row['check_out']));?></p>
            <p><strong>Total Payment: </strong>PHP <?=$res_row['total_payment'];?></p>
          </div>
        </div>
        <?php  
        }
        else if ($res_row['res_status'] == "Finished") {
        ?>
        <div class="panel panel-default">
          <div class="panel-body">
            <h3 class="margin-top-sm"><?=$res_row['room_name'];?> <span class="label label-default"><?=$res_row['res_status'];?></span></h3>
            <p class="small text-muted margin-top-sm"><i class="fa fa-user fa-fw"></i> <?=$res_row['firstname'];?> <?=$res_row['lastname'];?> &bull; <i class="fa fa-clock fa-fw"></i> <?=date("F j, Y - h:ia", strtotime($res_row['res_added']));?></p>
            <p class="margin-top"><strong>Remarks: </strong><?=$res_row['res_remarks'];?></p>
            <p><strong>Check-in date: </strong><?=date("F j, Y", strtotime($res_row['check_in']));?></p>
            <p><strong>Check-out date: </strong><?=date("F j, Y", strtotime($res_row['check_out']));?></p>
            <p><strong>Total Payment: </strong>PHP <?=$res_row['total_payment'];?></p>
          </div>
        </div>
        <?php  
        }
      }
    }
    else {
    ?>
      <div class="panel panel-default">
        <div class="panel-body text-center">
          <i class="fa fa-frown fa-fw fa-10x"></i>
          <p class="lead">No reservations yet.</p>
        </div>
      </div>
    <?php
    }
  ?>
</div>
<p class="text-center text-muted margin-top-lg margin-bottom-lg">&copy; Online Room Reservation System 2017</p>
</body>
</html>