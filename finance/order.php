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
        <h4 class="text-center head-content">Ordered furnitures</h4>

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
              <th>Customer's Phone</th>

              <th>Done On</th>

              <th>Action</th>
            </tr>

            <?php 

              $count = 0;
              $orderdATA = loadOrder();

              foreach ($orderdATA as $orderdATASet) {  

                $count = $count + 1;  

                $prod = prodData(($orderdATASet->tbl_productId));
                
                $customerInfo = customerData($orderdATASet->tbl_customerId);  ?>

                <tr>

                  <td>
                    <a href="#"> 
                      <?php  echo $count;  ?>
                    </a>
                  </td>
                  <td>
                    <img src="../img/<?php echo ($prod->tbl_productPicture);   ?>" style="height: 60px; width: 60px;">  </td>

                  <td><?php echo ($prod->tbl_productName);   ?> </td>
                  <td><?php  echo ($orderdATASet->tbl_orderAmt);  ?></td>

                  <td> <?php echo ($orderdATASet->tbl_orderQty);   ?></td>
                  <td>Rwfs <?php  echo number_format($orderdATASet->tbl_orderQty * $orderdATASet->tbl_orderAmt); ?></td>

                  <td><?php  echo ($customerInfo->tbl_customerFname).' '.($customerInfo->tbl_customerLname);  ?></td>
                  <td><?php  echo ($customerInfo->tbl_customerTel);  ?></td>

                  <td> <?php echo ($orderdATASet->tbl_orderDate);   ?></td>


                  <td class="text-center">
                    <a href="edit_order.php?o=<?php  echo urlencode($orderdATASet->tbl_orderId);  ?>" class="btn btn-primary">
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
