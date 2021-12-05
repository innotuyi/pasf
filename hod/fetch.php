<?php session_start();  
  
  include '../connect/connect.php';  
  require_once '../function/function.php'; 

  if(!isset($_SESSION['adId']) && !isset($_SESSION['financeId'])  && !isset($_SESSION['hodId']) ){ 

    echo '<script>window.location="../home/index.php"</script>';
    exit();
  }

  if ( (@$_GET['from']) != "" && (@$_GET['to']) != ""  ) {

    @$from = ($_GET['from']);
    @$to = ($_GET['to']);

    @$status = 1;   ?>


            <tr>
              <th>N<sup><sup><u>o</u></sup></sup></th>
              <th>Photo</th>
              <th>Product Name</th>
              <th>Price</th>

              <th>Quantity</th>
              <th>Amount</th>

              <th>Customer</th>
              
              <th>Status</th>
              <!--<th>Action</th>-->
            </tr>

            <?php 


              $count = 0;
              $paymentdATA = loadPaidOrderReport($from, $to);

              foreach ($paymentdATA as $paymentdATASet) {  

                $count = $count + 1;  
                $orderdATASet = orderData($paymentdATASet->tbl_orderId);

                $prod = prodData(($orderdATASet->tbl_productId));
                $customerInfo = customerData($orderdATASet->tbl_customerId);  ?>

                <tr>

                  <td>

                      <?php  echo $count;  ?>
                  </td>
                  <td>
                      <img src="../img/<?php echo ($prod->tbl_productPicture);   ?>" style="height: 60px; width: 60px;">  
                  </td>

                  <td>

                      <?php echo ($prod->tbl_productName);   ?> 

                  </td>
                  <td>

                      <?php  echo ($orderdATASet->tbl_orderAmt);  ?>

                  </td>

                  <td>

                      <?php echo ($orderdATASet->tbl_orderQty);   ?>

                  </td>
                  <td>

                    Rwfs <?php  echo number_format($orderdATASet->tbl_orderQty * $orderdATASet->tbl_orderAmt); ?>

                  </td>

                  <td>
                    <?php  echo ($customerInfo->tbl_customerFname).' '.($customerInfo->tbl_customerLname);  ?>
                  </td>

                  
                  <td>
                    <?php  if($paymentdATASet->tbl_paid_orderStatus == 0)  {   ?>

                        <b  class="text-warning">
                        Not Confirmed
                      </b>

                    <?php  }  else {  ?>

                      <b  class="text-primary">
                        Confirmed
                      </b>
                    <?php  }  ?>
                    
                  </td>

                </tr>

              <?php }  ?> 



  <?php  }