<?php session_start();  
  
  include '../connect/connect.php';  
  require_once '../function/function.php';  

  if(!isset($_SESSION['adId']) && !isset($_SESSION['financeId'])  && !isset($_SESSION['hodId']) ){ 

    echo '<script>window.location="../home/index.php"</script>';
    exit();
  }

  include '../layout/header.php';    


  if ($_GET['a']) {

    $userdATASet = userData($_GET['a']); 

    if(!isset($userdATASet)){

      exit('<h1 class="text-danger"> Wrong operation</h1>');
    

    }    ?>

    <div class="container" id="contentContainer-fluid">
  
      <div class="row prod" id="content-data">

        <div class="col-md-2 left-data-link" > 
          <?php  include '../layout/navigation.php';  ?>
        </div>

        <div class="col-md-10">

          <div class="col-md-12 view-content">

            <h4 class="header-data text-center text-white" style="color: white;">
              View admin: 

              <?php echo ($userdATASet->tbl_adminName);   ?>
            </h4>

            <div class="table-responsive">
              <table class="table table-bordered table-hover">

                <tr>
                  <td>
                    Full Name: 

                    <b class="text-primary">
                      <?php echo ($userdATASet->tbl_adminName);   ?>
                    </b>
                  </td>
                </tr>

                <tr>
                  <td>
                    E-Mail: 
                    <b class="text-primary">
                      <?php echo ($userdATASet->tbl_adminEmail);   ?>
                    </b>
                  </td>
                </tr>


                <tr>
                  <td>
                    Phone Number: 
                    <b class="text-primary">
                      <?php  echo '+'.($userdATASet->tbl_adminTel);  ?>
                    </b>
                  </td>
                </tr>

                <tr>
                  <td>
                    Address: 
                    <b class="text-primary">
                      <?php echo ($userdATASet->tbl_adminAddress);   ?> 
                    </b>
                  </td>
                </tr>

                <tr>
                  <td>
                    Username: 
                    <b class="text-primary">
                      <?php echo ($userdATASet->tbl_adminUserName);   ?>
                    </b>
                  </td>
                </tr>



                <tr>
                  <td>
                    <a href="./index.php" class="btn btn-danger">
                      <i class="fa fa-arrow-left"></i>
                      Back
                    </a>
                  </td>
                </tr>



              </table>
            </div>


            
            </div>  


          <div class="col-md-3" ></div> 
     

          </div>



        </div><br><br><br><br><br><br><br><br><br>
  
      </div>

    <?php  }  ?>

  <?php include '../layout/footer.php';  ?>
