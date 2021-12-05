<?php session_start();  
  
  include '../connect/connect.php';  
  require_once '../function/function.php';  

  if(!isset($_SESSION['adId']) && !isset($_SESSION['financeId'])  && !isset($_SESSION['hodId']) ){ 

    echo '<script>window.location="../home/index.php"</script>';
    exit();
  }


  include '../layout/header.php';    


  if ($_GET['u']) {

    $info = HodData($_GET['u']);   

    if(!isset($info)){

      exit('<h1 class="text-danger"> Wrong operation</h1>');
    

    }     ?>

    <div class="container content"  id="contentContainer-fluid">
  
      <div class="row prod" id="content-data" >

        <div class="col-md-2 left-data-link" > 
          <?php  include '../layout/navigation.php';  ?>
        </div>

        <div class="col-md-10">

          <div class="col-md-8 view-content form-content">

            <input type="hidden" value="<?php echo $info->tbl_hodId;  ?>" id="userData">

            <h4 class="header-form text-center" >
              Edit HOD: 

              <?php  echo ucwords($info->tbl_hodName);  ?>
            </h4>


              <form method="post" action="#">

                <div class="form-group col-md-6">
                  <label>First Name</label>
                  <input id="EditFname" value="<?php  echo ($info->tbl_hodName);  ?>" class="form-control input" >
                </div>

                <div class="form-group col-md-6">
                  <label >Phone Number</label>
                  <input class="form-control input" id="EditPhone" type="number" value="<?php  echo ($info->tbl_hodTel);  ?>">
                  </select>
                </div>

                <div class="form-group col-md-6">
                  <label >E-mail</label>
                  <input class="form-control input" id="EditEmail" type="email" value="<?php  echo ($info->tbl_hodEmail);  ?>">
                </div>


                <div class="form-group col-md-6">
                  <label >Address </label>
                  <input class="form-control input" id="EditLoc1" type="text" value="<?php  echo ($info->tbl_hodAddress);  ?>">
                </div>


                <div class="form-group col-md-12">
                  <button type="button" id="editUser" class="btn btn-primary btn-do pull-left">
                    Update
                  </button>      

                  <a href="./index.php" class="btn btn-danger btn-do pull-right">
                    <i class="fa fa-remove"></i>
                    Cancel
                  </a>      

                </div>

              </form>

            
            </div>  


          <div class="col-md-3" >


          </div> 
     

          </div>


          <!--

          <div class="col-md-2 grid-Item">

            <div class="form-group">
              <input type="" placeholder="Search Product" class="form-control input"  >
            </div>
            
            
            <h5 class="text-center">Categories</h5>

            <ul>
              <?php 
 
                //$data = prodCateg();
                //foreach ($data as $dataSet) {   ?>

                  <li>
                    <a href="category.php?c=<?php //echo urlencode( ($dataSet->tbl_product_categId));  ?>">
                      <?php //echo ($dataSet->tbl_product_categName);  ?>
                    </a>
                  </li>

              <?php // }  ?>  
            </ul>   
            <br><br><br>
          </div> -->

        </div><br><br><br><br><br><br><br><br><br>
  
      </div>

    <?php  }  ?>

  <?php include '../layout/footer.php';  ?>
