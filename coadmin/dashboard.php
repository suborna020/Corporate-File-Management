<h1 class="text-primary" style="color:#34495e"><i class="fa fa-users"></i> Dashboard Overview</h1>
        <ol class="breadcrumb">
          <li class="active"><i class="fa fa-users"></i> Dashboard</li>
        </ol>
<?php

$count_users= mysqli_query($conn,"SELECT * FROM `users`");
$total_users=mysqli_num_rows($count_users);
?>
                          <div class="row">
                              <div class="col-sm-5">
                                <div class="panel-primari"  style="background:#34495e" >
                                    <div class="panel-heading">
                                              <div class="row" style="color: white">
                                                    <div class="col-xs-3"><i class="fa fa-users fa-5x"></i></div>
                                                      <div class="col-xs-9">
                                                          <div class="pull-right" style="font-size: 45px"><?= $total_users;?></div>
                                                          <div class="clearfix"></div>
                                                          <div class="pull-right">Total Users</div>
                                                      </div>
                                                    </div>
                                              </div>
                                             <a href="coadmin.php?page=viewprofiles">
                                                   <div class="panel-footer">
                                                    <span class="pull-left">...</span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
                                                    <div class="clearfix"></div>
                                                   </div>
                                             </a>
                                    </div>
                                </div>
                             </div>
                          </div>
                    <hr/>
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
                    