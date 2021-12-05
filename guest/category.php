<?php session_start();  
  
  include '../connect/connect.php';  
  require_once '../function/function.php'; 

  include './add_cart.php'; 
  include '../layout/header.php';  


  if ($_GET['c']) {

    $info = category($_GET['c']);   

    if(!isset($info)){

      exit('<h1 class="text-danger"> Wrong oeration</h1>');
    

    }  ?>

    <div class="container-fluid content" id="contentContainer-fluid">
  
      <div class="row prod" >

        <div class="col-md-9" id="content">
          <h4 class="text-center head-content">
            <b class="text-info">
              <?php  echo ucwords( $info->tbl_product_categName)."'s";   ?>
            </b> products
          </h4>

            <?php 
 
              $PdATA = productForCateg($info->tbl_product_categId);
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

    <?php  }   ?>

  <?php include '../layout/footer.php';  ?>
