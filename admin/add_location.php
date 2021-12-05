<?php session_start();  
  
  include '../connect/connect.php';  
  require_once '../function/function.php';  

  if(!isset($_SESSION['adId']) && !isset($_SESSION['financeId'])  && !isset($_SESSION['hodId']) ){ 

    echo '<script>window.location="../guest/index.php"</script>';
    exit();
  }

  include '../layout/header.php';     ?>

    <div class="container-fluid"  id="contentContainer-fluid">
  
      <div class="row prod" >

        <div class="col-md-12">

          <div class="col-md-3"></div>

          <div class="col-md-6 view-content">

            <h4 class="header-data text-center text-white" style="color: white;">
              <i class="fa fa-plus"></i>
              Add new shipping location 
            </h4>



              <form  method="POST" >

                <center>
                  <p class="error"></p>
                </center>

                <div class="form-group col-md-6">
                  <label>Shipping cost</label>
                  <input  class="form-control input" id="shipCost"  >
                </div>

                <div class="form-group col-md-6">
                  <label>City</label>
                  <select   class="form-control input" id="shipLoc" >

                    <?php 
 
                      $citydATA = city();
                      foreach ($citydATA as $citydATASet) {   ?>

                        <option value="<?php  echo ($citydATASet->tbl_cityId);  ?>">
                          <?php  echo ($citydATASet->tbl_cityName);  ?>
                        </option>
                    <?php  }   ?>
                    
                  </select>
                </div>

                <div class="form-group button col-md-6">
                  <button type="button" id="shipLocConfirm" class="btn btn-primary btn-do pull-left">
                    Register
                  </button>                
                </div>

              </form>

            
            </div>  


          <div class="col-md-3" ></div> 
     

          </div>



        </div><br><br><br><br><br><br><br><br><br>
  
      </div>


  <?php include '../layout/footer.php';  ?>
