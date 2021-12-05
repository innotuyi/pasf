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

        <h4 class="text-center head-content">Shopping cart</h4>

        <table class="table table-bordered" >

          <tr>
            <th>Furniture Name</th>
            <th>Quantity</th>
            <th>Price </th>

            <th>Total Price</th>
            <th>Remove Furniture</th>
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

                  <td><a class="text-danger" href="./cart.php?action=delete&id=<?php echo urlencode($prod->tbl_productId); ?> "> Remove</a></td>

                <?php  } ?>

              </tr>

              <?php $count = $count + 1;  ?>

          <?php $total = $total + ($value['item_quantity']  * $value['product_price']); ?>

          <?php   }  ?> 

            <tr>
              <td colspan="3" align="right">Total</td>
              <th align="right"> <b class="text-primary"><?php echo number_format($total);  ?></b> Rwfs</th>

              <th>

                <?php  if(isset($_SESSION['guestId']))  {   ?>
                  <a class="btn btn-success pull-right" id="addProdToCartConfirm"  href="./cart.php?action=confirm">&#10004; Confirm</a>  

                <?php  }   ?> 
              </th>       
            </tr>
          <?php    } else{  ?>

            <tr>
              <td><p class="text-danger">No Furniture added </p></td>
            </tr>
          <?php }  ?>
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