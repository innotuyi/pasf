<?php session_start();  
  
  include '../connect/connect.php';  
  require_once '../function/function.php';  

  if(!isset($_SESSION['adId']) && !isset($_SESSION['financeId'])  && !isset($_SESSION['hodId']) ){ 

    echo '<script>window.location="../home/index.php"</script>';
    exit();
  }

  include '../layout/header.php';    

    //////////////////////////////////////////////////////////////////////////////////////

    if (isset($_POST['Eprod'])  ) {

      $EpName = ($_POST['EpName']);
      $EpPrice = ($_POST['EpPrice']);

      $EpCateg = (($_POST['EpCateg']));
      $status = 1; 

      $EpMore = (($_POST['EpMore']));
      $qty = $EpMore;
      
      $EpModel = (($_POST['EpModel']));
      @$target_dir = "../img/";

      $file = basename($_FILES["EpPhoto"]["name"]);
      @$target_file = $target_dir . basename($_FILES["EpPhoto"]["name"]);
      @$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

      // if( (strtolower($imageFileType) != 'jpg') && (strtolower($imageFileType) != 'png')   ){

      //   echo '<script> alert("Use JPG or PNG is invalid ")</script>';
      //   echo '<script>window.location= "add_product.php"</script>'; 
      //   exit();        

      // }
      

      if (!preg_match("/^[a-zA-Z ]*$/",$EpName)) {

        echo '<script> alert("Name is invalid ")</script>';
        echo '<script>window.location= "add_product.php"</script>'; 
        exit();
      }

      $sql = $con->prepare("SELECT * FROM tbl_product WHERE tbl_productName = ? " );
      $sql->bindParam(1, $EpName);

      $sql->execute();
      if($sql->rowCount() > 0){

        echo '<script> alert("'.$EpName.' is already exist ")</script>';
        echo '<script>window.location= "add_product.php"</script>'; 
        exit();

      }else {

        $date = date('Y-m-d');
        $sql = $con->prepare("INSERT INTO tbl_product (tbl_productName, tbl_productPicture, tbl_productPrice, tbl_categoryId, tbl_modelId, tbl_productQty, tbl_productStatus ) VALUES (?,?,?, ?,?,?, ?)" );

        $sql->bindParam(1, $EpName);
        $sql->bindParam(2, $file );

        $sql->bindParam(3, $EpPrice);
        $sql->bindParam(4, $EpCateg);

        $sql->bindParam(5, $EpModel);
        $sql->bindParam(6, $qty);

        $sql->bindParam(7, $status);

        if($sql->execute()){

          //move file to the server
          move_uploaded_file($_FILES["EpPhoto"]["tmp_name"], $target_file);

          echo '<script> alert("Furniture been saved")</script>';
          echo '<script>window.location= "furniture.php"</script>'; 

          exit();

        }

        else{ 
          echo '<script> alert("Process failed")</script>';
          echo '<script>window.location= "furniture.php"</script>'; 

          exit();
        }

    
      } 


    } ?>

    <div class="container" id="contentContainer-fluid">
  
      <div class="row prod" id="content-data">

      <div class="col-md-2 left-data-link" > 
        <?php  include '../layout/navigation.php';  ?>
      </div>


        <div class="col-md-10">

          <div class="col-md-6 view-content">

            <h4 class="header-data text-center text-white" style="color: white;">
              <i class="fa fa-plus"></i>
              Add new furniture: 
            </h4>

              <form  method="POST" action="add_product.php"  enctype="multipart/form-data">

                <div class="form-group col-md-6">
                  <label>Furniture</label>
                  <input required="" class="form-control input" name="EpName"  >
                </div>

                <div class="form-group col-md-6">
                  <label>Price </label>
                  <input required="" type="number" class="form-control input" name="EpPrice" >
                </div>

                <div class="form-group col-md-6">
                  <label>Photo </label>
                  <input required="" type="file" class="form-control input" name="EpPhoto"  >
                </div>

                <div class="form-group col-md-6">
                  <label>Category</label>
                  <select   class="form-control input" name="EpCateg" >

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
                  <input type="number" value="1"  class="form-control input"  name="EpMore" > 
                </div>


                <div class="form-group button col-md-12">
                  <button type="submit" name="Eprod" class="btn btn-primary btn-do pull-left">
                    <i class="fa fa-plus"></i>
                    Register
                  </button>      

                  <a  href="./furniture.php" class="btn btn-danger pull-right">
                    <i class="fa fa-remove"></i>
                    Cancel
                  </a>  

                </div>

              </form>

            
            </div>  <br>


     

          </div>

          



        </div><br><br><br><br><br><br><br><br><br>
  
      </div>

      <?php include '../layout/footer.php';  ?>


  
