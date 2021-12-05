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

    $categ = category($info->tbl_product_categId); 

    //////////////////////////////////////////////////////////////////////////////////////

    if (isset($_POST['Eprod'])  ) {

      $EpMore = (($_POST['EpMore']));
      $status = 1;

      @$target_dir = "../img/";

      $file = basename($_FILES["EpPhoto"]["name"]);
      @$target_file = $target_dir . basename($_FILES["EpPhoto"]["name"]);
      @$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

      if( (strtolower($imageFileType) != 'jpg') && (strtolower($imageFileType) != 'png')   ){

        echo '<script> alert("Use JPG or PNG is invalid ")</script>';
        echo '<script>window.location= "add_picture.php?p='.$info->tbl_productId.'"</script>'; 
        exit();        

      }
      

      $sql = $con->prepare("INSERT INTO tbl_prod_img (tbl_prod_imgFile, tbl_productId, tbl_prod_imgCapt, tbl_prod_imgStatus) VALUES (?,?,?, ?)" );

      $sql->bindParam(1, $file);
      $sql->bindParam(2, $info->tbl_productId);

      $sql->bindParam(3, $EpMore);
      $sql->bindParam(4, $status);

      if($sql->execute()){

        //move file to the server
        move_uploaded_file($_FILES["EpPhoto"]["tmp_name"], $target_file);

        echo '<script> alert("Photo been uploaded")</script>';
        echo '<script>window.location= "product.php"</script>'; 

        exit();

      }

      else{ 
        echo '<script> alert("Process failed")</script>';
        echo '<script>window.location= "product.php"</script>'; 

        exit();
      }

    
    }  ?>

    <div class="container-fluid" id="contentContainer-fluid">
  
      <div class="row prod" >

        <div class="col-md-12">

          <div class="col-md-3"></div>

          <div class="col-md-6 view-content">

            <h4 class="header-data text-center text-white" style="color: white;">
              Add new photo of  

              <?php  echo ucwords($info->tbl_productName);  ?> 
            </h4>

              <form  method="POST" action="add_picture.php?p=<?php  echo urlencode($info->tbl_productId);  ?>"  enctype="multipart/form-data">

                <div class="form-group col-md-6">
                  <label>Photo </label>
                  <input required="" type="file" class="form-control input" name="EpPhoto"  >
                </div>


                <div class="form-group col-md-6">
                  <label>Caption </label>
                  <textarea  class="form-control input"  name="EpMore" >
                  </textarea> 
                </div>

                <div class="form-group button col-md-12">
                  <button type="submit" name="Eprod" class="btn btn-primary btn-do pull-left">
                    <i class="fa fa-plus"></i>
                    Post
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
