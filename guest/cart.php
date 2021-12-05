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
        <h4 class="text-center head-content">Shopping cart</h4>
      <div class="table-responsive">
        <table class="table table-bordered">

          <tr>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price Details</th>

            <th>Total Price</th>
            <th>Remove Item</th>
          </tr>

          <?php
            if(!empty($_SESSION["cart"])){
              $count = 0;
              $total = 0;
              foreach($_SESSION["cart"] as $key => $value){  

                $prod = prodData(($value['product_id'])); 

                if(!$prod){
                  continue;
                } 
          ?>

              <tr>
                <td><?php echo ($value["item_name"]);   ?> </td>
                <td><?php  echo ($value["item_quantity"]);  ?></td>
                <td>$ <?php echo ($value["product_price"]);   ?></td>
                <td>Rwfs <?php  echo number_format($value["item_quantity"] * $value["product_price"]); ?></td>

                <?php  if(isset($_SESSION['guestId']))  {   ?>

                  <td><a class="text-danger" href="product.php?action=delete&id=<?php echo urlencode($prod->tbl_productId); ?> "> Remove</a></td>

                <?php  } ?>

              </tr>

              <?php $count = $count + 1;  ?>

          <?php $total = $total + ($value['item_quantity']  * $value['product_price']); ?>

          <?php   }  ?> 

            <tr>
              <td colspan="3" align="right">Total</td>
              <th align="right">$ <b class="text-primary"><?php echo number_format($total);  ?></b> </th>

              <th>

                <?php  if(isset($_SESSION['guestId']))  {   ?>
                  <a class="btn btn-success pull-right" id="addProdToCartConfirm"  href="cart.php?action=confirm">&#10004; Confirm</a>  

                <?php  }   ?> 
              </th>       
            </tr>
          <?php    } else{  ?>

            <tr>
              <td><p class="text-danger">No product added </p></td>
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

              <div class="col-md-6 type" style="background-image: url('../img/<?php echo htmlentities($dataSet->tbl_product_categPhoto);  ?>');">

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
