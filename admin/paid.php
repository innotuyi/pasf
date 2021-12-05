<?php session_start();  
  
  include '../connect/connect.php';  
  require_once '../function/function.php'; 

  if(!isset($_SESSION['adId']) && !isset($_SESSION['financeId'])  && !isset($_SESSION['hodId']) ){ 

    echo '<script>window.location="../home/index.php"</script>';
    exit();
  }

  //include './add_cart.php'; 
  include '../layout/header.php';    ?>

  <div class="container"  id="contentContainer-fluid">
    

    <div class="row prod" id="content-data" >

      <div class="col-md-2 left-data-link" > 
        <?php  include '../layout/navigation.php';  ?>
      </div>

      <div class="col-md-10">
        <h4 class="text-center head-content">Paid ordered furnitures</h4>

        <div class="table-responsive">
          <table class="table table-bordered table-hover">

            <tr>
              <th>N<sup><sup><u>o</u></sup></sup></th>
              <th>Photo</th>
              <th>Product Name</th>
              <th>Price</th>

              <th>Quantity</th>
              <th>Amount</th>

              <th>Customer</th>

              <th>Done On</th>
              <th>Status</th>
              <!--<th>Action</th>-->
            </tr>

            <?php 

              $count = 0;
              $paymentdATA = loadPaidOrder();

              foreach ($paymentdATA as $paymentdATASet) {  

                $count = $count + 1;  
                $orderdATASet = orderData($paymentdATASet->tbl_orderId);

                $prod = prodData(($orderdATASet->tbl_productId));
                $customerInfo = customerData($orderdATASet->tbl_customerId);  ?>

                <tr>

                  <td>
                    <a href="view_payment.php?py=<?php  echo urlencode($paymentdATASet->tbl_paid_orderId);  ?>"  >
                      <?php  echo $count;  ?>
                    </a>
                  </td>
                  <td>
                    <a href="view_payment.php?py=<?php  echo urlencode($paymentdATASet->tbl_paid_orderId);  ?>" >
                      <img src="../img/<?php echo ($prod->tbl_productPicture);   ?>" style="height: 60px; width: 60px;">  
                    </a>
                  </td>

                  <td>
                    <a href="view_payment.php?py=<?php  echo urlencode($paymentdATASet->tbl_paid_orderId);  ?>"  >
                      <?php echo ($prod->tbl_productName);   ?> 
                    </a>
                  </td>
                  <td>
                    <a href="view_payment.php?py=<?php  echo urlencode($paymentdATASet->tbl_paid_orderId);  ?>"  >
                      <?php  echo ($orderdATASet->tbl_orderAmt);  ?>
                    </a>
                  </td>

                  <td>
                    <a href="view_payment.php?py=<?php  echo urlencode($paymentdATASet->tbl_paid_orderId);  ?>"  >
                      <?php echo ($orderdATASet->tbl_orderQty);   ?>
                    </a>
                  </td>
                  <td>
                    <a href="view_payment.php?py=<?php  echo urlencode($paymentdATASet->tbl_paid_orderId);  ?>"  >
                      Rwfs <?php  echo number_format($orderdATASet->tbl_orderQty * $orderdATASet->tbl_orderAmt); ?>
                    </a>
                  </td>

                  <td>
                    <a href="view_payment.php?py=<?php  echo urlencode($paymentdATASet->tbl_paid_orderId);  ?>">
                      <?php  echo ($customerInfo->tbl_customerFname).' '.($customerInfo->tbl_customerLname);  ?>
                    </a>
                  </td>

                  <td>
                    <a href="view_payment.php?py=<?php  echo urlencode($paymentdATASet->tbl_paid_orderId);  ?>">
                      <?php echo ($paymentdATASet->tbl_paid_orderDate);   ?>
                    </a>
                  </td>


                  
                  <td>
                    <?php  if($paymentdATASet->tbl_paid_orderStatus == 0)  {   ?>
                      <a href="confirm_payment.php?py=<?php  echo urlencode($paymentdATASet->tbl_paid_orderId);  ?>" class="btn btn-success">
                          Confirm 
                      </a>

                    <?php  }  else {  ?>

                      <b  class="text-primary">
                        Confirmed
                      </b>
                    <?php  }  ?>
                    
                  </td>

                  <?php  if($paymentdATASet->tbl_paid_orderStatus == 1)  {   ?>

                    <td class="text-center">
                      <a href="remove_payment.php?py=<?php // echo urlencode($paymentdATASet->tbl_paid_orderId);  ?>" class="btn btn-danger">
                        <i class="fa fa-warning text-danger"></i>
                        Remove  
                      </a>
                    </td> 
                  <?php  } ?>
                </tr>

              <?php }  ?> 

          </table>

        </div>    

      </div>


    </div><br><br><br><br><br><br><br><br><br>
  
  </div>

  <?php include '../layout/footer.php';  ?>
