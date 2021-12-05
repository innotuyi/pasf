<?php session_start();  
  
  include '../connect/connect.php';  
  require_once '../function/function.php';  

  if(!isset($_SESSION['adId']) && !isset($_SESSION['financeId'])  && !isset($_SESSION['hodId']) ){ 

    echo '<script>window.location="../home/index.php"</script>';
    exit();
  }

  include '../layout/header.php';    


  if ($_GET['p']) {

    $prodModel = modelData($_GET['p']);   

    if(!isset($prodModel)){

      exit('<h1 class="text-danger"> Wrong operation</h1>');
    

    }    

    //////////////////////////////////////////////////////////////////////////////////////

    if (isset($_POST['Eprod'])  ) {

      $EpName = ($_POST['EpName']);

      $sql = $con->prepare("UPDATE tbl_model SET tbl_modelName =?  WHERE tbl_modelId =? " );

      $sql->bindParam(1, $EpName);
      $sql->bindParam(2, $prodModel->tbl_modelId);

      if($sql->execute()){

        echo '<script> alert("Model been updated")</script>';
        echo '<script>window.location= "model.php"</script>'; 

        exit();

      }

      else{ 
        echo '<script> alert("Process failed")</script>';
        echo '<script>window.location= "model.php"</script>'; 

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
              Edit Model: 

              <?php  echo ucwords($prodModel->tbl_modelName);  ?> 
            </h4>

              <form  method="POST" action="edit_model.php?p=<?php  echo urlencode($prodModel->tbl_modelId);  ?>"  enctype="multipart/form-data">

                <div class="form-group col-md-12">
                  <label>Name </label>
                  <input required="" class="form-control input" name="EpName" value="<?php  echo ($prodModel->tbl_modelName);  ?>" >
                </div>

                <div class="form-group button col-md-12">

                  <button type="submit" name="Eprod" class="btn btn-primary btn-do pull-left">
                    <i class="fa fa-edit"></i>
                    Update
                  </button>

                  <a  href="./model.php" class="btn btn-danger pull-right">
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
