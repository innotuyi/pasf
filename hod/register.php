<?php session_start();  
  
  include '../connect/connect.php';  
  require_once '../function/function.php';


  /////////////////////////////////////////////////////////////////////////////////////

  if (isset($_POST['userData'])  && isset($_POST['EditFname'])     && isset($_POST['EditPhone']) && isset($_POST['EditEmail'])  ) {

    $userData = ($_POST['userData']);
    $EditFname = ($_POST['EditFname']);

    $password = md5(($_POST['EditPhone']));
    $EditPhone = (($_POST['EditPhone']));

    $EditEmail = (($_POST['EditEmail']));
    $EditLoc1 = (($_POST['EditLoc1']));

    if (!preg_match("/^[a-zA-Z ]*$/",$EditFname)) {
      exit('finvalid');
    }
  

    else {


      $sql = $con->prepare("UPDATE tbl_hod SET tbl_hodName  =?, tbl_hodEmail =?,  tbl_hodTel  =?, tbl_hodAddress =?, tbl_hodPass =?  WHERE tbl_hodId =? " );

      $sql->bindParam(1, $EditFname);
      $sql->bindParam(2, $EditEmail);

      $sql->bindParam(3, $EditPhone);
      $sql->bindParam(4, $EditLoc1);

      $sql->bindParam(5, $password);
      $sql->bindParam(6, $userData);

      if($sql->execute()){

        exit('ok');

      }

      else{
        
        exit('failed');
       }

    }

    
  }




  /////////////////////////////////////////////////////////////////////////////////////

  if (isset($_POST['username'])  && isset($_POST['EditFname'])     && isset($_POST['EditPhone']) && isset($_POST['EditEmail'])  ) {

    $username = ($_POST['username']);
    $EditFname = ($_POST['EditFname']);

    $password = md5(($_POST['EditPhone']));
    $EditPhone = (($_POST['EditPhone']));

    $EditEmail = (($_POST['EditEmail']));
    $EditLoc1 = (($_POST['EditLoc1']));

    $status = 1;

    if (!preg_match("/^[a-zA-Z ]*$/",$EditFname)) {
      exit('finvalid');
    }
    
    $sql = $con->prepare("SELECT * FROM tbl_hod WHERE tbl_hodUserName = ? " );
    $sql->bindParam(1, $username);
    $sql->execute();
  
    if($sql->rowCount() > 0){

      exit('exist');

    }

    else {


      $sql = $con->prepare("INSERT INTO tbl_hod (tbl_hodName, tbl_hodEmail, tbl_hodTel, tbl_hodAddress, tbl_hodUserName, tbl_hodPass, tbl_hodStatus) VALUES (?,?,?, ?,?,?, ?) " );

      $sql->bindParam(1, $EditFname);
      $sql->bindParam(2, $EditEmail);

      $sql->bindParam(3, $EditPhone);
      $sql->bindParam(4, $EditLoc1);

      $sql->bindParam(5, $username);
      $sql->bindParam(6, $password);

      $sql->bindParam(7, $status);

      if($sql->execute()){

        exit('ok');

      }

      else{
        
        exit('failed');
       }

    }

    
  }

     




  //////////////////////////////////////////////////////////////////////////////////////

  if (isset($_POST['Eorder'])  && isset($_POST['Eprod'])  && isset($_POST['Ecustomer'])  && isset($_POST['Eqty'])   ) {

    $Eorder = ($_POST['Eorder']);
    $Eprod = ($_POST['Eprod']);

    $Ecustomer =  ($_POST['Ecustomer']);
    $Eqty = (int)(($_POST['Eqty']));

    $productInfo = prodData($Eprod);
    $orderInfo = orderData($Eorder);

    if($Eqty > $orderInfo->tbl_orderQty){

      $remove = $Eqty - $orderInfo->tbl_orderQty;

      $prodQty = $productInfo->tbl_productQty - $remove;

    }else if($Eqty < $orderInfo->tbl_orderQty) {

      $add = $orderInfo->tbl_orderQty - $Eqty;

      $prodQty = $productInfo->tbl_productQty + $add;

    }else{

      $prodQty = $productInfo->tbl_productQty;

    }


    $sql = $con->prepare("UPDATE  tbl_order SET tbl_customerId =?, tbl_productId =?, tbl_orderQty =?  WHERE tbl_orderId =? " );

    $sql->bindParam(1, $Ecustomer);
    $sql->bindParam(2, $Eprod);

    $sql->bindParam(3, $Eqty);
    $sql->bindParam(4, $Eorder);

    if($sql->execute()){

      update_product( number_format($prodQty), $productInfo->tbl_productId);

      exit('ok');

    }

    else{ 
      exit('failed');
    }

    
  }





  //////////////////////////////////////////////////////////////////////////////////////

  if (isset($_POST['Estock'])  && isset($_POST['ETprod']) && isset($_POST['ETqty'])  && isset($_POST['ETcost'])   ) {

    $Estock = ($_POST['Estock']);
    $ETprod = ($_POST['ETprod']);

    $ETqty = (($_POST['ETqty']));
    $ETcost = (($_POST['ETcost']));

    $productInfo = prodData($ETprod);
    $stockInfo = stockData($Estock);

    if($ETqty < $stockInfo->tbl_stockQty){

      $remove = $ETqty - $stockInfo->tbl_stockQty;

      $prodQty = $productInfo->tbl_productQty - $remove;

    }else if($ETqty > $stockInfo->tbl_stockQty) {

      $add = $stockInfo->tbl_stockQty - $ETqty;

      $prodQty = $productInfo->tbl_productQty + $add;

    }else{

      $prodQty = $productInfo->tbl_productQty;

    }


    $sql = $con->prepare("UPDATE  tbl_stock SET tbl_productId =?, tbl_stockQty =?, tbl_stockCost =? WHERE tbl_stockId =? " );

    $sql->bindParam(1, $ETprod);
    $sql->bindParam(2, $ETqty);

    $sql->bindParam(3, $ETcost);
    $sql->bindParam(4, $Estock);

    if($sql->execute()){

      update_product( number_format($prodQty), $productInfo->tbl_productId);
      exit('ok');

    }

    else{ 
      exit('failed');
    }

    
  }




  //////////////////////////////////////////////////////////////////////////////////////

  if ( isset($_POST['ATprod'])  && isset($_POST['ATqty'])  && isset($_POST['ATcost'])   ) {

    $ATprod = ($_POST['ATprod']);
    $ATqty = (($_POST['ATqty']));
    
    $ATcost = (($_POST['ATcost']));
    $status = 1;

    $productInfo = prodData($ATprod);
    $prodQty = $productInfo->tbl_productQty + $ATqty;

    $date = date('Y-m-d');
    $sql = $con->prepare("INSERT INTO tbl_stock (tbl_productId, tbl_stockQty, tbl_stockCost, tbl_stockDate, tbl_stockStatus) VALUES (?,?,?, ?,?)" );

    $sql->bindParam(1, $ATprod);
    $sql->bindParam(2, $ATqty);

    $sql->bindParam(3, $ATcost);
    $sql->bindParam(4, $date);

    $sql->bindParam(5, $status);

    if($sql->execute()){

      update_product( number_format($prodQty), $productInfo->tbl_productId);
      exit('ok');

    }

    else{ 
      exit('failed');
    }

    
  }



