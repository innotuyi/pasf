<?php session_start();
  include '../connect/connect.php'; 

  include '../function/function.php';
  include './add_cart.php'; 

  include './head.php';               ?>
  
        <div class="container">
            <div id="section-1">
              <div class="row">



      <div class="col-md-12" id="content" >
        
      <div class="table-responsive" style="background-color: white;">

        <h4 class="text-center head-content">Bought Furnitures</h4>

          <table class="table table-bordered table-hover">

            <tr>
              <th>Photo</th>
              <th>Furniture Name</th>
              <th>Price</th>

              <th>Quantity</th>
              <th>Amount</th>
              
              <th></th>
            </tr>

            <?php 

              $orderdATA = order($_SESSION['guestId']);
              $total = 0;
              $totalQty =0;

              foreach ($orderdATA as $orderdATASet) {  

                $prod = prodData(($orderdATASet->tbl_productId));

                $paidOrderData = checkPaidOrderData($orderdATASet->tbl_orderId, 1); 
                $pendingPaidOrder = checkPaidOrderData($orderdATASet->tbl_orderId, 0);  

                $total = $total + ($orderdATASet->tbl_orderQty * $orderdATASet->tbl_orderAmt); 
                $totalQty = $totalQty + ($orderdATASet->tbl_orderQty); ?>

                <tr>
                  <td>
                    <img src="../img/<?php echo ($prod->tbl_productPicture);   ?>" style="height: 60px; width: 60px;">  </td>

                  <td><?php echo ($prod->tbl_productName);   ?> </td>
                  <td><?php  echo ($orderdATASet->tbl_orderAmt);  ?></td>

                  <td><?php echo ($orderdATASet->tbl_orderQty);   ?></td>
                  <td>Rwfs <?php  echo number_format($orderdATASet->tbl_orderQty * $orderdATASet->tbl_orderAmt); ?></td>

                  <?php  if(  ($orderdATASet->tbl_orderStatus == 1) && ($pendingPaidOrder > 0) )  {   ?>

                    <td class="text-center">
                      <b class="text-success">
                        Pending  
                      </b>
                    </td>

                  <?php  } else if(  ($orderdATASet->tbl_orderStatus == 1) && ($paidOrderData == 0) )  {   ?>

                    <td class="text-center">
                      <a href="pay.php?o=<?php  echo urlencode($orderdATASet->tbl_orderId);  ?>" class="btn btn-primary">
                        <i class="fa fa-money"></i>
                        Pay  
                      </a>
                    </td>

                  <?php  } else {   ?>

                    <td class="text-center">
                      <b class="text-primary">
                        Paid  
                      </a>
                    </td>
                  <?php  }   ?>


                </tr>

              <?php }  ?> 

              <tr class="bg-light">
                <td colspan="3">Total</td>
                <td><?php echo number_format($totalQty); ?></td>
                <td>
                  Rwfs <?php echo number_format($total); ?>
                </td>
              </tr>

          </table>


        </div>         


      </div>




                
              </div>
        </div>

        <div id="section-3 mt-3">
            <div class="row" >

              <h2 class="text-center text-danger pt-4">Get in  Touch</h2>
              <div class="col-md-4">
                <i class="fas fa-user fa-3x text-center p-5"></i>
               
               
                
                <h4> k3878 Fallen Point
                </h4>
              
            </div>
            <div class="col-md-4 p-2">
                <i class="fas fa-phone-square fa-3x  p-5"></i>
                
                 <h4>0785530781</h4>
                
            </div>
            <div class="col-md-4">
                <i class="fas fa-envelope fa-3x text-center  p-5"></i>
                
                <h4>iprcfurn@gmail.com</h4>

                
            </div>
            

            </div>
            
        </div>





        <?php include './footer.php';  ?>