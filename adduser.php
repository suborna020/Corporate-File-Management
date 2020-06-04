<h1 class="text-primary" style="color:#34495e"><i class="fa fa-user-plus"></i> Create New Account</h1>
        <ol class="breadcrumb">
          <li><a href="admin.php?page=dashboard">Back to : <b><i class="fa fa-dashboard"></i> DASHBOARD</b></a></li>
          <li class="active"><i class="fa fa-user-plus"></i> ADD USER</li>
        </ol>
<?php
if(isset($GET))

	?>
<div class="row">
  <div class="col-sm-6">
        <form class="form-horizontal" method="POST" action="index.php" enctype="multipart/form-data">        
                    <div class="form-group">

                            <div class="form-group">
                                <label class="control-label col-sm-4" for="fname">First Name </label>
                                <div class="col-sm-8">
                                <input type="text" name="fname" id="fname" class="form-control "placeholder="Enter First Name"  required>
                            </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="lname">Last Name</label>
                                <div class="col-sm-8">
                                <input type="text" name="lname" id="lname" class="form-control "placeholder="Enter Last Name" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-4" for="username">Username</label>
                                <div class="col-sm-8">
                                <input type="text" name="username" id="username" class="form-control" placeholder="Enter username" required>
                            </div>

                            </div> 
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="password" >Password </label>
                                <div class="col-sm-8">
                                <input type="password" name="password" id="password" class="form-control "placeholder="Enter password" required>
                                </div>  
                            </div>  
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="userType">chosse catagory </label>
                                <input type="radio" name="userType" value="coadmin" class="custom-radio" required>&nbsp;Co-Admin |
                                <input type="radio" name="userType" value="employ" class="custom-radio"  checked="checked" required>&nbsp;Employ
                            </div> 
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="department">ADD Department OR Create department </label>
                                <div class="col-sm-8">
                                <input type="text" name="department" id="department" class="form-control "placeholder="Enter Department" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="photo">Attach a photo</label>
                                <div class="col-sm-8">
                                <input type="file" name="photo" class="form-control" id="file"> 
                                </div> 
                            </div>                                                       
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="email">Email</label>
                                <div class="col-sm-8">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter email" required> 
                                </div> 
                            </div>   <br> 
                            <div class="form-group">
                                <label class="control-label col-sm-4" for="gender">Gender</label>
                                <div class="col-sm-8">
                                <select id="gender" name="gender" class="form-control" >
                                <option selected>Choose...</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                </select>
                                </div>
                            </div><br>

                            <div class="form-group">
                                <label class="control-label col-sm-4" for="entrydate">Entry Date :</label>
                                <div class="col-sm-8">
                                <input type="date" name="entrydate">
                            </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="registration">Save</button>
                    </div>
                   
                      
    </form>

  </div>
</div>