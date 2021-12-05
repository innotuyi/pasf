<?php session_start();  
  
  include '../connect/connect.php';  
  require_once '../function/function.php';

  if(!isset($_SESSION['adId']) && !isset($_SESSION['financeId'])  && !isset($_SESSION['hodId']) ){ 

    echo '<script>window.location="../guest/index.php"</script>';
    exit();
  }


  /////////////////////////////////////////////////////////////////////////////////////

  if (isset($_GET['o']) ) {

    $order = ($_GET['o']);
    $status = 1;

    $sql = $con->prepare("UPDATE tbl_order SET tbl_orderStatus  =? WHERE tbl_orderId =? " );

    $sql->bindParam(1, $status);
    $sql->bindParam(2, $order);

    if($sql->execute()){

      echo '<script> alert("Order has been confirmed")</script>';
      echo '<script>window.location= "order.php"</script>'; 
      exit();

    }

    else{
        
      echo '<script> alert("Something went wrong")</script>';
      echo '<script>window.location= "order.php"</script>'; 
      exit();
    }

    
  }

     
