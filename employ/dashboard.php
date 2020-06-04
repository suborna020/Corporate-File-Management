<h1 class="text-primary" style="color:#34495e"><i class="fa fa-folder-open-o"></i> Upload Multiple Files : </h1>
<?php

$count_users= mysqli_query($conn,"SELECT * FROM `users`");
$total_users=mysqli_num_rows($count_users);
?>
        <ol class="breadcrumb">
          <li class="active">
              <div class="pull-right" ><span class="label label-info">Total Users:</span><span style="font-size: 30px"><?= $total_users;?></span></div>
          </li>
        </ol>

                          <div class="content panel-default"> 
  <form name="FileUpload" class="" id="UploadForm" style="color: #757575;" method="POST" action="" enctype="multipart/form-data">
       <table>
          <tr>
            <th scope="col"> 
            <label for="description">Enter description</label>
          <input style="width: 70%; padding: 1px 20px; margin: 0px 0px ; box-sizing: border-box; border: none; border-bottom: 1px solid black;" type="text" id="description" name="description"> <br> <br> <br>   
            </th>
          </tr>
          <p class="help-block"><span class="label label-info">Note:</span> Please, Select the only pdf ,doc,docx,zip,pptx file</p>
      <tr>
            
                  <th scope="col">
                    <input type="file" required="" id="UploadFileID" name="UploadFile" for="UploadFileID"/>
          <label for="UploadFileID" id="fileLabel">
            <i class="fa fa-folder-open-o fa-5x"></i>
            <br>
            <span id="fileLabelText">
             <b> Click to Select</b>
            </span>
            </label>
          </th>
          
                  <th scope="col">
                    <input type="submit" onclick="Validation()" for="uploadButton" id="uploadButton"  />
            <label for="uploadButton" id="fileLabel2">
                    <i class="glyphicon glyphicon-circle-arrow-right fa-5x"></i>
                    </label>
                  </th>
              
      </tr>
      
        <input type="submit" onclick="Validation()" for="uploadButton" id="uploadButton"  />
        <label for="uploadButton" id="uploadButton">
         </table>

    </form>
 </div>
     
                                                     
                                                    
                                    </div>
                                </div>
                             </div>
                          </div>
                    <hr/>
                    