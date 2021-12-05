<?php  session_start();

  include '../connect/connect.php'; 
  include '../function/function.php'; 

  include './head.php';  
?>
        <div class="container">
            <div class="div-form">
              <div class="row">

                    <div class="col-sm-4 "></div>

                    <div  class="col-md-4">
                    <div class="card">
  <div class="card-header">
Login Here
  </div>
  <div class="card-body">
  <form enctype="multipart/form-data" class="row form"> 

  <h4 class="text-center"><i class="fas fa-users fa-2x"></i></h4>

  <center>
    <p  class="error"  > </p>
  </center><br/>

  <div class="form-group col-md-12">
    <label>
     <i class="fas fa-key"></i>
      Log As</label>
    <select class="form-control" id="type">
      <option value="finance">Finance</option>

      <option value="hod">Hod</option>
      <option value="admin">Admin</option>

      <option value="customer">Customer</option>
    </select>
  </div>

  <div class="form-group col-md-12">
    <label>
     <i class="fas fa-key"></i>
      Username</label>
    <input class="form-control" id="user" type="text">
  </div>
  <div class="form-group col-md-12">
    <label >
    <i class="fas fa-key"></i>
      Password
    </label>
    <input class="form-control" id="pass" type="password">
    </select>
  </div>
  <div class="form col-md-12">
  <div class="btn1">
  <a href="#" id="check" class="btn btn-warning  pull-left btn-action" style="color:white">
      Sign In
    </a></div>
   

    <a href="signup.php" class="btn btn-warning pull-right btn-action">
      Create New
    </a>

  </div>                 
</form>
  </div>
</div>
                   
                    
                      <!-- <div class="jumbotron">
                     
                        
                      </div>

                   

                      
                    </div> -->

                    <div class="col-sm-4 "></div>


                
            </div>
        </div>

        <div id="section-3 mt-3">
            <div class="row" >

              <h2 class="text-center text-danger pt-4">Get in  Touch</h2>
              <div class="col-md-4">
                <i class="fas fa-user fa-3x text-center p-5"></i>
               
               
                
                <h4> k3878 Fallen Point
                </h4>
              
            </div>
            <div class="col-md-4 p-2">
                <i class="fas fa-phone-square fa-3x  p-5"></i>
                
                 <h4>0785530781</h4>
                
            </div>
            <div class="col-md-4">
                <i class="fas fa-envelope fa-3x text-center  p-5"></i>
                
                <h4>iprcfurn@gmail.com</h4>

                
            </div>
            

            </div>
            
        </div>


        <?php include './footer.php';  ?>