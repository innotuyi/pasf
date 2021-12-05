<?php session_start();  
  
  include '../connect/connect.php';  
  require_once '../function/function.php';  

  if(!isset($_SESSION['guestId'])){

    echo '<script>window.location="index.php"</script>';
    exit();
  }


  if (isset($_SESSION['guestId'])) {

    include './add_cart.php';
  }

  include '../layout/header.php';    


  if ($_GET['o']) {

    $info = orderData($_GET['o']);   

    if(!isset($info)){

      exit('<h1 class="text-danger"> Wrong oeration</h1>');
    

    }    

    $product = prodData($info->tbl_productId);  ?>

    <div class="container-fluid" style="margin-top: 70px;" id="contentContainer-fluid">
  
      <div class="row prod" >

        <div class="col-md-9" id="content">

          <div class="col-md-3"></div>

          <div class="col-md-6 view-content">

            <input type="hidden" value="<?php echo $info->tbl_orderId;  ?>" id="order">

            <h4 class="header-data text-center text-white" style="color: white;">
              Where do you want to ship

              <?php  echo ucwords($product->tbl_productName);  ?>
            </h4>


            <?php  if (isset($_SESSION['guestId'])) {   ?>

              <form method="post" action="view_product.php?p=<?php  echo urlencode($info->tbl_productId);  ?>&action=add&id=<?php  echo urlencode($info->tbl_productId);  ?>">
              
                <div class="form-group">
                  <label>Shipping location</label>
                  <select   class="form-control input" id="location" >
                    <?php 
 
                      $shipdATA = shipLocation();
                      foreach ($shipdATA as $shipdATASet) {   

                        $city = cityData($shipdATASet->tbl_cityId); ?>

                        <option value="<?php  echo $shipdATASet->tbl_shipping_locId; ?>">
                          <?php  echo $city->tbl_cityName.' - '.$shipdATASet->tbl_shipping_locCost.' Rwfs'; ?> 
                        </option>

                    <?php  }   ?>
                    
                  </select>
                </div>

                <div class="form-group">
                  <label>Address 1</label>
                  <input class="form-control input" id="address1" >
                </div>

                <div class="form-group">
                  <label>Address 2</label>
                  <input class="form-control input" id="address2" >
                </div>


                <div class="form-group button">
                  <button type="button" id="ship" class="btn btn-success btn-do">
                    Confirm
                  </button>                
                </div>

              </form>

            <?php   }   ?>

            
            </div>  


          <div class="col-md-3 " >


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

    <?php  }  ?>

  <?php include '../layout/footer.php';  ?>
