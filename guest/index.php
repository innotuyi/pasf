<?php session_start();  
  
  include '../connect/connect.php';  
  require_once '../function/function.php';  

  include '../layout/header.php';    ?>

<div class="container-fluid" id="contentContainer-fluid">
  <div class="row">

    <div class="col-md-12" id="jumbotron">

      <!--<div class="">  -->
        <div class="container text-center">
          <h1 class="bg-white">Platform For Advertising And Selling Furniture</h1>

          <section class="section1 pull-left col-md-4" ><br/>
              <p class="text-center">If you're not user, 
                <a href="#" id="register" >Register</a>
              </p>
          </section>

          
          <section class="section col-md-4" >
            <center>
              <img src="../img/table.JPG" class="profile" >
            </center>

            <center>
              <h4 class="prof-name">
                Apple
              </h4>
            </center>
          </section>
          

          
          <section class="section1 pull-right col-md-4" ><br/>
              <p class="text-center">If you want to visit, 
                <a href="#" class="contact" id="contact">Contact us</a>
              </p>
          </section><br>

        </div>
      <!--</div> -->
    </div>

  </div>
  <!-- end of first row -->
  
  <div class="row prod" >


    <div class="col-md-9" id="content">

      <h4 class="text-center head-content every-header">Products</h4>


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

<?php include '../layout/footer.php';  ?>
