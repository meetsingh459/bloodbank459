<!DOCTYPE html>
<html lang="en"
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <link href="css/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
</head>
<body>
  	

  	<header class="container-fluid header">
      <div class="row row-head">
        <div class="mr"><a href="" class="btn btn-primary pull-right" role="button" >Login</a></div>
  		  <center><h1><strong>Welcome to the Blood Bank</strong></h1></center>
  	  </div>
    </header>


    <main>
      <div class="container">  

        <div class="row row-heading">
          <center><p class="h1" style=""><strong>Login</strong></p></center>
        </div>

        <div class="row row-content">
          
          <!-- LOGIN FORM FOR BOTH HOSPITAL AND RECEIVER USERS  -->
          <div class="col-12 col-md-9">
            <center>
            <form action="login.php" method="post" class="form">

              <div class="form-group row">
                <label for="username" class="col-md-3 col-form-label">Username</label>
                <div class="col-md-6">
                  <input type="text" name="username"  placeholder="Username" class="form-control" required >
                </div>
              </div>
              
              <div class="form-group row">
                <label for="password" class="col-md-3 col-form-label">Password</label>
                <div class="col-md-6">
                  <input type="password" name="password" placeholder="Password" class="form-control" required >
                </div>
              </div>
              
              <div class="form-group row ">
                <div class="offset-md-3 col-md-9" >
                  <button type="submit" class="btn btn-primary" >Login</button>
                  <a href="registration.php" class="btn btn-primary" role="button"  >Register</a>
                </div>
              </div>

            </form> 
          </center>
          </div>
        </div>

        <!--  BLOOD SAMPLE PAGE LINK  -->
        <div class="row">  
          <p class="text-center h4"><strong>Click here to see all blood samples</strong></p>
          <center><a href="blood_sample.php" class="btn btn-success" role="button">Click Me</a></center>
        </div>
      </div>

    </main>


    <footer class="container-fluid footer">
      
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>