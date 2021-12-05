<?php session_start();
  include '../connect/connect.php'; 

  include '../function/function.php';
  include './add_cart.php'; 

  include './head.php';       

  if ($_GET['o']) {

    $info = orderData($_GET['o']);   

    if(!isset($info)){

      exit('<h1 class="text-danger"> Wrong Operation</h1>');
    

    }    

    $product = prodData($info->tbl_productId);  

    //////////////////////////////////////////////////////////////////////////////////////

    if (isset($_POST['pay'])  ) {

      $method = ($_POST['method']);
      $status = 0; 

      $order = $info->tbl_orderId;
      @$target_dir = "../img/";

      $file = basename($_FILES["slip"]["name"]);
      @$target_file = $target_dir . basename($_FILES["slip"]["name"]);

      @$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
      $curentStatus = 1;

      if( (strtolower($imageFileType) != 'jpg') && (strtolower($imageFileType) != 'png')   ){

        echo '<script> alert("Use JPG or PNG is invalid ")</script>';
        echo '<script>window.location= "pay.php?o='.urlencode($order).'"></script>'; 
        exit();        

      }
      

      $sql = $con->prepare("SELECT * FROM tbl_paid_order WHERE (tbl_orderId = ?) AND (tbl_paid_orderStatus = ?) " );
      $sql->bindParam(1, $order);
      $sql->bindParam(2, $curentStatus);

      $sql->execute();
      if($sql->rowCount() > 0){

        echo '<script> alert("Order is already paid ")</script>';
        echo '<script>window.location= "pay.php?o='.urlencode($order).'"</script>'; 
        exit();

      }else {

        $date = date('Y-m-d');
        $sql = $con->prepare("INSERT INTO tbl_paid_order (tbl_paymentId, tbl_orderId, tbl_paid_orderSlip, tbl_paid_orderStatus, tbl_paid_orderDate) VALUES (?,?, ?,?, ?)" );

        $sql->bindParam(1, $method);
        $sql->bindParam(2, $order);

        $sql->bindParam(3, $file);
        $sql->bindParam(4, $status);

        $sql->bindParam(5, date("Y-m-d"));

        if($sql->execute()){

          //move file to the server
          move_uploaded_file($_FILES["slip"]["tmp_name"], $target_file);

          echo '<script> alert("Payment Made, wait for confirmation")</script>';
          echo '<script>window.location= "order.php"</script>'; 

          exit();

        }

        else{ 
          echo '<script> alert("Process failed")</script>';
          echo '<script>window.location= "order.php"</script>'; 

          exit();
        }

    
      } 


    }   ?>
  
    <div class="container">
      <div id="section-1">
        <div class="row">

          <div class="col-md-12" id="content" >

            <h4 class="header-data text-center" >
              Add your payment slip of 

              <b>
                <?php  echo ucwords($product->tbl_productName);  ?>
              </b>
            </h4>

            <form class="row"   method="POST" action="pay.php?o=<?php  echo urlencode($info->tbl_orderId);  ?>"  enctype="multipart/form-data" >
              
              <div class="form-group col-md-6">
                <label>Payment Method</label>
                <select  class="form-control input" name="method" >
                  <?php 
 
                    $paymentdATA = paymentMethod(1);
                    foreach ($paymentdATA as $paymentdATASet) {   ?>

                      <option value="<?php  echo $paymentdATASet->tbl_paymentId; ?>">
                        <?php  echo $paymentdATASet->tbl_paymentMethod; ?> 
                      </option>

                  <?php  }   ?>
                    
                </select>
              </div>

              <div class="form-group col-md-6">
                <label>Payment Slip</label>
                <input type="file"  class="form-control input" name="slip" required="" >
              </div>


              <div class="form-group button">
                <button type="submit" name="pay" class="btn btn-success btn-do">
                  Save And Confirm
                </button>                
              </div>

              <br><br><br>

            </form>


          </div>




                
        </div>
        
      </div>
        




        <div id="section-3">
            <div class="row" >

              <h4 class="text-center">Reach us</h3>
              <div class="col-md-4">
                <i class="fa fa-map-marker fa-3x text-center p-5"></i>
               
               
                
                <h4> k3878 Fallen Point
                </h4>
              
            </div>
            <div class="col-md-4 p-2">
                <i class="fa fa-phone-square fa-3x  p-5"></i>
                
                 <h4>0785530781</h4>
                
            </div>
            <div class="col-md-4">
                <i class="fa fa-envelope fa-3x text-center  p-5"></i>
                
                <h4>iprcfurn@gmail.com</h4>

                
            </div>
            

            </div>
            
        </div>





        <?php include './footer.php';  ?>


      <?php } ?>

        
