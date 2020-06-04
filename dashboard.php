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
                                          <a href="admin.php?page=viewprofiles">
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
<!-- Commentbox work:inserting -->

<div id="show"></div> <!-- msg fetch div by id (show) -->

<div id="comment_container"> <!-- Msg insert div -->
  <input type="text" id="name" placeholder="Type here and press Enter">
</div>
<div id="result"></div>

<script type="text/javascript" src="jquery-3.5.1.min.js"></script> <!-- Coz i needed to download (jquery.js) file for massnger popup -->
<script type="text/javascript">
  $(document).ready(function() { //Msgaction.php page a Msg insert er document
    $('#name').focus(); //(name)text input id//focus() use hoy page entry te cursur text box a show koranor jnno
    $('#name').keypress(function(event) { //name box a enter press a event toiri hobe
      var key = (event.keyCode ? event.keyCode : event.which);
      if (key == 13) {
        var info = $('#name').val();
        $.ajax({
          method: "POST",
          url: "msgaction.php",
          data: {name: info}, //extra variable can pass ile({name: info, lastname:sbuab , position:dwd})
          success: function(status) { //after entering msg
           
            $('#name').val(''); //name box will show blank
          }
        });
      };
    });
  });

  $(document).ready(function() { //Msgaction.php page a Msg fetch er document
    setInterval(function () {
      $('#show').load('msgaction.php')
    }, 1000);
  });
</script>