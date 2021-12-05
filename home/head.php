<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Platform For Advertising And Selling Furniture</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Carrois+Gothic+SC&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <style type="text/css">
    .carousel-inner img {
        width: 100%;
        height: 450px;
    }

    /* .carousel-inner {

        height: 500px;
      } */
    </style>

</head>

<body>

    <script type="text/javascript">
    function checkMe() {
        var phone = document.querySelector("#phone");
        var error = document.querySelector(".error");

        if (phone.value.length > 12 || phone.value.length < 12) {

            phone.style.border = "2px solid brown";
            error.innerHTML = "Phone is invalid";

            return false;
        } else {

            phone.style.border = "";
            error.innerHTML = "";

            return false;

        }
    }
    </script>

    <div class="container">
        <nav class="navbar  navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">AGAKINJIRO FURNITURE Solution</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item">

                        <div class="dropdown">
                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                                Categories
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item active" href="./index.php">All</a>

                                <?php $categdATA = prodCateg(1);
        foreach ($categdATA as $categdATASet) {   ?>

                                <a class="dropdown-item"
                                    href="view_category.php?ctg=<?php  echo ($categdATASet->tbl_categoryId);  ?>">
                                    <?php  echo ($categdATASet->tbl_categoryName);  ?>
                                </a>

                                <?php  }  ?>
                            </div>
                        </div>

                    </li>
                    <?php  
 
 //$categdATA = prodCateg(1);
   //foreach ($categdATA as $categdATASet) {   ?>

                    <!--<li class="nav-item">
       <a class="nav-link" href="view_category.php?ctg=<?php  echo ($categdATASet->tbl_categoryId);  ?>">
         <?php  //echo ($categdATASet->tbl_categoryName);  ?>
       </a>
     </li> -->

                    <?php  //}   ?>




                    <?php  if(isset($_SESSION['guestId']) )  {   ?>


                    <?php  if(isset($_SESSION["cart"])){    ?>

                    <li class="nav-item">
                        <a class="nav-link" href="cart.php" style="color:#fff">
                            <span class="fa fa-warning"></span>
                            Cart
                        </a>
                    </li>

                    <?php   }   ?>

                    <li class="nav-item">
                        <a class="nav-link" style="color:#fff" href="order.php">
                            Orders
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php" id="account" style="color:#fff">
                            <span class="fas fa-user"></span>
                            <?php  echo ($_SESSION['guestName']);   ?>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="../logout.php" style="color:#fff" class="log-data">
                            <i class="fas fa-lock text-danger"></i>
                            Logout
                        </a>
                    </li>



                    <?php  }   else  {   ?>
                </ul>
                <ul class="nav navbar-nav ">
                    <!--
 <li class="nav-item">
   <a class="nav-link" href="signup.php" style="color:#fff">Register</a>
 </li>
-->


                    <li class="nav-item">
                        <a class="nav-link" href="signin.php" style="color:#fff;">Login</a>
                    </li>

                    <?php   }   ?>
                </ul>

            </div>
        </nav>
    </div>

    <!-- <div class="container" style="margin-top:-1px;">
        <nav class="navbar navbar-expand-sm nav-bg" >
            <div class="logo">
                <a href="index.php" class="navbar-brand " href="#">
            
                    <img src="css/img/log3.png" alt="My logo" width="350" height="100">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
            </div>
            
            <ul class="navbar-nav mr-auto">

              <?php 
 
                $categdATA = prodCateg(1);
                  foreach ($categdATA as $categdATASet) {   ?>

                    <li class="nav-item">
                      <a class="nav-link" href="view_category.php?ctg=<?php  echo ($categdATASet->tbl_categoryId);  ?>">
                        <?php  echo ($categdATASet->tbl_categoryName);  ?>
                      </a>
                    </li>

              <?php  }   ?>



              <?php  if(isset($_SESSION['guestId']) )  {   ?>
         

                <?php  if(isset($_SESSION["cart"])){    ?>

                  <li class="nav-item">
                    <a class="nav-link" href="cart.php" >
                      <span class="fa fa-warning"></span>
                      Cart
                    </a>
                  </li>

                <?php   }   ?>

                <li class="nav-item">
                  <a class="nav-link" href="order.php" >
                    Orders
                  </a>
                </li>


                <li class="nav-item">
                  <a class="nav-link" href="../logout.php"id="account" >
                    <span class="fa fa-user"></span>
                    <?php  echo ($_SESSION['guestName']);   ?>
                  </a>
                </li>



              <?php  }   else  {   ?>


                <li class="nav-item">
                  <a class="nav-link" href="signup.php" >Register</a>
                </li>


                <li class="nav-item">
                  <a class="nav-link" href="signin.php" >Login</a>
                </li>

              <?php   }   ?>


            </ul>
            <div>
       </nav>
    </div> -->