<?php include "functions/account-session.php";?>
<!DOCTYPE html>
<html>
<head>
	<title>Reserve &bull; Online Room Reservation System</title>
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
        <li class="active"><a href="records.php">Records</a></li>
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
  <h2 class="margin-top-sm">Records</h2>
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
    $cnt_res_query = $conn->query("select count(res_id) as res_id from reservation_tbl where cos_id = '".$cos_row['cos_id']."' and res_status = 'On Use' or res_status = 'Finished'");
    $cnt_res_row = $cnt_res_query->fetch();

    if ($cnt_res_row['res_id'] != 0) {
    ?>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Reservation ID</th>
          <th>Reservation Added</th>
          <th>Room Name</th>
          <th>Check-in Date</th>
          <th>Check-out Date</th>
          <th>Room Price</th>
          <th>Total Payment</th>
        </tr>
      </thead>
      <tbody>
    <?php
      $res_total = 0;
      $res_query = $conn->query("select * from reservation_tbl inner join room_tbl on reservation_tbl.room_id=room_tbl.room_id where cos_id = '".$cos_row['cos_id']."' and res_status = 'On Use' or res_status = 'Finished'");
      while ($res_row = $res_query->fetch()) {
        $res_total += $res_row['total_payment'];
       ?>
         <tr>
          <td><?=$res_row['res_id'];?></td>
          <td><?=date("F j, Y - h:ia", strtotime($res_row['res_added']));?></td>
          <td><?=$res_row['room_name'];?></td>
          <td><?=date("F j, Y", strtotime($res_row['check_in']));?></td>
          <td><?=date("F j, Y", strtotime($res_row['check_out']));?></td>
          <td>PHP <?=$res_row['room_price'];?></td>
          <td>PHP <?=$res_row['total_payment'];?></td>
         </tr> 
       <?php 
      }
    ?>
        <tr>
          <td><strong>Total</strong></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td>PHP <?php echo $res_total;?></td>
        </tr>
      </tbody>
    </table>
    <?php  
    }
    else {
    ?>
      <div class="panel panel-default">
        <div class="panel-body text-center">
          <i class="fa fa-frown fa-fw fa-10x"></i>
          <p class="lead">No records yet.</p>
        </div>
      </div>
    <?php  
    }
   ?> 
</div>
<p class="text-center text-muted margin-top-lg margin-bottom-lg">&copy; Online Room Reservation System 2017</p>
</body>
</html>  