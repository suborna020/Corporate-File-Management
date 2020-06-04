<?php 
	session_start();
	require_once '../dbconn.php';
	$username=$_SESSION['username'];

$query="select * from document where username='$username'";
$Result=mysqli_query($conn,$query);
$numrow=mysqli_num_rows($Result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>download PAGE </title>
<link rel="stylesheet" type="text/css" href="../style.css">
<link href="../css/bootstrap.min.css" rel="stylesheet">
<style>

</style>
</head>
<body>
<h1 style="padding-top:30px;"><a style="font-size:30px;"><i class="fa fa-coffee"></i> Uploaded Files From <?php echo $_SESSION['username']; ?> !!!</a></h1>

<form  method="POST" name="FileUpload" action="" enctype="multipart/form-data">        
	<table>
			
				<?php
					for ($i=0; $i<$numrow ; $i++) { 
						$arr=mysqli_fetch_assoc($Result);
						$fileName=$arr['file'];
						echo "<tr><td><a href=\"../files/$fileName\">$fileName</a></td></tr>";
					}
				?>
			
	</table>            
</form>
<a href="employ.php"><i class="fa fa-dashboard"></i><b>Back Page  </b></a>
</body>
</html>
<script type="text/javascript">
	
</script>