<?php session_start();  
  
  include '../connect/connect.php';  
  require_once '../function/function.php';  

  if(!isset($_SESSION['adId']) && !isset($_SESSION['financeId'])  && !isset($_SESSION['hodId']) ){ 

    echo '<script>window.location="../home/index.php"</script>';
    exit();
  }

  include '../layout/header.php';    


  if ($_GET['p']) {

    $prodCateg = category($_GET['p']);   

    if(!isset($prodCateg)){

      exit('<h1 class="text-danger"> Wrong operation</h1>');
    

    }    

    //////////////////////////////////////////////////////////////////////////////////////

    if (isset($_POST['Eprod'])  ) {

      $EpName = ($_POST['EpName']);
      @$target_dir = "../img/";

      $file = basename($_FILES["EpPhoto"]["name"]);
      @$target_file = $target_dir . basename($_FILES["EpPhoto"]["name"]);
      @$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


      $sql = $con->prepare("UPDATE tbl_category SET tbl_categoryName =?, tbl_categoryPhoto =?   WHERE tbl_categoryId =? " );

      $sql->bindParam(1, $EpName);
      $sql->bindParam(2, $file);

      $sql->bindParam(3, $prodCateg->tbl_categoryId);

      if($sql->execute()){

        //move file to the server
        move_uploaded_file($_FILES["EpPhoto"]["tmp_name"], $target_file);


        echo '<script> alert("Category been updated")</script>';
        echo '<script>window.location= "category.php"</script>'; 

        exit();

      }

      else{ 
        echo '<script> alert("Process failed")</script>';
        echo '<script>window.location= "category.php"</script>'; 

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
              Edit Category: 

              <?php  echo ucwords($prodCateg->tbl_categoryName);  ?> 
            </h4>

              <form  method="POST" action="edit_category.php?p=<?php  echo urlencode($prodCateg->tbl_categoryId);  ?>"  enctype="multipart/form-data">

                <div class="form-group col-md-12">
                  <label>Name </label>
                  <input required="" class="form-control input" name="EpName" value="<?php  echo ($prodCateg->tbl_categoryName);  ?>" >
                </div>


                <div class="form-group col-md-12">
                  <label>Photo </label>
                  <input required="" type="file" class="form-control input" name="EpPhoto" required="" >
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
