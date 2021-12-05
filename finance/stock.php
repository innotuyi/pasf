<?php session_start();  
  
  include '../connect/connect.php';  
  require_once '../function/function.php'; 

  if(!isset($_SESSION['adId']) && !isset($_SESSION['financeId'])  && !isset($_SESSION['hodId']) ){ 

    echo '<script>window.location="../home/index.php"</script>';
    exit();
  }


  //include './add_cart.php'; 
  include '../layout/header.php';    ?>

  <div class="container" id="contentContainer-fluid">

    <div class="row prod" id="content-data">

      <div class="col-md-2 left-data-link" > 
        <?php  include '../layout/navigation.php';  ?>
      </div>

      <div class="col-md-10">

        <div class="col-md-12">
          <a href="#" data-toggle="modal" data-target="#stockModal" class="btn btn-primary pull-left">
            <i class="fa fa-plus"></i>
            Add product to stock
          </a>
        </div>


        <h4 class="text-center head-content">Stock</h4>

        <div class="table-responsive">
          <table class="table table-bordered table-hover">

            <tr>
              <th>N<sup><sup><u>O</u></sup></sup></th>
              <th>Photo</th>

              <th>Product Name</th>
              <th>Cost of production</th>

              <th>Quantity</th>
              <th>Total</th>

              <th>Status</th>
              <th>Action</th>

            </tr>

            <?php 

              $count = 0;
              $stockdATA = stock();

              foreach ($stockdATA as $stockdATASet ) {  

                $count = $count + 1; 
                $prod = prodData($stockdATASet->tbl_productId); ?>

                <tr>

                  <td>
                    <a href="#"> 
                      <?php  echo $count;  ?>
                    </a>
                  </td>
                  <td>
                    <img src="../img/<?php echo ($prod->tbl_productPhoto);   ?>" style="height: 60px; width: 60px;">  </td>

                  <td><?php echo ($prod->tbl_productName);   ?> </td>
                  <td><?php  echo ($stockdATASet->tbl_stockCost);  ?></td>

                  <td> <?php echo ($stockdATASet->tbl_stockQty);   ?></td>
                  <td><?php  echo number_format($stockdATASet->tbl_stockCost *  $stockdATASet->tbl_stockQty);  ?></td>

                  <td>
                    <?php  if($stockdATASet->tbl_stockStatus == 0)  {   ?>
                      <b class="text-danger">
                        Removed
                      </b>

                    <?php  }  else {  ?>

                      <b class="text-primary">
                        Active
                      </b>
                    <?php  }  ?>
                    
                  </td>

                  <td class="text-center">
                    <a href="edit_transaction.php?st=<?php  echo urlencode($stockdATASet->tbl_stockId);  ?>" class="btn btn-primary">
                      <i class="fa fa-edit"></i>
                      Update 
                    </a>
                  </td>
                </tr>

              <?php }  ?> 

          </table>

        </div>    

      </div>


    </div><br><br><br><br><br><br><br><br><br>
  
  </div>

  <?php include '../layout/footer.php';  ?>
