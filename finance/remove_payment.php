<?php session_start();  
  
  include '../connect/connect.php';  
  require_once '../function/function.php';

  if(!isset($_SESSION['adId']) && !isset($_SESSION['financeId'])  && !isset($_SESSION['hodId']) ){ 

    echo '<script>window.location="../home/index.php"</script>';
    exit();
  }


  /////////////////////////////////////////////////////////////////////////////////////

  if (isset($_GET['py']) ) {

    $payId = ($_GET['py']);
    $status = 0;

    $sql = $con->prepare("UPDATE tbl_paid_order SET tbl_paid_orderStatus  =? WHERE tbl_paid_orderId =? " );

    $sql->bindParam(1, $status);
    $sql->bindParam(2, $payId);

    if($sql->execute()){

      echo '<script> alert("Payment has been removed")</script>';
      echo '<script>window.location= "paid.php"</script>'; 
      exit();

    }

    else{
        
      echo '<script> alert("Something went wrong")</script>';
      echo '<script>window.location= "paid.php"</script>'; 
      exit();
    }

    
  }

     
