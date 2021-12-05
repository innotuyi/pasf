<?php session_start();  
  
  include '../connect/connect.php';  
  require_once '../function/function.php';

  if(!isset($_SESSION['adId']) && !isset($_SESSION['financeId'])  && !isset($_SESSION['hodId']) ){ 

    echo '<script>window.location="../guest/index.php"</script>';
    exit();
  }


  /////////////////////////////////////////////////////////////////////////////////////

  if (isset($_GET['sh']) ) {

    $ship = ($_GET['sh']);
    $status = 1;

    $sql = $con->prepare("UPDATE tbl_shipping SET tbl_shippingArrive  =? WHERE tbl_shippingId =? " );

    $sql->bindParam(1, $status);
    $sql->bindParam(2, $ship);

    if($sql->execute()){

      echo '<script> alert("Order has been arrived")</script>';
      echo '<script>window.location= "shipping.php"</script>'; 
      exit();

    }

    else{
        
      echo '<script> alert("Something went wrong")</script>';
      echo '<script>window.location= "shipping.php"</script>'; 
      exit();
    }

    
  }

     
