<?php session_start();
  include '../connect/connect.php'; 

  include '../function/function.php'; 
  include './head.php';               ?>
<div class="container mt-0">



    <?php  if(!isset($_SESSION['guestId']))  {   ?>


    <div id="myCarousel" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../img/chair.jpg" alt="Carpentry" width="1100" height="500">

                <div class="carousel-caption">
                    <h3>Carpentry</h3>
                    <p>Buy furniture on this platform</p>
                </div>

            </div>

            <div class="carousel-item">
                <img src="../img/sofa.jpg" alt="Carpentry" width="1100" height="500">

                <div class="carousel-caption mt-5" style="color:black;margin-top:40px">
                    <h3>Carpentry</h3>
                    <p>furniture is placed to allow free movement. This makes the space
                        around furnitura</p>
                </div>

            </div>

            <div class="carousel-item">
                <img src="../img/good.png" alt="Carpentry" width="1100" height="500">
                <div class="carousel-caption" style="color:black;margin-top:40px">
                    <h3>Carpentry</h3>
                    <p>Buy furniture on this platform</p>
                </div>

            </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">

        </a>
        <a class="carousel-control-next" href="#myCarousel" data-slide="next">

        </a>
    </div>


    <?php  }  ?>


    <hr>
    <div id="section-1">
        <h2 class="text-center text-danger pt-4">Browse our Categories</h2>
        <div class="row">

            <?php  $categdATA = prodCateg(1);
                  foreach ($categdATA as $categdATASet) {   ?>

            <div class="col-md-4 col-sm-6 mt-4">
                <div class="card">
                    <h5 class="text-center p-2">Shop By Category</h5>
                    <a href="view_category.php?ctg=<?php  echo ($categdATASet->tbl_categoryId);  ?>">
                        <img class="card-img-top" src="../img/<?php  echo $categdATASet->tbl_categoryPhoto; ?>"
                            alt="Card image" width="100px" height="300" style="border-bottom:1px solid black">
                        <div class="card-body">
                            <h4 class="card-title"><?php  echo $categdATASet->tbl_categoryName; ?></h4>
                        </div>
                    </a>
                </div>
            </div>

            <?php  }  ?>


        </div>
    </div>
    <hr>
    <div id="section-3 mt-3">
        <div class="row">

            <h2 class="text-center text-danger pt-4">Get in Touch</h2>
            <div class="col-md-4">
                <i class="fas fa-user fa-3x text-center p-5"></i>



                <h4> k3878 Fallen Point
                </h4>

            </div>
            <div class="col-md-4 p-2">
                <i class="fas fa-phone-square fa-3x  p-5"></i>

                <h4>0785530789</h4>

            </div>
            <div class="col-md-4">
                <i class="fas fa-envelope fa-3x text-center  p-5"></i>

                <h4>innotuyi67@gmail.com</h4>


            </div>


        </div>

    </div>



    <?php include './footer.php';  ?>