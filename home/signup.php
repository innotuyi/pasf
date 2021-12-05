<?php session_start();
  include '../connect/connect.php'; 
  include '../function/function.php'; 

  include './head.php';  
?>
        <div class="container">
            <div class="div-form">
              <div class="row">

                    <div class="col-sm-2 "></div>
                   

                    <div  class="col-md-8">
                    <div class="jumbotron">
                      <form enctype="multipart/form-data" class="row form"> 

                        <h4 class="text-center">Sign Up</h4>

                          <center>
                            <p  class="error"  > </p>
                          </center><br/>

        
                          <div class="form-group col-md-6">
                            <label>First Name</label>
                            <input class="form-control" id="fname" type="text">
                          </div>

                          <div class="form-group col-md-6">
                            <label >Last Name</label>
                            <input class="form-control" id="lname" type="text">
                          </div>

                          <div class="form-group col-md-6">
                            <label >Phone Number</label>
                            <input class="form-control" maxlength="12" id="phone" type="number" oninput="checkMe();">
                          </div>

                          <div class="form-group col-md-6">
                            <label >E-mail</label>
                            <input type="email" class="form-control" id="email" >
                          </div>


                          <div class="form-group col-md-6">
                            <label >Address</label>
                            <input class="form-control" id="address" type="text">
                          </div>


                          <div class="form-group col-md-6">
                            <label  class="pull-left">
                              Username: 
                            </label>
                            <input class="form-control" id="username" type="text">
                          </div>

                          <div class="form-group col-md-6">
                            <label  class="pull-left">
                              Password: 
                            </label>
                            <input class="form-control" id="password" type="password">
                          </div><br><br>

                          

                            <a href="#" id="add" class="btn  btn-success form-control pull-right btn-action">Register</a>
                         
                      </form>
                      </div>     
                    </div>

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