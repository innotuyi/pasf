<?php session_start();  
  
  include '../connect/connect.php';  
  require_once '../function/function.php';  

  if(!isset($_SESSION['adId']) && !isset($_SESSION['financeId'])  && !isset($_SESSION['hodId']) ){ 

    echo '<script>window.location="../home/index.php"</script>';
    exit();
  }

  include '../layout/header.php';    


  if ($_GET['p']) {

    $info = prodData($_GET['p']);   

    if(!isset($info)){

      exit('<h1 class="text-danger"> Wrong oeration</h1>');
    

    }    

    $categ = category($info->tbl_categoryId);
    $model = modelData($info->tbl_modelId);    ?>

    <div class="container" id="contentContainer-fluid">
  
      <div class="row prod" id="content-data">

        <div class="col-md-2 left-data-link" > 
          <?php  include '../layout/navigation.php';  ?>
        </div>

        <div class="col-md-10">

          <div class="col-md-6 view-content">

            <h4 class="header-data text-center text-white" style="color: white;">
              View furniture: 

              <?php  echo ucwords($info->tbl_productName);  ?> 
            </h4>

            <div class="table-responsive">
              <table class="table table-bordered table-hover">

                <tr>
                  <td>
                    Name: 

                    <b class="text-primary">
                      <?php  echo ucwords($info->tbl_productName);  ?> 
                    </b>
                  </td>
                </tr>

                <tr>
                  <td>
                    Type:

                    <b class="text-primary"> 
                      <?php  echo ucwords($categ->tbl_categoryName);  ?> 
                    </b>
                  </td>
                </tr>

                <tr>
                  <td>
                    Available quantity: 
                    <b class="text-primary">
                      <?php  echo ucwords($info->tbl_productQty);  ?> 
                    </b>
                  </td>
                </tr>


                <tr>
                  <td>
                    Price: 
                    Rwfs <b class="text-primary">
                      <?php  echo ucwords($info->tbl_productPrice);  ?> 
                    </b>
                  </td>
                </tr>

                <tr>
                  <td>
                    Model: 
                    <b class="text-primary">
                      <?php  echo ucwords($model->tbl_modelName);  ?> 
                    </b>
                  </td>
                </tr>


                <tr>
                  <td>
                    <a href="./furniture.php" class="btn btn-danger">
                      <i class="fa fa-arrow-left"></i>
                      Back
                    </a>
                  </td>
                </tr>



              </table>
            </div>


            
            </div>  


          <div class="col-md-3" ></div> 
     

          </div>



        </div><br><br><br><br><br><br><br><br><br>
  
      </div>

    <?php  }  ?>

  <?php include '../layout/footer.php';  ?>
