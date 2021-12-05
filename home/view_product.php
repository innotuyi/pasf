<?php session_start();  
  include '../connect/connect.php'; 

  include '../function/function.php'; 

  if (isset($_SESSION['guestId'])) {

    include './add_cart.php';
  }

  include './head.php';  

  if ($_GET['p']) {

    $info = prodData($_GET['p']);   

    if(!isset($info)){

      exit('<div class="container"><h1 class="text-danger"> Wrong Operation</h1></div>');

    } 

    $model = modelData($info->tbl_modelId);
    $categ = category($info->tbl_categoryId); ?>

   <div class="container">
 <div id="section-1">
        <div class="row">
  <div class="col-sm-4 ">
  <div class="card">
  <a href="#">
  <img class="card-img-top" src="../img/<?php  echo $info->tbl_productPicture; ?>" alt="Card image" width="640px" height="300" style="border-bottom:1px solid black">
  <div class="card-body">
    <h4 class="card-title"><?php echo $info->tbl_productName; ?></h4>
    <h4 class="card-title">Price:<?php  echo $info->tbl_productPrice; ?> Rwfs  </h4>  
    <p class="card-text">Model: <small><?php  echo $model->tbl_modelName; ?></small></p>

    <p class="card-text">Type: <small><?php  echo $categ->tbl_categoryName; ?></small></p>
    <h3 class="card-title">Available Quantity:<strong> <?php  echo $info->tbl_productQty; ?> </strong></h3>
     <br>
     <?php  if (isset($_SESSION['guestId']) && ($info->tbl_productQty > 0) ) {   ?>

<form class="row" method="post" action="cart.php?p=<?php  echo urlencode($info->tbl_productId);  ?>&action=add&id=<?php  echo urlencode($info->tbl_productId);  ?>">
<div class="form-group col-md-6">
    <label>Quantity</label>
    <input type="number" name="quantity"  value="1" class="form-control input" >
  </div>

  <div class="form-group col-md-6 button">
    <button type="submit" name="add" class="btn btn-warning btn-do  btn-block">
      <i class="fas fa-plus"></i>
      Add To Cart
    </button>                
  </div>

</form>

<?php   }   ?>
  </div>
  </a>               
</div>                 
          </div>

                
        </div>
      </div>



      <div id="section-1"><br><br>
        <div class="row">

          <h4 class="col-md-12 text-center text-warning">Furnitures</h4>

          <?php 

            $count = 0;
            $proddATA = product();

            foreach ($proddATA as $prod) {  

              $count = $count + 1;  
              $prodModel = modelData($prod->tbl_modelId); ?>

              <div class="col-sm-4 ">
              <div class="card">
  <a href="view_product.php?p=<?php  echo urlencode($prod->tbl_productId); ?>">
  <img class="card-img-top" src="../img/<?php  echo $prod->tbl_productPicture; ?>" alt="Card image" width="640px" height="300" style="border-bottom:1px solid black">
  <div class="card-body">
    <h4 class="card-title"><?php  echo $prod->tbl_productName; ?></h4>
    <h4 class="card-title">Price:<?php  echo $prod->tbl_productPrice; ?> Rwfs  </h4>  
    <p class="card-text"> Model: <small><?php  echo $prodModel->tbl_modelName; ?></small></p>
  </div>
  </a>              
</div>
</div>


          <?php  }  ?>

                
        </div>
      </div>

      <hr>
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

      <?php  }  ?>



        <?php include './footer.php';  ?>