<?php 
	session_start();
	if (!isset($_SESSION['username']) || $_SESSION['role']!="coadmin") {
		header("location:../index.php");
  }
  require_once '../dbconn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title>Co-Admin panel</title>
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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"> 
</head>
<style>
/* Button used to open the chat form - fixed at the bottom of the page on(roportbox page)*/
.open-button {
  background-color: #34495e;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 570px;
  border-radius: 50px 50px;
}
.chat-popup { /* The popup chat - hidden by default */
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}
.form-container {/* Add styles to the form container */
  width: 600px;
  padding: 10px;
  background-color: white;
}
.form-container textarea {/* Full-width textarea */
  width: 75%;
  float: left;
  padding: 5px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 40px;
  border-radius: 50px 50px;
}
.form-container textarea:focus { /* When the textarea gets focus, do something */
  background-color: #ddd;
  outline: none;
}
.form-container .btn {/* Set a style for the submit/send button */
  background-color: #5F9EA0;
  float: right;
  color: white;
  padding: auto;
  border: none;
  cursor: pointer;
  width: 20%;
  margin:5px 0 22px 0;
  opacity: 0.8;
  border-radius: 50px 50px;

}
.form-container .cancel {/* Add a red background color to the cancel button */
  background-color: #34495e;
  color: white;
  padding: auto;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
  border-radius: 50px 50px;
}
.form-container .btn:hover, .open-button:hover {/* Add some hover effects to buttons */
  opacity: 1;
}
/* containerbox content design on(roportbox page)*/
.box {
  
  width:100%;
  padding: 0 20px;
  border: 2px solid #dedede;
  border-radius: 5px;
  height: 300px;

}
.containerbox {
  width: 100%;
  border: 2px solid #dedede;
  background-color: #ddd;
  border-radius: 5px;
  padding: 1px;
  margin: 10px;
     overflow: auto;
    transform: translate(0px, 0px);
  
}
.containerbox p{
  overflow: hidden;
   position: relative;
  margin: 1px;
}

.containerbox::after {
  content: "";
  clear: both;
  display: table;
}

.containerbox img {
  float: left;
  max-width: 40px;
  width: 100%;
  margin: 5px;
  margin-right: 5px;
  border-radius: 50%;
}
.time-right {
  float: right;
  color: #aaa;
}
</style>

<body>
        <nav class="navbar navbar-default">
        <div class="container-fluid">
  <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
              <img src="../admin_icon.png" class="rounded mx-auto d-block" height="42" width="42">
                  <a class="navbar-brand" href="coadmin.php">Co-Admin Panel</a>
              </div>
  <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="#"><i class="fa fa-user"></i> Welcome <?php echo $_SESSION['username']; ?> !!!</a></li>
                  <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                  <li><a href="../logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                </ul>
              </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
<!--manubar page connection  -->
  <div class="container-fluid">
            <div class="col-sm-3">
                <div class="list-group">
                      <a href="coadmin.php?page=dashboard" style="background:#34495e" class="list-group-item active"><i class="fa fa-dashboard"></i>
                        Dashboard</a>
                      <a href="coadmin.php?page=adduser"  class="list-group-item"><i class="fa fa-user-plus"></i> Add User</a>
                      <a href="coadmin.php?page=viewprofiles"  class="list-group-item"><i class="fa fa-users"></i> View profiles </a>
                      <a href="coadmin.php?page=uploadedfiles"  class="list-group-item"><i class="fa fa-folder-open-o"></i> Uploaded files</a>
                      
                </div>
            </div>
              <div class="col-sm-9">
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
 
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>