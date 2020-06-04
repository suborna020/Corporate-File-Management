<?php
require_once './dbconn.php';
$id= base64_decode($_GET['id']);
mysqli_query($conn, "DELETE FROM `users` WHERE `id`='$id'");
header("location:coadmin.php?page=viewprofiles");
?>