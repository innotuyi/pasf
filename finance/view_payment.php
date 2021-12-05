<?php session_start();  
  
  include '../connect/connect.php';  
  require_once '../function/function.php';  

  if(!isset($_SESSION['adId']) && !isset($_SESSION['financeId'])  && !isset($_SESSION['hodId']) ){ 

    echo '<script>window.location="../home/index.php"</script>';
    exit();
  }

  include '../layout/header.php';    


  if ($_GET['py']) {

    $paymentdATASet = paymentOrderData($_GET['py']);   

    if(!isset($paymentdATASet)){

      exit('<h1 class="text-danger"> Wrong Operation</h1>');
    

    }    

    $orderdATASet = orderData($paymentdATASet->tbl_orderId);
    $prod = prodData(($orderdATASet->tbl_productId));

    $customerInfo = customerData($orderdATASet->tbl_customerId); 
    $categ = category($prod->tbl_categoryId);

    $model = modelData($prod->tbl_modelId);         ?>

    <div class="container" id="contentContainer-fluid">
  
      <div class="row prod" id="content-data">

        <div class="col-md-2 left-data-link" > 
          <?php  include '../layout/navigation.php';  ?>
        </div>

        <div class="col-md-10">

          <div class="col-md-11 view-content">

            <h4 class="header-data text-center text-white" style="color: white;">
              View payment of : 
              <?php  echo ($customerInfo->tbl_customerFname).' '.($customerInfo->tbl_customerLname);  ?>
            </h4>

            <div class="table-responsive">
              <table class="table table-bordered table-hover">

                <tr>
                  <td>
                    Name: 

                    <b class="text-primary">
                      <?php  echo ucwords($prod->tbl_productName);  ?> 
                    </b>
                  </td>
                </tr>

                <tr>
                  <td>
                    Model:

                    <b class="text-primary"> 
                      <?php  echo $model->tbl_modelName; ?> 
                    </b>
                  </td>
                </tr>

                <tr>
                  <td>
                    Type:

                    <b class="text-primary"> 
                      <?php  echo ucwords($categ->tbl_categoryName);  ?> 
                    </b>
                  </td>
                </tr>



               <tr>
                  <td>
                    Bought quantity: 
                    <b class="text-primary">
                      <?php echo ($orderdATASet->tbl_orderQty);   ?> 
                    </b>
                  </td>
                </tr>

                <tr>
                  <td>
                    Amount:

                    <b class="text-primary"> 
                      Rwfs <?php  echo number_format($orderdATASet->tbl_orderQty * $orderdATASet->tbl_orderAmt); ?>
                    </b>
                  </td>
                </tr>
 

                <tr>
                  <td>
                    Price: 
                    <b class="text-primary">
                      Rwfs <?php  echo ucwords($prod->tbl_productPrice);  ?> 
                    </b>
                  </td>
                </tr>

                <tr>
                  <td>
                    Bought By: 
                    <b class="text-primary">
                      <?php  echo ($customerInfo->tbl_customerFname).' '.($customerInfo->tbl_customerLname);  ?>
                    </b>
                  </td>
                </tr>

                <tr>
                  <td colspan="2">
                    <img src="../img/<?php  echo ($paymentdATASet->tbl_paid_orderSlip);  ?> " style="height: 400px;" class="img-responsive"> 
                  </td>
                </tr>




                <tr>

                  <td>
                    <?php  if($paymentdATASet->tbl_paid_orderStatus == 0)  {   ?>
                      <a href="confirm_payment.php?py=<?php  echo urlencode($paymentdATASet->tbl_paid_orderId);  ?>" class="btn btn-success">
                        Confirm Payment
                      </a>

                    <?php  } else {  ?>

                      <a href="confirm_payment.php?py=<?php  echo urlencode($paymentdATASet->tbl_paid_orderId);  ?>" class="btn btn-danger">
                        <i class="fa fa-warning text-danger"></i>
                        Remove Payment
                      </a>


                    <?php }  ?>
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
