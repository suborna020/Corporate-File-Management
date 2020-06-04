<h1 class="text-primary" style="color:#34495e"><i class="fa fa-pencil-square-o"></i> UPDATE ACCOUNT</h1>
        <ol class="breadcrumb">
          <li><a href="admin.php?page=dashboard"><i class="fa fa-dashboard"></i>Back to : <b> DASHBOARD</b></a></li>
          <li><a href="admin.php?page=viewprofiles"><i class="fa fa-users"></i>All Employee</a></li>
          <li class="active"><i class="fa fa-pencil-square-o"></i> Update account</li>
        </ol>
<?php
 /* --- base64 diye url a id get korlam,decode diye seta private mode a anlam  */
$id= base64_decode($_GET['id']);
$db_data=mysqli_query($conn,"SELECT * FROM `users` WHERE `id`='$id'");
$db_row=mysqli_fetch_assoc($db_data);

if (isset($_POST['editprofile'])) {
  
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $username = $_POST['username'];
  $password =  $_POST['password'];
  $password = sha1($password);
  $userType = $_POST['userType'];
  $department = $_POST['department'];
  $email = $_POST['email'];
  $entrydate = $_POST['entrydate'];
  $status = $_POST['status'];

$query ="UPDATE `users` SET `f_name`='$fname',`l_name`='$lname',`username`='$username',`password`='$password',`user_type`='$userType',`department`='$department',`email`='$email',`entry_date`='$entrydate' ,`status`='$status' WHERE `id`='$id'";
$query_run= mysqli_query($conn,$query);
if ($query_run) {
  header("location:admin.php?page=viewprofiles");
}
}
?>
<div class="row">
	<div class="col-sm-6">
				<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">        
                    <div class="form-group">

                            <div class="form-group">
                                <label class="control-label col-sm-4" for="fname">First Name </label>
                                <div class="col-sm-8">
                                <input type="text" name="fname" id="fname" class="form-control " placeholder="Enter First Name"  value="<?= $db_row['f_name'] ?>" required>
                            </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="lname">Last Name</label>
                                <div class="col-sm-8">
                                <input type="text" name="lname" id="lname" class="form-control "placeholder="Enter Last Name"  value="<?= $db_row['l_name'] ?>" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-4" for="username">Username</label>
                                <div class="col-sm-8">
                                <input type="text" name="username" id="username" class="form-control" placeholder="Enter username"  value="<?= $db_row['username'] ?>" required>
                            </div>

                            </div> 
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="password" >Password </label>
                                <div class="col-sm-8">
                                <input type="password" name="password" id="password" class="form-control "placeholder="Enter password"  value="<?= $db_row['password'] ?>" required>
                                </div>  
                            </div>  
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="userType" >Chosse User Type </label>
                                <input type="radio" name="userType"  value="coadmin" class="custom-radio"  value="<?= $db_row['user_type'] ?>" >&nbsp;Co-Admin |
                                <input type="radio" name="userType"  value="employ" class="custom-radio"  value="<?= $db_row['user_type'] ?>" >&nbsp;Employ
                            </div> 
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="department">ADD Department OR Create department </label>
                                <div class="col-sm-8">
                                <input type="text" name="department" id="department" class="form-control "placeholder="Enter Department"  value="<?= $db_row['department'] ?>" required>
                                </div>
                            </div>                                                      
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="email">Email</label>
                                <div class="col-sm-8">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter email"  value="<?= $db_row['email'] ?>" required> 
                                </div> 
                            </div>   <br>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="entrydate">Entry Date :</label>
                                <div class="col-sm-8">
                                <input type="date" name="entrydate" value="<?= $db_row['entry_date'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="status">Status</label>
                                <div class="col-sm-8">
                                  <select id="status" name="status" class="form-control" value="<?= $db_row['status'] ?>">
                                  <option value="<?= $db_row['status'] ?>">Choose...</option>
                                  <option value="active" >Active</option>
                                  <option value="inactive">Inactive</option>
                                  </select>
                                </div>
                            </div><br>   
                                                    
                    
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" value="Edit Profile" name="editprofile">Save</button>
                    </div>
                   
                      
    </form>

	</div>
</div>