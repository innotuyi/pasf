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
    $prodModel = modelData($info->tbl_modelId); 

    //////////////////////////////////////////////////////////////////////////////////////

    if (isset($_POST['Eprod'])  ) {

      $EpName = ($_POST['EpName']);
      $EpPrice = ($_POST['EpPrice']);

      $EpCateg = (($_POST['EpCateg']));
      $EpMore = (($_POST['EpMore']));

      $EpModel = (($_POST['EpModel']));

      @$target_dir = "../img/";

      $file = basename($_FILES["EpPhoto"]["name"]);
      @$target_file = $target_dir . basename($_FILES["EpPhoto"]["name"]);
      @$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

      if(empty($file)){

        $file = ($info->tbl_productPicture);
      }

      

      else if (!preg_match("/^[a-zA-Z ]*$/",$EpName)) {

        echo '<script> alert("Name is invalid ")</script>';
        echo '<script>window.location= "edit_furniture.php?p='.$info->tbl_productId.'"</script>'; 
        exit();
      }


      $sql = $con->prepare("UPDATE tbl_product SET tbl_categoryId =?, tbl_productName =?, tbl_productPrice =?, tbl_productPicture =?, tbl_productQty =?, tbl_modelId =? WHERE tbl_productId =? " );

      $sql->bindParam(1, $EpCateg);
      $sql->bindParam(2, $EpName);

      $sql->bindParam(3, $EpPrice);
      $sql->bindParam(4, $file);

      $sql->bindParam(5, $EpMore);
      $sql->bindParam(6, $EpModel);

      $sql->bindParam(7, $info->tbl_productId);

      if($sql->execute()){

        //move file to the server
        move_uploaded_file($_FILES["EpPhoto"]["tmp_name"], $target_file);

        echo '<script> alert("Furniture been updated")</script>';
        echo '<script>window.location= "furniture.php"</script>'; 

        exit();

      }

      else{ 
        echo '<script> alert("Process failed")</script>';
        echo '<script>window.location= "furniture.php"</script>'; 

        exit();
      }

    
    }  ?>

    <div class="container" id="contentContainer-fluid">
  
      <div class="row prod" id="content-data" >

        <div class="col-md-2 left-data-link" > 
          <?php  include '../layout/navigation.php';  ?>
        </div>

        <div class="col-md-10">

          <div class="col-md-6 view-content">

            <h4 class="header-data text-center text-white" style="color: white;">
              Edit furniture: 

              <?php  echo ucwords($info->tbl_productName);  ?> 
            </h4>

              <form  method="POST" action="edit_furniture.php?p=<?php  echo urlencode($info->tbl_productId);  ?>"  enctype="multipart/form-data">

                <div class="form-group col-md-6">
                  <label>Furniture's Name </label>
                  <input required="" class="form-control input" name="EpName" value="<?php  echo ($info->tbl_productName);  ?>" >
                </div>

                <div class="form-group col-md-6">
                  <label>Price </label>
                  <input required="" type="number" class="form-control input" name="EpPrice" value="<?php  echo ($info->tbl_productPrice);  ?>" >
                </div>

                <div class="form-group col-md-6">
                  <label>Photo </label>
                  <input   type="file" class="form-control input" name="EpPhoto"  >
                </div>

                <div class="form-group col-md-6">
                  <label>Category</label>
                  <select   class="form-control input" name="EpCateg" >

                    <option value="<?php  echo ($categ->tbl_categoryId);  ?>">
                      <?php  echo ($categ->tbl_categoryName);  ?>
                    </option>

                    <?php 
 
                      $categdATA = prodCateg(1);
                      foreach ($categdATA as $categdATASet) {   ?>

                        <option value="<?php  echo ($categdATASet->tbl_categoryId);  ?>">
                          <?php  echo ($categdATASet->tbl_categoryName);  ?>
                        </option>
                    <?php  }   ?>
                    
                  </select>
                </div>


                <div class="form-group col-md-6">
                  <label>Model</label>
                  <select   class="form-control input" name="EpModel" >

                    <option value="<?php  echo ($prodModel->tbl_modelId);  ?>">
                      <?php  echo ($prodModel->tbl_modelName);  ?>
                    </option>

                    <?php 
 
                      $modeldATA = prodModel(1);
                      foreach ($modeldATA as $model) {   ?>

                        <option value="<?php  echo ($model->tbl_modelId);  ?>">
                          <?php  echo ($model->tbl_modelName);  ?>
                        </option>
                    <?php  }   ?>
                    
                  </select>
                </div>


                <div class="form-group col-md-6">
                  <label>Quantity </label>
                  <input  type="number" class="form-control input"  name="EpMore" value="<?php  echo ($info->tbl_productQty);  ?>" >
                </div>


                <div class="form-group button col-md-12">

                  <button type="submit" name="Eprod" class="btn btn-primary btn-do pull-left">
                    <i class="fa fa-edit"></i>
                    Update
                  </button>

                  <a  href="./furniture.php" class="btn btn-danger pull-right">
                    <i class="fa fa-remove"></i>
                    Cancel
                  </a>     

                </div>

              </form>

            
            </div>  


          <div class="col-md-3" ></div> 
     

          </div>



        </div><br><br><br><br><br><br><br><br><br>
  
      </div>

    <?php  }  ?>

  <?php include '../layout/footer.php';  ?>
