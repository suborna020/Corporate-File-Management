<?php 
	session_start();
	if (!isset($_SESSION['username']) || $_SESSION['role']!="employ") {
		header("location:../index.php");
	}
	require_once '../dbconn.php';
	  $username=$_SESSION['username'];
                  $query="select * from users where username='$username'";
                  $Result=mysqli_query($conn,$query);
                  $numrow=mysqli_num_rows($Result);
                  $arr=mysqli_fetch_assoc($Result);
if ($_SERVER['REQUEST_METHOD']=='POST')
{	
	$username=$_SESSION['username'];
	$description = $_POST['description'];
	$name=$_FILES['UploadFile']['name'];
	$name123=$_FILES['UploadFile']['tmp_name'];
	$filesize=$_FILES['UploadFile']['size'];
	$EverythingIsOk=0;
	if ($filesize>11789322) {
		echo "<script>alert(\" Your File size is more than 5MB\")</script>";
		$EverythingIsOk=1;
	}
	$target_dir="../files/";
	$target_file= $target_dir . basename($_FILES["UploadFile"]["name"]);
	if (file_exists($target_file)) {
		echo "<script>alert(\"File already exits\")</script>";
		$EverythingIsOk=1;
	}
	if ($EverythingIsOk==0) {
		if (@move_uploaded_file($name123,$target_file)) {
		}
		else{
			echo "<script>alert(\"Your File is not moved to the directory\")</script>";
		}
	}
	else{
		echo "<script>alert(\"Your File is not Uploaded\")</script>";
	}
	if ($EverythingIsOk==0) {
		$Query="insert into document(file,username,description,up_size) values('$name','$username','$description',$filesize)" ;
		if (mysqli_query($conn,$Query)) {
			echo "<script>alert(\"Upload Successfull\")</script>";
		}
	}
	else{
		
	}

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title>Employ panel</title>
    <!-- Bootstrap folder direction-->
      <link href="../css/bootstrap.min.css" rel="stylesheet">
      <link href="../css/font-awesome.min.css" rel="stylesheet">
      <link href="../css/dataTables.bootstrap.min.css" rel="stylesheet">
      <!-- js link page -->
      <script type="text/javascript" src="../js/jquery-3.3.1.js"></script>
      <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="../js/dataTables.bootstrap.min.js"></script>
      <script type="text/javascript" src="../js/script.js"></script>
      <!-- our style sheet-->
      <link rel="stylesheet" type="text/css" href="../style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"> 
</head>
<style> 
form, .content {
	width: 95%;
	margin:auto;
	padding: 10px 50px 30px 50px;
	border: 1px solid #B0C4DE;
	background: white;
	border-radius: 20px;
}

#UploadForm #UploadFileID{
  display: none;
}
#UploadForm #uploadButton {
  display: none;
}
#UploadForm #fileLabel {
	width: 130%;
  background-color: rgba(52,152,219,0.5);
  display: block;
  padding: 20px;
  position: relative;
  cursor: pointer;
  border-radius: 100px;
  box-shadow: 0 0 16px #2980b9;
  text-align: center;
  overflow: hidden;
  transition: 0.5s;
  margin: auto;
  margin-left: 300px;
}
#UploadForm #fileLabel2 {
	
  display: block;
  padding: 16px;
  position: relative;
  text-align: center;
  overflow: hidden;
  margin: auto;
  margin-left: 310px;
}
#UploadForm .uploadButton {
  border: 0;
  outline: 0;
  width: 100%;
  padding: 8px;
  background-color: #2980b9;
  color: #fff;
  cursor: pointer;
}

</style>
<body>
	<div id="header" style="background-color:#34495e">
<!--image & username print-->
				     
				    <img src="../user_icon.png" style="display: block; margin-left: auto; margin-right: auto;" class="img-circle mx-auto" alt="Cinque Terre" width="160" height="160"> 
				    <center><a style="font-size:30px; color: white;"><i class="fa fa-coffee"></i> Welcome <?php echo $_SESSION['username']; ?> !!!</a></center>
  	</div>
  	<nav class="navbar navbar-default">
        <div class="container-fluid">
  <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
              
             </div>
  <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="employ.php?page=dashboard" class="list-group-item"><i class="fa fa-user "></i>Hellow <?php echo $_SESSION['username']; ?> !!!</a></li>
                  <li><a href="employ.php?page=uploadedfiles"  class="list-group-item"><i class="fa fa-folder-open-o"></i>Uploads</a></li>
                  <li><a href="employ.php?page=dashboard"><img src="../images/<?php echo $arr['photo']; ?>" class="img-circle mx-auto" alt="Cinque Terre" width="20" height="20"> Profile</a></li>
                  <li><a href="employ.php?page=reportbox"  class="list-group-item"><i class="fa fa-folder-open-o"></i>Report Box</a></li>
                  <li><a href="../logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                </ul>
              </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
  <div class="container-fluid ">
            
              <div class="">
                    <div class="content">
                        <?php 
                          if(isset($_GET['page'])){
                            $page=$_GET['page'].'.php';
                          }else{
                            $page="dashboard.php";
                          }
                          if (file_exists($page)) {
                            require_once $page;
                          }else{
                            echo '<h1>File not found</h1>';
                          }
                        ?>
                    </div>
              </div>
</body>
</html>
<script type="text/javascript">
	function Validation()
	{
		var file=document.getElementById('UploadFileID').value;
		var SplitFile=file.split('.');
		if(SplitFile[1]!='pdf' && SplitFile[1]!='doc' && SplitFile[1]!='docx' && SplitFile[1]!='pptx' && SplitFile[1]!='zip')
		{
			alert("please upload pdf or doc or docs file type");
			return false;
		}
		else{
			document.FileUpload.submit();
		}

	}
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>