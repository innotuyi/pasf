<?php session_start();  
  
  include '../connect/connect.php';  
  require_once '../function/function.php';  

  if(!isset($_SESSION['adId']) && !isset($_SESSION['financeId'])  && !isset($_SESSION['hodId']) ){ 

    echo '<script>window.location="../home/index.php"</script>';
    exit();
  }

  include '../layout/header.php';    


  if ($_GET['st']) {

    $info = stockData($_GET['st']);   

    if(!isset($info)){

      exit('<h1 class="text-danger"> Wrong oeration</h1>');
    

    }    

    $product = prodData($info->tbl_productId); ?>

    <div class="container"  id="contentContainer-fluid">
  
      <div class="row prod" id="content-data" >

        <div class="col-md-2 left-data-link" > 
          <?php  include '../layout/navigation.php';  ?>
        </div>

        <div class="col-md-10">

          <div class="col-md-6 view-content">

            <input type="hidden" value="<?php echo $info->tbl_stockId;  ?>" id="Estock">

            <h4 class="header-data text-center text-white" style="color: white;">
              Edit transaction: 

              <?php  echo ucwords($product->tbl_productName);  ?> 
            </h4>

              <form method="post" action="#">
              
                <div class="form-group col-md-6">
                  <label>Product</label>
                  <select   class="form-control input" id="ETprod" >

                    <option value="<?php  echo ucwords($product->tbl_productId);  ?>">
                      <?php  echo ($product->tbl_productName);  ?>
                    </option>

                    <?php 
 
                      $proddATA = product();
                      foreach ($proddATA as $proddATASet) {   ?>

                        <option value="<?php  echo ucwords($proddATASet->tbl_productId);  ?>">
                          <?php  echo ($proddATASet->tbl_productName);  ?>
                        </option>
                    <?php  }   ?>
                    
                  </select>
                </div>

                <div class="form-group col-md-6">
                  <label>Quantity</label>
                  <input class="form-control input" id="ETqty"  value="<?php  echo $info->tbl_stockQty;  ?>" >
                </div>

                <div class="form-group col-md-6">
                  <label>Cost of production</label>
                  <input class="form-control input" id="ETcost"  value="<?php  echo $info->tbl_stockCost;  ?>" >
                </div>


                <div class="form-group button pull-right">
                  <button type="button" id="Ustock" class="btn btn-primary btn-do">
                    <i class="fa fa-edit"></i>
                    Update
                  </button>                
                </div>

              </form>

            
            </div>  


          <div class="col-md-3" ></div> 
     

          </div>



        </div><br><br><br><br><br><br><br><br><br>
  
      </div>

    <?php  }  ?>

  <?php include '../layout/footer.php';  ?>
