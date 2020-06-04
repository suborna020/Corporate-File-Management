<?php
      require_once '../dbconn.php';
      $query="select * from users";
      $Result=mysqli_query($conn,$query);
      $numrow=mysqli_num_rows($Result);
?>

<h1 class="text-primary" style="color:#34495e"><i class="fa fa-users"></i> Report Box</h1>
        <ol class="breadcrumb">
          <li><a href="employ.php?page=dashboard">Back to : <b><i class="fa fa-dashboard"></i> Home page....</b></a></li>
          <li class="active"><i class="fa fa-users"></i> Report Msg</li>
        </ol>
<?php
if (isset($_POST['submit_msg'])) {
  
    $username=$_SESSION['username'];
    $mssg = $_POST['mssg'];

  $msg_query ="INSERT INTO `reportbox`(`username`, `msg`) VALUES ('$username','$mssg')";
  $msg_query_run= mysqli_query($conn,$msg_query);
            if($msg_query_run){
                header("location:employ.php?page=reportbox");
              }else{
                echo '<script> alert("Message not sent"); </script>';
                header("location:employ.php?page=reportbox");
                
              }

}
?>


<button class="open-button" onclick="openForm()">Chat</button>

<div class="chat-popup" id="myForm">
    <form action="" class="form-container" id="mssg"  method="POST" enctype="multipart/form-data">
       <h1>Chat</h1>
            <div class="box">
                    <?php
                          $msg_show=mysqli_query($conn,"SELECT * FROM `reportbox`");
                          while ($row=mysqli_fetch_assoc($msg_show)) {
                            
                    ?>

                    <div class="containerbox">
                      <img src="../user_icon.png" alt="Avatar" style="width:100%;">
                      <p><?php echo $row['msg']; ?></p>
                      <span class="time-right"><?php echo $row['time']; ?></span>
                    </div>
                    <?php
                      }
                    ?>
              </div>
              
              <div>
                  <textarea placeholder="Type message.." name="mssg" required></textarea>
                  <button type="submit" name="submit_msg" class="btn" for="mssg" id="mssg">Send</button>
                  <button type="button" class="cancel" onclick="closeForm()">Close</button>
              </div>
    </form>
</div>