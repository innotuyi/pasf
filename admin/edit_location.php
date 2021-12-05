<?php session_start();  
  
  include '../connect/connect.php';  
  require_once '../function/function.php';  

  if(!isset($_SESSION['adId']) && !isset($_SESSION['financeId'])  && !isset($_SESSION['hodId']) ){ 

    echo '<script>window.location="../guest/index.php"</script>';
    exit();
  }


  if ($_GET['l']) {

    $info = shipLocationData($_GET['l']);   

    if(!isset($info)){

      exit('<h1 class="text-danger"> Wrong operation</h1>');
    

    }    

    $city = cityData($info->tbl_cityId); 


  include '../layout/header.php';     ?>

    <input type="hidden" id="Elocation" value="<?php  echo  $info->tbl_shipping_locId;  ?>">

    <div class="container-fluid"  id="contentContainer-fluid">
  
      <div class="row prod" >

        <div class="col-md-12">

          <div class="col-md-3"></div>

          <div class="col-md-6 view-content">

            <h4 class="header-data text-center text-white" style="color: white;">
              <i class="fa fa-edit"></i>
              Edit shipping location 
            </h4>



              <form  method="POST" >

                <center>
                  <p class="error"></p>
                </center>

                <div class="form-group col-md-6">
                  <label>Shipping cost</label>
                  <input value="<?php  echo  $info->tbl_shipping_locCost;  ?>" class="form-control input" id="EshipCost"  >
                </div>

                <div class="form-group col-md-6">
                  <label>City</label>
                  <select   class="form-control input" id="EshipLoc" >

                    <option value="<?php  echo ($city->tbl_cityId);  ?>">
                      <?php  echo ($city->tbl_cityName);  ?>
                    </option>


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
                  <button type="button" id="EshipLocConfirm" class="btn btn-primary btn-do pull-left">
                    <i class="fa fa-edit"></i>
                    Update
                  </button>                
                </div>

              </form>

            
            </div>  


          <div class="col-md-3" ></div> 
     

          </div>



        </div><br><br><br><br><br><br><br><br><br>
  
      </div>


    <?php  }   ?>


  <?php include '../layout/footer.php';  ?>
