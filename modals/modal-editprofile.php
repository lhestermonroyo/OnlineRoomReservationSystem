<div id="edit-profile" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Profile</h4>
      </div>
      <div class="modal-body">
        <form action="functions/update-profile.php" enctype="multipart/form-data" method="POST">
          <input type="hidden" name="cos_id" value="<?=$cos_row['cos_id'];?>">
          <div class="form-group">
            <label>Email:</label>
            <input type="email" class="form-control input-lg" value="<?=$cos_row['email'];?>" name="email" required="true">
          </div>
          <div class="form-group">
            <label>Password:</label>
            <input type="password" class="form-control input-lg" value="<?=$cos_row['password'];?>" name="password" required="true">
          </div>
          <div class="form-group">
            <label>Firstname:</label>
            <input type="text" class="form-control input-lg" value="<?=$cos_row['firstname'];?>" name="firstname" required="true">
          </div>
          <div class="form-group">
            <label>Lastname:</label>
            <input type="text" class="form-control input-lg" value="<?=$cos_row['lastname'];?>" name="lastname" required="true">
          </div>
          <div class="form-group">
            <label>Gender:</label>
            <select class="form-control input-lg" name="gender" required="true">
              <option <?php if($cos_row['gender'] == "Male"){echo "selected='selected'";}?> value="Male">Male</option>
              <option <?php if($cos_row['gender'] == "Female"){echo "selected='selected'";}?> value="Female">Female</option>
              <option>Select gender...</option>
            </select>  
          </div>
          <div class="form-group">
            <label>Address:</label>
            <input type="text" class="form-control input-lg" value="<?=$cos_row['address'];?>" name="address" required="true">
          </div>
          <div class="form-group">
            <label>Profile Picture:</label>
            <input type="file" class="form-control input-lg" name="profile-picture" accept="image/*">
          </div>
          <button type="submit" class="btn btn-warning btn-lg" name="update-profile">Update</button>
        </form>  
      </div>
    </div>
  </div>
</div>