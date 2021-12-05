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
        <h4 class="text-center head-content">All HOD's Accounts</h4>
      </div>

      <div class="col-md-4">
        <a href="./add-hod.php" class="btn btn-primary pull-right">
          <i class="fa fa-plus"></i>
          Add new hod
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
              $userdATA = hod();

              foreach ($userdATA as $userdATASet) {  

                $count = $count + 1;  ?>

                <tr>

                  <td>
                    <a href="./view-hod.php?a=<?php echo urlencode ($userdATASet->tbl_hodId); ?>"> 
                      <?php  echo $count;  ?>
                    </a>
                  </td>
                  <td>
                    <a href="./view-hod.php?a=<?php echo urlencode ($userdATASet->tbl_hodId); ?>">  
                      <?php echo ($userdATASet->tbl_hodName);   ?>
                    </a>
                  </td>

                  <td>
                    <a href="./view-hod.php?a=<?php echo urlencode ($userdATASet->tbl_hodId); ?>"> 
                      <?php echo ($userdATASet->tbl_hodEmail);   ?>
                    </a>
                  </td>

                  <td>
                    <a href="./view-hod.php?a=<?php echo urlencode ($userdATASet->tbl_hodId); ?>">
                      <?php  echo '+'.($userdATASet->tbl_hodTel);  ?>
                    </a>
                  </td>

                  <td>
                    <a href="./view-hod.php?a=<?php echo urlencode ($userdATASet->tbl_hodId); ?>">
                      <?php echo ($userdATASet->tbl_hodAddress);   ?>
                    </a>
                  </td>

                  <td>
                    <a href="./view-hod.php?a=<?php echo urlencode ($userdATASet->tbl_hodId); ?>">
                      <?php echo ($userdATASet->tbl_hodUserName);   ?>
                    </a>
                  </td>


                  <td class="text-center">
                    <a href="update_hod.php?u=<?php  echo urlencode($userdATASet->tbl_hodId);  ?>" class="btn btn-primary">
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
  
