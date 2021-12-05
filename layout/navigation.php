    <!-- Sidebar -->

    <h2 class="text-center"><b>Menus</b></h2>
    <ul class="sidebar navbar-nav" id="side-link">

      <?php if(isset($_SESSION['adId'])){  ?>

      <li class="nav-item dropdown">
        <a class="nav-link" href="./index.php" >
          <i class="fa fa-folder"></i>
          <span>Admins</span>
        </a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link" href="../finance/index.php" >
          <i class="fa fa-folder"></i>
          <span>Finance</span>
        </a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link" href="../hod/index.php" >
          <i class="fa fa-folder"></i>
          <span>HOD</span>
        </a>
      </li>



      <li class="nav-item dropdown">
        <a class="nav-link" href="./customer.php" >
          <i class="fa fa-folder"></i>
          <span>Customers</span>
        </a>
      </li>



      <li class="nav-item dropdown">
        <a class="nav-link" href="furniture.php" >
          <i class="fa fa-folder"></i>
          <span>Furnitures</span>
        </a>
      </li>


      <li class="nav-item dropdown">
        <a class="nav-link" href="order.php" >
          <i class="fa fa-folder"></i>
          <span>Orders</span>
        </a>

      </li>


      <li class="nav-item dropdown">
        <a class="nav-link" href="paid.php" >
          <i class="fa fa-folder"></i>
          <span>Paid orders</span>
        </a>
      </li>

      <li class="nav-item dropdown">
        <a  class="nav-link"  href="./model.php" >
          <i class="fa fa-folder"></i>
          <span>Models</span>
        </a>
      </li>

      <li class="nav-item dropdown">
        <a  class="nav-link"  href="./category.php" >
          <i class="fa fa-list"></i>
          <span>Categories</span>
        </a>
      </li>



      <li class="nav-item dropdown">
        <a class="nav-link" href="paid-report.php" >
          <i class="fa fa-folder"></i>
          <span>Report</span>
        </a>
      </li>


    <?php } else if(isset($_SESSION['hodId'])){  ?>

      <li class="nav-item dropdown">
        <a class="nav-link" href="furniture.php" >
          <i class="fa fa-folder"></i>
          <span>Furnitures</span>
        </a>
      </li>


      <li class="nav-item dropdown">
        <a  class="nav-link"  href="./model.php" >
          <i class="fa fa-folder"></i>
          <span>Models</span>
        </a>
      </li>

      <li class="nav-item dropdown">
        <a  class="nav-link"  href="./category.php" >
          <i class="fa fa-list"></i>
          <span>Categories</span>
        </a>
      </li>


    <?php } else if(isset($_SESSION['financeId'])){  ?>

      <li class="nav-item dropdown">
        <a class="nav-link" href="paid.php" >
          <i class="fa fa-folder"></i>
          <span>Paid orders</span>
        </a>
      </li>

      <li class="nav-item dropdown">
        <a  class="nav-link"  href="./model.php" >
          <i class="fa fa-folder"></i>
          <span>Models</span>
        </a>
      </li>

      <li class="nav-item dropdown">
        <a  class="nav-link"  href="./category.php" >
          <i class="fa fa-list"></i>
          <span>Categories</span>
        </a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link" href="paid-report.php" >
          <i class="fa fa-folder"></i>
          <span>Report</span>
        </a>
      </li>



    <?php }  ?>

      
    </ul>
