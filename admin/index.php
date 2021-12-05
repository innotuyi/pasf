<?php session_start();  
  
  include '../connect/connect.php';  
  require_once '../function/function.php'; 

  if(!isset($_SESSION['adId']) && !isset($_SESSION['financeId'])  && !isset($_SESSION['hodId']) ){ 

    echo '<script>window.location="../home/index.php"</script>';
    exit();
  }

  //include './add_cart.php'; 
  include '../layout/header.php';      ?>

  <div class="container content"  id="contentContainer-fluid">
  
    <div class="row prod" id="content-data" >
<div class="col-md-2 left-data-link" > 
        <?php  include '../layout/navigation.php';  ?>
      </div>

      <div class="col-md-10">   

      <div class="col-md-8">    
        <h4 class="text-center head-content">Admins</h4>
      </div>

      <div class="col-md-4">
        <a href="./add-admin.php" class="btn btn-primary pull-right">
          <i class="fa fa-plus"></i>
          Add new admin
        </a>
      </div>

        <div class="table-responsive col-md-12">
          <table class="table table-bordered table-hover">

            <tr>
              <th>N<sup><sup><u>o</u></sup></sup></th>
              <th>Name</th>
              <th>E-Mail</th>

              <th><i class="fa fa-phone"></i> Phone</th>
              <th>Address</th>
              
              <th>Username</th>
              <th class="text-center">Action</th>
            </tr>

            <?php 

              $count = 0;
              $userdATA = user();

              foreach ($userdATA as $userdATASet) {  

                $count = $count + 1;  ?>

                <tr>

                  <td>
                    <a href="./view-admin.php?a=<?php echo urlencode ($userdATASet->tbl_adminId); ?>"> 
                      <?php  echo $count;  ?>
                    </a>
                  </td>
                  <td>
                    <a href="./view-admin.php?a=<?php echo urlencode ($userdATASet->tbl_adminId); ?>">  
                      <?php echo ($userdATASet->tbl_adminName);   ?>
                    </a>
                  </td>

                  <td>
                    <a href="./view-admin.php?a=<?php echo urlencode ($userdATASet->tbl_adminId); ?>"> 
                      <?php echo ($userdATASet->tbl_adminEmail);   ?>
                    </a>
                  </td>

                  <td>
                    <a href="./view-admin.php?a=<?php echo urlencode ($userdATASet->tbl_adminId); ?>">
                      <?php  echo '+'.($userdATASet->tbl_adminTel);  ?>
                    </a>
                  </td>

                  <td>
                    <a href="./view-admin.php?a=<?php echo urlencode ($userdATASet->tbl_adminId); ?>">
                      <?php echo ($userdATASet->tbl_adminAddress);   ?>
                    </a>
                  </td>

                  <td>
                    <a href="./view-admin.php?a=<?php echo urlencode ($userdATASet->tbl_adminId); ?>">
                      <?php echo ($userdATASet->tbl_adminUserName);   ?>
                    </a>
                  </td>


                  <td class="text-center">
                    <a href="update_admin.php?u=<?php  echo urlencode($userdATASet->tbl_adminId);  ?>" class="btn btn-primary">
                      <i class="fa fa-edit"></i>
                      Update 
                    </a>
                  </td>
                </tr>

              <?php }  ?> 

          </table>

        </div>    



      </div>

    </div><br><br><br><br><br><br><br><br><br>
  
  </div>


  <?php include '../layout/footer.php';  ?>
  
