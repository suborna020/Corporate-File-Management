
<?php 
require_once './dbconn.php';

 // Code of msg fetch data  
$result = $conn->query("SELECT name FROM reportedcomments");
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		echo $row['name'] . '<br>';
	}
}


 // Code of Inserting data 
if (isset($_POST['name'])) {
	$name = $_POST['name'];
	$query ="INSERT INTO `reportedcomments`(`name`) VALUES ('$name')";
	$query_run= mysqli_query($conn,$query);
	if($query_run){

	}else{
    //echo '<script> alert("Data not saved"); </script>';
	}
}


?>





