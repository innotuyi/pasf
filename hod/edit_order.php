<?php session_start();  
  
  include '../connect/connect.php';  
  require_once '../function/function.php';  

  if(!isset($_SESSION['adId']) && !isset($_SESSION['financeId'])  && !isset($_SESSION['hodId']) ){ 

    echo '<script>window.location="../home/index.php"</script>';
    exit();
  }

  include '../layout/header.php';    


  if ($_GET['o']) {

    $info = orderData($_GET['o']);   

    if(!isset($info)){

      exit('<h1 class="text-danger"> Wrong oeration</h1>');
    

    }    

    $product = prodData($info->tbl_productId); 

    $customerInfo = customerData($info->tbl_customerId); ?>

    <div class="container content"  id="contentContainer-fluid">
  
      <div class="row prod" id="content-data" >

        <div class="col-md-2 left-data-link" > 
          <?php  include '../layout/navigation.php';  ?>
        </div>

        <div class="col-md-10">

          <div class="col-md-6 view-content">

            <input type="hidden" value="<?php echo $info->tbl_orderId;  ?>" id="Eorder">

            <h4 class="header-data text-center text-white" style="color: white;">
              Edit order: 

              <?php  echo ucwords($product->tbl_productName);  ?> 
              (Rwfs <?php  echo number_format($info->tbl_orderQty *  $info->tbl_orderAmt);  ?>)
            </h4>

              <form method="post" action="#">
              
                <div class="form-group col-md-6">
                  <label>Product</label>
                  <select   class="form-control input" id="Eprod" >

                    <option value="<?php  echo ucwords($product->tbl_productId);  ?>">
                      <?php  echo ($product->tbl_productName);  ?>
                    </option>

                    <?php 
 
                      $proddATA = product();
                      foreach ($proddATA as $proddATASet) {   ?>

                        <option value="<?php  echo ucwords($proddATASet->tbl_productId);  ?>">
                          <?php  echo ($proddATASet->tbl_productName);  ?>
                        </option>
                    <?php  }   ?>
                    
                  </select>
                </div>


                <div class="form-group col-md-6">
                  <label>Customer</label>
                  <select   class="form-control input" id="Ecustomer" >

                    <option value="<?php  echo ucwords($customerInfo->tbl_customerId);  ?>">
                      <?php  echo ($customerInfo->tbl_customerFname).' '.($customerInfo->tbl_customerLname);  ?>
                    </option>

                    <?php 
 
                      $userdATA = customer();
                      foreach ($userdATA as $userdATASet) {   ?>

                        <option value="<?php  echo ucwords($userdATASet->tbl_customerId);  ?>">
                          <?php  echo ($userdATASet->tbl_customerFname).' '.($userdATASet->tbl_customerLname);  ?>
                        </option>
                    <?php  }   ?>
                    
                  </select>
                </div>


                <div class="form-group col-md-6">
                  <label>Quantity</label>
                  <input class="form-control input" id="Eqty"  value="<?php  echo $info->tbl_orderQty;  ?>" >
                </div>


                <div class="form-group button col-md-12">
                  <button type="button" id="Uorder" class="btn btn-primary btn-do pull-left">
                    <i class="fa fa-edit"></i>
                    Update
                  </button>

                  <a href="./customer.php"  class="btn btn-danger pull-right">
                    <i class="fa fa-arrow-left"></i>
                    Cancel
                  </a>

                </div>

              </form>

            
            </div>  


          <div class="col-md-3" ></div> 
     

          </div>



        </div><br><br><br><br><br><br><br><br><br>
  
      </div>

    <?php  }  ?>

  <?php include '../layout/footer.php';  ?>
