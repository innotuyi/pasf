<?php session_start();  
  
  include '../connect/connect.php';  
  require_once '../function/function.php';  

  if(!isset($_SESSION['adId']) && !isset($_SESSION['financeId'])  && !isset($_SESSION['hodId']) ){ 

    echo '<script>window.location="../home/index.php"</script>';
    exit();
  }

    //////////////////////////////////////////////////////////////////////////////////////

    if (isset($_POST['addCtg'])  ) {

      $Cname = ($_POST['Cname']);
      @$target_dir = "../img/";

      $file = basename($_FILES["EpPhoto"]["name"]);
      @$target_file = $target_dir . basename($_FILES["EpPhoto"]["name"]);
      @$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
      

      $sql = $con->prepare("SELECT * FROM tbl_category WHERE tbl_categoryName = ? " );
      $sql->bindParam(1, $Cname);

      $sql->execute();
      if($sql->rowCount() > 0){

        echo '<script> alert("'.$Cname.' is already exist ")</script>';
        echo '<script>window.location= "./category.php"</script>'; 
        exit();

      }else {

        $date = date('Y-m-d');
        $status = 1;
        
        $sql = $con->prepare("INSERT INTO tbl_category (tbl_categoryName, tbl_categoryPhoto, tbl_categoryStatus) VALUES (?,?,?)" );

        $sql->bindParam(1, $Cname);
        $sql->bindParam(2, $file);

        $sql->bindParam(3, $status);

        if($sql->execute()){

          //move file to the server
          move_uploaded_file($_FILES["EpPhoto"]["tmp_name"], $target_file);

          echo '<script> alert("Category been saved")</script>';
          echo '<script>window.location= "./category.php"</script>'; 

          exit();

        }

        else{ 
          echo '<script> alert("Process failed")</script>';
          echo '<script>window.location= "./category.php"</script>'; 

          exit();
        }

    
      } 


    } ?>
