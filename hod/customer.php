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
      <h4 class="text-center head-content">All customers</h4>

        <div class="table-responsive">
          <table class="table table-bordered table-hover">

            <tr>
              <th>N<sup><sup><u>o</u></sup></sup></th>
              <th>Name</th>
              <th>E-Mail</th>

              <th><i class="fa fa-phone"></i> Phone</th>
              <th>Address</th>
              
              <th>Username</th>
            </tr>

            <?php 

              $count = 0;
              $userdATA = customer();

              foreach ($userdATA as $userdATASet) {  

                $count = $count + 1;  ?>

                <tr>

                  <td>
                    <a href="./view-customer.php?c=<?php echo urlencode ($userdATASet->tbl_customerId); ?>"> 
                      <?php  echo $count;  ?>
                    </a>
                  </td>

                  <td>
                    <a href="./view-customer.php?c=<?php echo urlencode ($userdATASet->tbl_customerId); ?>">  
                      <?php echo ($userdATASet->tbl_customerFname).' '.($userdATASet->tbl_customerLname);   ?>
                    </a>
                  </td>

                  <td>
                    <a href="./view-customer.php?c=<?php echo urlencode ($userdATASet->tbl_customerId); ?>"> 
                      <?php echo ($userdATASet->tbl_customerEmail);   ?>
                    </a>
                  </td>

                  <td>
                    <a href="./view-customer.php?c=<?php echo urlencode ($userdATASet->tbl_customerId); ?>">
                      <?php  echo '+'.($userdATASet->tbl_customerTel);  ?>
                    </a>
                  </td>

                  <td>
                    <a href="./view-customer.php?c=<?php echo urlencode ($userdATASet->tbl_customerId); ?>">
                      <?php echo ($userdATASet->tbl_customerAddress);   ?>
                    </a>
                  </td>

                  <td>
                    <a href="./view-customer.php?c=<?php echo urlencode ($userdATASet->tbl_customerId); ?>">
                      <?php echo ($userdATASet->tbl_customerUserName);   ?>
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
  
