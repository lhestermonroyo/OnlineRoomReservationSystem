<div id="account-settings" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Account Settings</h4>
      </div>
      <div class="modal-body">
      	<form action="../functions/update-account.php" method="POST">
      	  <input type="hidden" name="url" value="<?=$_SERVER['PHP_SELF'];?>">	
          <input type="hidden" name="admin_id" value="<?=$admin_row['admin_id'];?>">
          <div class="form-group">
            <label>Username:</label>
            <input type="text" class="form-control input-lg" value="<?=$admin_row['username'];?>" name="username" required="true">
          </div>
          <div class="form-group">
            <label>Password:</label>
            <input type="password" class="form-control input-lg" value="<?=$admin_row['password'];?>" name="password" required="true">
          </div>
          <div class="form-group">
            <label>Firstname:</label>
            <input type="text" class="form-control input-lg" value="<?=$admin_row['firstname'];?>" name="firstname" required="true">
          </div>
          <div class="form-group">
            <label>Lastname:</label>
            <input type="text" class="form-control input-lg" value="<?=$admin_row['lastname'];?>" name="lastname" required="true">
          </div>
          <button type="submit" class="btn btn-warning btn-lg" name="update-account">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>      	