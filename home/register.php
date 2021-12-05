<?php session_start();  
  
  include '../connect/connect.php';  
  require_once '../function/function.php';

  if (isset($_POST['fname'])  && isset($_POST['username'])   && isset($_POST['password']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['address'])  ) {

    $fname = ($_POST['fname']);
    $lname = ($_POST['lname']);

    $username =  ($_POST['username']);
    $password = md5(($_POST['password']));

    $phone = ($_POST['phone']);
    $email = ($_POST['email']);

    $address =  ($_POST['address']);

    if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
      exit('finvalid');
    }
  

    else if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
      exit('linvalid');
    }


    $sql = $con->prepare("SELECT * FROM tbl_customer WHERE tbl_customerUserName = ? " );
    $sql->bindParam(1, $username);
    $sql->execute();
  
    if($sql->rowCount() > 0){

      exit('exist');

    }else{

      $status = 1;
      $sql = $con->prepare("INSERT INTO tbl_customer (tbl_customerFname, tbl_customerLname, tbl_customerEmail, tbl_customerTel, tbl_customerAddress, tbl_customerUserName, tbl_customerPass, tbl_customerStatus) VALUES (?,?,?, ?,?,?, ?,?)" );

      $sql->bindParam(1, $fname);
      $sql->bindParam(2, $lname);

      $sql->bindParam(3, $email);
      $sql->bindParam(4, $phone);

      $sql->bindParam(5, $address );
      $sql->bindParam(6, $username);

      $sql->bindParam(7, $password);
      $sql->bindParam(8, $status);

      if($sql->execute()){

        exit('ok');

      }

      else{
        
        exit('Process failed');
       }



    }

    
  }



  ////////////////////////////////////////////////////////////////////////////////////////////////

  if (isset($_POST['user']) && isset($_POST['pass'])  && isset($_POST['type'])  ){

      @$username = ($_POST['user']);
      @$pass = md5( ($_POST['pass'])); 

      @$type = ( ($_POST['type'])); 

      if(strtolower($type) == "customer"){


      $stmt = $con->prepare("SELECT * FROM tbl_customer WHERE tbl_customerUserName = ? ");
      $stmt->bindParam(1, $username);

      $stmt->execute();
        
        if ($stmt->rowCount() > 0) {  

          
          if($results = $stmt->fetch(PDO::FETCH_OBJ)){

            if( ($pass ===  $results->tbl_customerPass)){

                $_SESSION['guestId'] = $results->tbl_customerId;
                $_SESSION['guestName'] = $results->tbl_customerUserName;
            
                exit('guest');
            
            }else{
              exit("wrong");
            }
          }
      
        }else{

          exit("wrong");
        }

      
      }else if(strtolower($type) == "admin"){


          //admin

          $sql = $con->prepare("SELECT * FROM tbl_admin WHERE tbl_adminUserName = ? ");
          $sql->bindParam(1, $username);

          $sql->execute();
        
          if ($sql->rowCount() > 0) {  

          
          if($results = $sql->fetch(PDO::FETCH_OBJ)){

            if( ($pass ===  $results->tbl_adminPass)){

                $_SESSION['adId'] = $results->tbl_adminId;
                $_SESSION['adUser'] = $results->tbl_adminUserName;
            
                exit('admin');
            
            }else{
              exit("wrong");
            }
          }
      
        }else{

          exit("wrong");
        }



      } else if(strtolower($type) == "hod"){


          //hod

          $sql = $con->prepare("SELECT * FROM tbl_hod WHERE tbl_hodUserName = ? ");
          $sql->bindParam(1, $username);

          $sql->execute();
        
          if ($sql->rowCount() > 0) {  

          
          if($results = $sql->fetch(PDO::FETCH_OBJ)){

            if( ($pass ===  $results->tbl_hodPass)){

                $_SESSION['hodId'] = $results->tbl_hodId;
                $_SESSION['hodUser'] = $results->tbl_hodUserName;
            
                exit('hod');
            
            }else{
              exit("wrong");
            }
          }
      
        }else{

          exit("wrong");
        }




      } else if(strtolower($type) == "finance"){


          //hod

          $sql = $con->prepare("SELECT * FROM tbl_finance WHERE tbl_financeUserName = ? ");
          $sql->bindParam(1, $username);

          $sql->execute();
        
          if ($sql->rowCount() > 0) {  

          
          if($results = $sql->fetch(PDO::FETCH_OBJ)){

            if( ($pass ===  $results->tbl_financePass)){

                $_SESSION['financeId'] = $results->tbl_financeId;
                $_SESSION['financeUser'] = $results->tbl_financeUserName;
            
                exit('finance');
            
            }else{
              exit("wrong");
            }
          }
      
        }else{

          exit("wrong");
        }




      }

    }
     


  //////////////////////////////////////////////////////////////////////////////////////


  if (isset($_POST['order'])  && isset($_POST['location'])  ) {

    $order = ($_POST['order']);
    $location = ($_POST['location']);

    $address1 =  ($_POST['address1']);
    $address2 = (($_POST['address2']));

    $shipLoc = shipLocationData($location);
    $status = 1;

    $arrive = 0;
    $sql = $con->prepare("INSERT INTO tbl_shipping (tbl_orderId, tbl_shipping_locId, tbl_shippingCost, tbl_shippingAddr1, tbl_shippingAddr2, tbl_shippingArrive, tbl_shippingStatus) VALUES (?,?,?, ?,?,?, ?)" );

    $sql->bindParam(1, $order);
    $sql->bindParam(2, $location);

    $sql->bindParam(3, $shipLoc->tbl_shipping_locCost);
    $sql->bindParam(4, $address1);

    $sql->bindParam(5, $address2);
    $sql->bindParam(6, $arrive);

    $sql->bindParam(7, $status);

    if($sql->execute()){

      exit('ok');

    }

    else{ 
      exit('failed');
    }

    
  }





  ///////////////////////////////////////////// order ////////////////////////////////

  if(isset($_POST['find'])){

    $result = $_POST['find'];  ?>

    <h4 class="text-center head-content">Products</h4>

    <?php

    $PdATA = findMe($result); 

    foreach ($PdATA as $PdATASet) {   ?>

      <div class="col-md-3 grid1">
        <center>
          <a href="view_product.php?p=<?php  echo urlencode($PdATASet->tbl_productId);  ?>">
            <img src="../img/<?php  echo $PdATASet->tbl_productProfile;  ?>" class="img-responsive">
          </a>
        </center>

        <h4 class="text-center">
          <a href="view_product.php?p=<?php  echo urlencode($PdATASet->tbl_productId);  ?>">
            <?php  echo $PdATASet->tbl_productName;  ?>
          </a>
        </h4>

        <h4 class="text-center">
          <a href="view_product.php?p=<?php  echo urlencode($PdATASet->tbl_productId);  ?>">
            Price:  
            <b class="text-info"> 
              $ <?php  echo $PdATASet->tbl_producCost;  ?>
            </b>
          </a>
        </h4>
      </div>

    <?php  }        




  }




  //////////////////////////////////////////////////////////////////////////////////////


  if (isset($_POST['message'])   ) {

    $message = ($_POST['message']);
    $sender = userData($_SESSION['guestId']);


    @$emailFrom = ($sender->tbl_userEmail);
    @$subj = 'Request from user';

    @$mailTo = 'manirahofulgence25@gmail.com';

    @$headers = "From: ".$emailFrom;
    @$txt = "You have received an e-mail from ".$emailFrom."\n\n".$message;

    if(mail($mailTo, $subj, $txt , $headers)){

      exit('ok');

    }

    else{ 
      exit('There is something went wrong');
    }

    
  }




  if (isset($_POST['cpass'])   && isset($_POST['newpass'])  ) {

    $cpass = md5($_POST['cpass']);
    $newpass = md5($_POST['newpass']);

    $sql = $con->prepare("UPDATE tbl_user SET tbl_userPass =?  WHERE tbl_userPass =? " );

    $sql->bindParam(1, $newpass);
    $sql->bindParam(2, $cpass);

    if($sql->execute()){

      exit('ok');

    }

    else{
        
      exit('wrong');
    }



    
  }







  if (isset($_POST['fname'])   && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['dob']) && isset($_POST['gender'])  && isset($_POST['u']) ) {

    $fname = ($_POST['fname']);
    $lname = ($_POST['lname']);

    $phone = ($_POST['phone']);
    $email = ($_POST['email']);

    $dob =  ($_POST['dob']);
    $gender = (($_POST['gender']));

    $u = (($_POST['u']));

    if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
      exit('finvalid');
    }
  

    else if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
      exit('linvalid');
    }

    $sql = $con->prepare("UPDATE tbl_user SET tbl_userFname =?, tbl_userLname =?,  tbl_userPhone =?, tbl_userEmail =?, tbl_userDob =?, tbl_userGender =? WHERE tbl_userId =? " );

    $sql->bindParam(1, $fname);
    $sql->bindParam(2, $lname);

    $sql->bindParam(3, $phone);
    $sql->bindParam(4, $email);

    $sql->bindParam(5, $dob);
    $sql->bindParam(6, $gender);

    $sql->bindParam(7, $u);

    if($sql->execute()){

      exit('ok');

    }

    else{
        
      exit('Process failed');
    }



    
  }

