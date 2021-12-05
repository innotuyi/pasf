<?php 
session_start();
$conn = mysqli_connect("localhost","root","","Cart");
// ADDING DATA TO TABLE REAERVATION

// END
if (isset($_POST["add_to_cart"])) {
if (isset($_SESSION["shopping_cart"])) {

$item_array_id = array_column($_SESSION["shopping_cart"],"item_id");
if (!in_array($_GET["id"], $item_array_id))
 {
  $count = count($_SESSION["shopping_cart"]);
  $item_array = array(
    'item_id' => $_GET["id"],
    'item_name' => $_POST["hidden_name"],
    'item_price' => $_POST["hidden_price"],
    'item_quantity' => $_POST["quantity"]


  );
$_SESSION["shopping_cart"][$count] = $item_array;
}
else
{
echo '<script>alert("Item Already Added")</script>';
echo '<script>window.location="index.php"</script>';
}

}
else
{
  $item_array = array(
    'item_id' =>$_GET["id"],
    'item_name' =>$_POST["hidden_name"],
    'item_price' =>$_POST["hidden_price"],
    'item_quantity' =>$_POST["quantity"]


  );
  //Store in session shopping Cart
  $_SESSION["shopping_cart"][0] = $item_array;
}
}

// DELETE FROM CART
if (isset($_GET["action"])) {
  if ($_GET["action"] == "delete") {
    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
    if ($values["item_id"] == $_GET["id"]) {
      unset($_SESSION["shopping_cart"][$keys]);
      echo '<script>alert("Item Removed")</script>';
      echo '<script>window.location="index.php"</script>';
    }
    }
  }
}



if(isset($_GET['action'])){
  if($_GET['action'] == 'confirm'){

    //check if cart is set
    if(!isset($_SESSION['shopping_cart'])){ 

     echo '<script> alert("Please add product to cart"); </script>'; 
     echo '<script>window.location="cart.php"</script>';


    }
  
    foreach($_SESSION['shopping_cart'] as $value){
      
      $date = date("Y/m/d");
      add_new_sold_products( $value['product_id'], $_SESSION['guestId'],  $value['product_price'],  $value['item_quantity'], $date);

      echo '<script> alert("Order has been successfully sent"); </script>';

      unset($_SESSION['shopping_cart']);
      echo '<script>window.location= "order.php"</script>'; 

    }
  
  }
}




  function add_new_sold_products($prodId, $customerId, $amount, $qty, $date ){

    global $con;
    $stmt = mysqli_query($con, "INSERT INTO tbl_order ( tbl_productId, tbl_userId, tbl_orderAmount, tbl_orderQty, tbl_orderDate, tbl_orderToken, tbl_orderStatus) VALUES($prodId, $customerId, , $amount, $qty, $date, $code) ");

    if( $stmt){
      return true;
    }else{

      return  false;
    }

  }




?>