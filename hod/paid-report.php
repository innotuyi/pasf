<?php session_start();  
  
  include '../connect/connect.php';  
  require_once '../function/function.php'; 

  if(!isset($_SESSION['adId']) && !isset($_SESSION['financeId'])  && !isset($_SESSION['hodId']) ){ 

    echo '<script>window.location="../home/index.php"</script>';
    exit();
  }

  //include './add_cart.php'; 
  include '../layout/header.php';    ?>

  <div class="container"  id="contentContainer-fluid">
    

    <div class="row prod" id="content-data" >

      <div class="col-md-2 left-data-link" > 
        <?php  include '../layout/navigation.php';  ?>
      </div>

      <div class="col-md-10">
        <h4 class="text-center head-content" id="title">Report of paid ordered furnitures</h4>

        <div class="form-group col-md-4">
          <label>From</label>
          <input type="date" onchange="loadPaidOrderReport();" class="form-control" id="from" value="<?php echo date("Y-m-d"); ?>" >
        </div>

        <div class="form-group col-md-4">
          <label>To</label>
          <input type="date" onchange="loadPaidOrderReport();" class="form-control" id="to" value="<?php echo date("Y-m-d"); ?>" >
        </div>

        <div class="form-group col-md-4">
          <button onclick="return print();" class="btn btn-success btn-lg pull-right">
            <i class="fa fa-print"></i>
            Print
          </button>
        </div>



        <div class="table-responsive col-md-12">
          <table class="table table-bordered table-hover" id="report">

          </table>

        </div>    

      </div>


    </div><br><br><br><br><br><br><br><br><br>
  
  </div>

  <?php include '../layout/footer.php';  ?>
  
  <script type="text/javascript">
    
    document.addEventListener("DOMContentLoaded", function() {
      loadPaidOrderReport();    
    });
    
  </script>