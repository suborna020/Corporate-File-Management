<h1 class="text-primary" style="color:#34495e"><i class="fa fa-user-plus"></i> Create New Account</h1>
        <ol class="breadcrumb">
          <li><a href="coadmin.php?page=dashboard">Back to : <b><i class="fa fa-dashboard"></i> DASHBOARD</b></a></li>
          <li class="active"><i class="fa fa-user-plus"></i> ADD USER</li>
        </ol>
<?php
if(isset($GET))

	?>
<?php
if (isset($_POST['employRegistration'])) {
  
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $username = $_POST['username'];
  $password =  $_POST['password'];
  $password = sha1($password);
  $userType = $_POST['userType'];
  $department = $_POST['department'];
$photo =explode('.', $_FILES['photo']['name']);
$photo_ex =end($photo);
$photo_name =$username.'.'.$photo_ex; 
//username onujai pic rename

  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $entrydate = $_POST['entrydate'];
$user=mysqli_query($conn,"SELECT username From users WHERE username='$username'");

$result=mysqli_num_rows($user);
if ($result>0) {
    echo '<script> alert("That username or email already in use.Try another"); </script>';

}else{
$query ="INSERT INTO `users`(`f_name`, `l_name`, `username`, `password`, `user_type`, `department`, `photo`, `email`, `gender`, `entry_date`,`status`) VALUES ('$fname','$lname','$username','$password','$userType','$department','$photo_name','$email','$gender','$entrydate','inactive')";
$query_run= mysqli_query($conn,$query);
            if($query_run){
                echo "<script>alert(\"Data Successfully saved\") </script>";
                move_uploaded_file($_FILES['photo']['tmp_name'],'images/'.$photo_name);
                header("location:coadmin.php");

              }else{
                echo '<script> alert("Data not saved"); </script>';
                header("location:coadmin.php");
                
              }
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
                      <button type="submit" class="btn btn-primary" name="employRegistration">Save</button>
                    </div>
                   
                      
    </form>

  </div>
</div>