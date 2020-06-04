<?php
      require_once '../dbconn.php';
      $query="select * from users";
      $Result=mysqli_query($conn,$query);
      $numrow=mysqli_num_rows($Result);
?>

<h1 class="text-primary" style="color:#34495e"><i class="fa fa-users"></i> All USERS</h1>
        <ol class="breadcrumb">
          <li><a href="coadmin.php?page=dashboard">Back to : <b><i class="fa fa-dashboard"></i> DASHBOARD</b></a></li>
          <li class="active"><i class="fa fa-users"></i> All Users</li>
        </ol>
                    <div class="table-responsive">
               <table id="data" class="table table-striped table-dark table-hover table-bordered ">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Name</th>
                          <th scope="col">Username</th>
                          <th scope="col">Username Type</th>
                          <th scope="col">Department</th>
                          <th scope="col">Email</th>
                          <th scope="col">Entry Date</th>
                          <th scope="col">Status</th>
                          <th scope="col">Photo</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        require_once '../dbconn.php';
                        $username=$_SESSION['username'];
                        $query="select * from users where username='$username'";
                        $Result=mysqli_query($conn,$query);
                        $numrow=mysqli_num_rows($Result);
                        $arr=mysqli_fetch_assoc($Result);
                        $department=$arr['department'];


                        $db_info=mysqli_query($conn,"SELECT * FROM `users` where department='$department'");
                        while ($row=mysqli_fetch_assoc($db_info)) {
                          
                         ?>
                        <tr>
                          <td><?php echo $row['id']; ?></td>
                          <td><?php echo ucwords($row['f_name']); ?> <?php echo ucwords($row['l_name']); ?>
                          </td>
                          <td><?php echo $row['username']; ?></td>
                          <td><?php echo $row['user_type']; ?></td>
                          <td><?php echo $row['department']; ?></td>
                          <td><?php echo $row['email']; ?></td>
                          <td><?php echo $row['entry_date']; ?></td>
                          <td><?php echo $row['status']; ?></td>
                          <td><img style="width:100px" "height: 100px" src="../images/<?php echo $row['photo']; ?>" alt=""/></td>
                          <td>
                              <a href="coadmin.php?page=editprofile&id=<?php echo base64_encode($row['id']);?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i> Edit</a><p></p>
                              <a href="deleteprofile.php?id=<?php echo base64_encode($row['id']);?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
                          </td>

                        </tr>
                        <?php
                          }
                        ?>
                      </tbody>
                    </table>
                    </div>