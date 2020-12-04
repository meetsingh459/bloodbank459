<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="css/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
</head>
<body>
    

    <header class="container-fluid header">
      <div class="row ">
        <center><h1><strong>Welcome to the Blood Bank</strong></h1></center>
      </div>
    </header>

    <!-- REGISTRATION FORM MODEL FOR RECIEVER -->
    <div id="reciever_reg" class="modal fade" role="dialog">
    
        <div class="modal-dialog modal-lg" role="content">
          <!-- Modal content-->
          <div class="modal-content">
            
            <div class="modal-header">
              <h3 class="modal-title">Blood Receiver Registration</h3>
              <button type="butto" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <div class="modal-body">
              
              <form action="receiver_reg.php" method="post" class="form">

                <div class="form-group row">
                  <label for="name" class="col-md-3 col-form-label">Name</label>
                  <div class="col-md-6">
                    <input type="text" name="name" id="name" placeholder="Name" class="form-control" required >
                  </div>
                </div>

                <div class="form-group row">
                  <label for="username" class="offset-md-3 col-md-3 col-form-label">Username</label>
                  <div class="col-md-6">
                    <input type="text" name="username" id="username" placeholder="Username" class="form-control" required >
                  </div>
                </div>
                
                <div class="form-group row">
                  <label for="password" class="col-md-3 col-form-label">Password</label>
                  <div class="col-md-6">
                    <input type="password" name="password" id="password" placeholder="Password" class="form-control" required >
                  </div>
                </div>

                <div class="form-group row">
                  <label for="conform_password" class="col-md-3 col-form-label">Confirm Password</label>
                  <div class="col-md-6">
                    <input type="password" name="conform_password" id="conform_password" placeholder="Conform Password" class="form-control" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="dob" class="col-md-3 col-form-label">Date of Birth</label>
                  <div class="col-md-6">
                    <input type="date" name="dob" id="dob"  class="form-control" required >
                  </div>
                </div>

                <div class="form-group row">
                  <label for="tel" class="col-md-3 col-form-label">Phone No.</label>
                  <div class="col-md-6">
                    <input type="tel" id="phone" name="phone" placeholder="Tel. Number"   id="tel"  class="form-control" required >
                  </div>
                </div>


                <div class="form-group row">
                  <label for="gender" class="col-md-3 col-form-label">Gender</label>
                  <div class="col-md-4">
                      <label class="radio-inline">
                        <input type="radio" name="gender" value="Male" required> Male
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="gender" value="female"> Female
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="gender" value="other"> Other
                      </label>
                  </div>
                    
                </div>

                  <div class="form-group row">
                    <label for="group" class="col-md-3 col-form-label" >Blood Group</label>
                    <div class="col-md-6">
                      <select class="form-control" name="group" id="group" required>
                        <option>A+</option>
                        <option>A-</option>
                        <option>B+</option>
                        <option>B-</option>
                        <option>O+</option>
                        <option>O-</option>
                        <option>AB+</option>
                        <option>AB-</option>
                      </select>
                    </div>
                  </div>
                
                <div class="form-group row ">
                  <div class="offset-md-3 col-md-9" >
                    <button type="submit" class="btn btn-primary" >Register</button>
  
                  </div>
                </div>

            </form> 
            </div>
          </div>
        </div>
    </div>

    <!-- REGISTRATION FORM MODEL FOR HOSPITAL -->
    <div id="hospital_reg" class="modal fade" role="dialog">
    
        <div class="modal-dialog modal-lg" role="content">
          <!-- Modal content-->
          <div class="modal-content">
            
            <div class="modal-header">
              <h3 class="modal-title">Hospital Registration </h3>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <div class="modal-body">
              
              <form action="hospital_reg.php" method="post" class="form">

                <div class="form-group row">
                  <label for="hosp_name" class="col-md-3 col-form-label">Hospital Name</label>
                  <div class="col-md-6">
                    <input type="text" name="hosp_name" id="hosp_name" placeholder="Hospital Name" class="form-control" required >
                  </div>
                </div>

                <div class="form-group row">
                  <label for="username" class="offset-md-3 col-md-3 col-form-label">Username</label>
                  <div class="col-md-6">
                    <input type="text" name="username" id="username" placeholder="Username" class="form-control" required >
                  </div>
                </div>
                
                <div class="form-group row">
                  <label for="password" class="col-md-3 col-form-label">Password</label>
                  <div class="col-md-6">
                    <input type="password" name="password" id="password" placeholder="Password" class="form-control" required >
                  </div>
                </div>

                <div class="form-group row">
                  <label for="conform_password" class="col-md-3 col-form-label">Confirm Password</label>
                  <div class="col-md-6">
                    <input type="password" name="conform_password" id="conform_password" placeholder="Conform Password" class="form-control" required >
                  </div>
                </div>

                <div class="form-group row">
                  <label for="tel" class="col-md-3 col-form-label">Phone No.</label>
                  <div class="col-md-6">
                    <input type="tel" id="phone" name="phone" placeholder="Tel. Number"   id="tel"  class="form-control" required >
                  </div>
                </div>

                <div class="form-group row">
                  <label for="address" class="col-md-3 col-form-label">Address</label>
                  <div class="col-md-6">
                      <input type="text" name="address" id="address" placeholder="Address" class="form-control" required>
                  </div>
                    
                </div>
                
                <div class="form-group row ">
                  <div class="offset-md-3 col-md-9" >
                    <button type="submit" class="btn btn-primary" >Register</button>
                  </div>
                </div>

              </form> 
            </div>
          
          </div>
        </div>
    </div>


    <main>
      
      <div class="container">
        
        <div class="row row-heading">
          <center><p class="h1" style=""><strong>Registration</strong></p></center>
        </div>
      
        <div class="row row-content">
          <div class="row-heading"><center><button class="btn btn-primary" id= "hospital" style="font-size: 20px" >Register as a Hospital</button></center></div>
          <div class="row-heading"><center><button class="btn btn-primary" id = "reciever" style="font-size: 20px">Register as a Receiver</button></center></div>
          <div class="row-heading"><center><a href="index.php" class="btn btn-primary" role="button" style="font-size: 20px">Login</a></center></div>
        </div>

        <div class="row row-heading">
          <div class=" col-12"> 
            <center><p><strong>Click here to see all blood samples</strong></p></center>
            <center><a href="blood_sample.php" class="btn btn-success" role="button" >View Blood Sample</a></center>
          </div>
        </div>

      </div>
    </main>

  


    <footer class="container-fluid footer">
      
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
          
          $("#hospital").click(function(){
            $("#hospital_reg").modal('toggle');
          });

          $("#reciever").click(function(){
            $("#reciever_reg").modal('toggle');
          });
        
        });
    </script>
</body>
</html>