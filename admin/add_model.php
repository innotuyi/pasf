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
      


      $sql = $con->prepare("SELECT * FROM tbl_model WHERE tbl_modelName = ? " );
      $sql->bindParam(1, $Cname);

      $sql->execute();
      if($sql->rowCount() > 0){

        echo '<script> alert("'.$Cname.' is already exist ")</script>';
        echo '<script>window.location= "./model.php"</script>'; 
        exit();

      }else {

        $date = date('Y-m-d');
        $status = 1;
        
        $sql = $con->prepare("INSERT INTO tbl_model (tbl_modelName, tbl_modelStatus) VALUES (?,?)" );

        $sql->bindParam(1, $Cname);
        $sql->bindParam(2, $status);

        if($sql->execute()){


          echo '<script> alert("Model has been saved")</script>';
          echo '<script>window.location= "./model.php"</script>'; 

          exit();

        }

        else{ 
          echo '<script> alert("Process failed")</script>';
          echo '<script>window.location= "./model.php"</script>'; 

          exit();
        }

    
      } 


    } ?>