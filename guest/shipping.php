<?php session_start();  
  
  include '../connect/connect.php';  
  require_once '../function/function.php';

  if(!isset($_SESSION['guestId'])){

    echo '<script>window.location="index.php"</script>';
    exit();
  }


  include './add_cart.php'; 
  include '../layout/header.php';    ?>

  <div class="container-fluid content" id="contentContainer-fluid">
  
    <div class="row prod" >

      <div class="col-md-9" id="content">
        <h4 class="text-center head-content">Shipped products</h4>

        <div class="table-responsive">
          <table class="table table-bordered table-hover">

            <tr>
              <th>Photo</th>
              <th>Product Name</th>
              <th>Price</th>

              <th>Quantity</th>
              <th>Amount</th>

              <th>Shipping Cost</th>
              <th>Location</th>

            </tr>

            <?php 

              $orderdATA = order($_SESSION['guestId']);

              foreach ($orderdATA as $orderdATASet) {  

                $prod = prodData(($orderdATASet->tbl_productId));

                $shipped = shippedForOrderData(($orderdATASet->tbl_orderId)); 

                if(!isset($shipped)){
                  continue;
                
                } 
                
                $shipLoc = shipLocationData($shipped->tbl_shipping_locId);
                $city = cityData($shipLoc->tbl_cityId);    ?>

                <tr>
                  <td>
                    <img src="../img/<?php echo ($prod->tbl_productProfile);   ?>" style="height: 60px; width: 60px;">  </td>

                  <td><?php echo ($prod->tbl_productName);   ?> </td>
                  <td><?php  echo ($orderdATASet->tbl_orderAmount);  ?></td>

                  <td>$ <?php echo ($orderdATASet->tbl_orderQty);   ?></td>
                  <td>Rwfs <?php  echo number_format($orderdATASet->tbl_orderQty * $orderdATASet->tbl_orderAmount); ?></td>

                  <td>$ <?php echo ($shipped->tbl_shippingCost);   ?></td>
                  <td> <?php  echo ($city->tbl_cityName).'/'.($shipped->tbl_shippingAddr1).'/'.($shipped->tbl_shippingAddr2); ?></td>

                  
                  <?php  if($shipped->tbl_shippingArrive == 0)  {    ?>

                    <td class="text-center">
                      Not arrived
                    </td>

                  <?php  } else{  ?>
              
                    <td class="text-center">
                      Arrived
                    </td>

                  <?php  }  ?>

                </tr>

              <?php }  ?> 

          </table>

        </div>    

      </div>


      <div class="col-md-2 grid-Item">

        <div class="form-group">
          <input id="search-prod" placeholder="Search Product" class="form-control input"  >
        </div>

        <h5 class="text-center">Categories</h5>

          <?php 
 
            $data = prodCateg();
            foreach ($data as $dataSet) {   ?>

              <div class="col-md-6 type" style="background-image: url('../img/<?php echo htmlentities(    $dataSet->tbl_product_categPhoto);  ?>');">

                <h4 class="text-center">
                  <a href="category.php?c=<?php echo urlencode( ($dataSet->tbl_product_categId));  ?>">
                    <?php echo htmlentities($dataSet->tbl_product_categName);  ?>
                  </a>
                </h4>
              </div>

          <?php  }  ?>  
        <br><br><br>
      </div>

    </div><br><br><br><br><br><br><br><br><br>
  
  </div>

  <?php include '../layout/footer.php';  ?>
