<?php session_start();  
  
  include '../connect/connect.php';  
  require_once '../function/function.php';  

  if (isset($_SESSION['guestId'])) {

    include './add_cart.php';
  }

  include '../layout/header.php';    


  if ($_GET['p']) {

    $info = prodData($_GET['p']);   

    if(!isset($info)){

      exit('<h1 class="text-danger"> Wrong oeration</h1>');
    

    }    ?>

    <div class="container-fluid content" id="contentContainer-fluid">
  
      <div class="row prod" >

        <div class="col-md-9" id="content">

          <!--
          <h4 class="text-center head-content">
            Product: 
            <b class="text-info">
              <?php /// echo $info->tbl_productName;  ?>
            </b>
          </h4> -->

          <div class="col-md-6 view-content">

            <h4 class="header-data text-center text-white" style="color: white;">
              <?php  echo $info->tbl_productName;  ?>
            </h4>

            <center>
              <img src="../img/<?php  echo $info->tbl_productProfile;  ?>" class="img-responsive">
            </center>

            <h4 class="text-center">
              Price:  
              <b class="text-info"> 
                $ <?php  echo $info->tbl_producCost;  ?>
              </b>
            </h4>

            <h4 class="text-center">
              Quantity:  
              <b class="text-info"> 
                <?php  echo $info->tbl_productQty;  ?>
              </b>
            </h4>


            <h4 class="text-center">
              <?php  echo $info->tbl_productMore;  ?>
            </h4>


            <?php  if (isset($_SESSION['guestId']) && ($info->tbl_productQty > 0) ) {   ?>

              <form method="post" action="view_product.php?p=<?php  echo urlencode($info->tbl_productId);  ?>&action=add&id=<?php  echo urlencode($info->tbl_productId);  ?>">
              
                <div class="form-group col-md-8">
                  <label>Quantity</label>
                  <input type="number" name="quantity"  value="1" class="form-control input" >
                </div>

                <div class="form-group col-md-3 button">
                  <button type="submit" name="add" class="btn btn-success btn-do">
                    <i class="fa fa-plus"></i>
                    Add To Cart
                  </button>                
                </div>

              </form>

            <?php   }   ?>

            
            </div>  


          <div class="col-md-6 " >

            <h4 class="text-center col-md-12 header-data">Views</h4>

            <?php 
 
              $PViewdATA = productView($info->tbl_productId);
              foreach ($PViewdATA as $PViewdATASet) {   ?>

                <div class="view col-md-6">
                  <center>
                    <img src="../img/<?php  echo $PViewdATASet->tbl_prod_imgFile;  ?>" class="img-responsive">
                  </center>

                  <h4 class="text-center">
                    <?php  echo $PViewdATASet->tbl_prod_imgCapt;  ?>
                  </h4>
            
                </div> 

            <?php  }   ?>

          </div> 



            <h4 class="text-center head-content col-md-12">
              Other Products: 
            </h4>

            <?php 
 
              $PdATA = product();
              foreach ($PdATA as $PdATASet) {   ?>

                <div class="col-md-3 grid1">
                  <center>
                    <a href="view_product.php?p=<?php  echo urlencode($PdATASet->tbl_productId);  ?>">
                      <img src="../img/<?php  echo $PdATASet->tbl_productProfile;  ?>" class="img-responsive">
                    </a>
                  </center>

                  <h4 class="text-center">
                    <a href="view_product.php?p=<?php  echo urlencode($PdATASet->tbl_productId);  ?>">
                      <?php  echo $PdATASet->tbl_productName;  ?>
                    </a>
                  </h4>

                  <h4 class="text-center">
                    <a href="view_product.php?p=<?php  echo urlencode($PdATASet->tbl_productId);  ?>">
                      Price:  
                      <b class="text-info"> 
                        $ <?php  echo $PdATASet->tbl_producCost;  ?>
                      </b>
                    </a>
                  </h4>
                </div>

            <?php  }  ?>          


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
