<h1 class="text-primary" style="color:#34495e"><i class="fa fa-folder-open-o"></i> All Files</h1>
        <ol class="breadcrumb">
          <li><a href="coadmin.php?page=dashboard">Back to : <b><i class="fa fa-dashboard"></i> DOCUMENTS</b></a></li>
          <li class="active"><i class="fa fa-users"></i> All Files</li>
        </ol>
	        <div class="table-responsive">
	               <table id="data" class="table table-striped table-dark table-hover table-bordered ">
	                      <thead>
	                        <tr>
	                          <th scope="col">ID</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Name</th>
	                          <th scope="col">Username</th>
	                          <th scope="col">Description</th>
	                          <th scope="col">Document</th>
	                          <th scope="col">Time</th>
	                        </tr>
	                      </thead>
	                      <tbody>

  						<?php
                  $username=$_SESSION['username'];
                  $query="select * from users where username='$username'";
                  $Result=mysqli_query($conn,$query);
                  $numrow=mysqli_num_rows($Result);
                  $arr=mysqli_fetch_assoc($Result);
                  $department=$arr['department'];

                  $Result=mysqli_query($conn,"SELECT * FROM `document` join `users` on `document`.`username` =`users`.`username` where department='$department' ");
                  while ($row=mysqli_fetch_assoc($Result)) {
                            
              ?>
                        <tr>
                          <td><?php echo $row['up_id']; ?></td>
                          <td><img style="width:100px" "height: 100px" src="../images/<?php echo $row['photo']; ?>" alt=""/>
                          </td>
                          <td><?php echo ucwords($row['f_name']); ?> <?php echo ucwords($row['l_name']); ?>
                          </td>
                          <td><?php echo ucwords($row['username']); ?></td>
                          <td><?php echo ucwords($row['description']); ?></td>
                          <td>
                          <?php
							$fileName=$row['file'];
							echo "<a href=\"../files/$fileName\">$fileName</a>"; //files is our folder name
							?>
							</td>
							<td><?php echo $row['time']; ?></td>


                        </tr>
                        <?php
                          }
                        ?>
                      </tbody>
                    </table>
                    </div>