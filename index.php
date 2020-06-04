<?php 
	session_start();
require_once './dbconn.php';

if (isset($_POST['login'])) {
	$username = $_POST['username']; //value=$form name
	$password =  $_POST['password'];
	$password = sha1($password);
	$userType = $_POST['userType'];
	
	
	$sql ="SELECT * FROM users WHERE username=? AND password=? AND user_type=?" ;
	$stmt=$conn->prepare($sql);
	$stmt->bind_param("sss",$username,$password,$userType); // sss for 3 string parameter

	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();
		session_regenerate_id();
		$_SESSION['username'] = $row['username'];
		$_SESSION['role'] = $row['user_type'];
		$_SESSION['status'] = $row['status'];
		session_write_close();
			if($result->num_rows==1 && $_SESSION['role']=="admin"){
				header("location:admin.php");
			}
			else if($result->num_rows==1 && $_SESSION['role']=="employ" && $_SESSION['status']=="active"){
				header("location:employ/employ.php");
			}else if($result->num_rows==1 && $_SESSION['role']=="coadmin" && $_SESSION['status']=="active"){
				header("location:coadmin/coadmin.php");
			}
			else{
				$msg = "USERNAME OR PASSWORS IS INCORRECT !!!";
			} 
}


if (isset($_POST['registration'])) {
  
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
		        header("location:admin.php");

		      }else{
		      	echo '<script> alert("Data not saved"); </script>';
		      	header("location:admin.php");
		        
		      }
}
}

?>


	
<!DOCTYPE html>
<html lang="en">
<head>
<title>HOME PAGE </title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie-edge">
<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="css/animate.css" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.6.0/css/mdb.min.css" rel="stylesheet">
<!-- our style sheet-->
<link rel="stylesheet" type="text/css" href="style.css">

  
<style>

</style>
</head>


<body class="bg-dark">

	<div class="card card-conntainer animated shake">
		<img src="user_icon.png" style="display: block; margin-left: auto; margin-right: auto;" class="img-circle mx-auto" alt="Cinque Terre" width="120" height="100">
			<h3 class="center">LOGININ</h3>

		    <form class="text-center md-form " style="color: #757575;" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
					<div class="md-form mt-3">
						<input type="text" name="username" class="form-control form-control-lg" id="materialLoginFormName" value="<?php if(isset($username)) { echo $username;} ?>" required>
						<label for="materialLoginFormName">Enter username</label>
					</div>
					<div class="md-form">
						<input type="password" name="password" id="password" class="form-control form-control-lg"  required>
						<label for="password">Enter password</label>
					</div>
					<div class="md-form">
						<input type="radio" name="userType" value="admin" class="custom-radio" required>&nbsp;Admin |
						<input type="radio" name="userType" value="employ" class="custom-radio" checked="checked" required>&nbsp;Employ |
						<input type="radio" name="userType" value="coadmin" class="custom-radio" required>&nbsp;Co-Admin
					</div>
					<button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" name="login" type="submit">Sign in</button>
					<h5 class=" text-danger text-center"><?= $msg; ?></h5>
		    </form>
	</div>
	
	<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.6.0/js/mdb.min.js"></script>
</body>