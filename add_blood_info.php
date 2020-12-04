<?php
  include('connection.php');
  include('sessions.php');

  session_start();

  if(!isset($_SESSION['user'])){
    header('location:index.php');
  }


  $user = $_SESSION['user'];
  $query = "SELECT * FROM hospital_reg, blood_info WHERE hospital_reg.Username ='$user' AND hospital_reg.Username = blood_info.Username ";
  $result = mysqli_query($conn, $query);  

  $row = mysqli_fetch_array($result);
?>

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
      <div class="row row-head ">
        <?php  
          if( isset($_SESSION['user']) ){
            echo "<div><a href='logout.php' class='btn btn-primary pull-right' role='button' >Logout</a></div>";
          }
          else{
            echo "<div><a href='index.php' class='btn btn-primary pull-right' role='button' >Login</a></div>";
          }
        ?>
        <center><h1><strong>Welcome to the Blood Bank</strong></h1></center>
      </div>
    </header>


    <section>
      
      <div class="container">
        
        <div class="row row-heading">
          <center><p class="h2"><strong>ADD BLOOD SAMPLES</strong></p></center>
        </div>
        
        <div class="row row-content">
          
          <div class="col-12 col-md-6">  
            <div class="card">
              <div class="card-header">
                  <h2>Hospital Info</h2>
              </div>
                <div class="card-body">
                  <?php 
                    echo "<p> <strong>Hospital Name</strong> : ".$row['Hospital_Name']."</p>";
                    echo "<p> <strong>Phone No.</strong> : ".$row['Phone_No']."</p>";
                    echo "<p> <strong>Address</strong> : ".$row['Address']."</p>";
                  ?>
                </div>
            </div>
            
            <table class="table table-striped ">
                <thead >  
                  <tr>
                    <th>Blood Sample</th>
                    <th>Quantity</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>O+</td>
                    <td><?php echo $row['O_pos']; ?></td>
                  </tr>
                  
                  <tr>
                    <td>O-</td>
                    <td><?php echo $row['O_neg'];?></td>
                  </t r>

                  <tr>
                    <td>A+</td>
                    <td><?php echo $row['A_pos'];?></td>
                  </tr>

                  <tr>
                    <td>A-</td>
                    <td><?php echo $row['A_neg'];?></td>
                  </tr>

                  <tr>
                    <td>B+</td>
                    <td><?php echo $row['B_pos'];?></td>
                  </tr>

                  <tr>
                    <td>B-</td>
                    <td><?php echo $row['B_neg'];?></td>
                  </tr>

                  <tr>
                    <td>AB+</td>
                    <td><?php echo $row['AB_pos'];?></td>
                  </tr>

                  <tr>
                    <td>AB-</td>
                    <td><?php echo $row['AB_neg'];?></td>
                  </tr>

                </tbody>
              </table>
            
          </div>
          <div class="col-12 col-md-6"> 

            <div class="row row-heading">
                <center><h3><strong>Add Blood</strong></h3></center>
            </div> 

            <div class="row row-content">
              <center>
                <form action="" method="post" class="form">

                  <div class="form-group row">
                    <label for="group" class="col-md-3 col-form-label" >Blood Group</label>
                    <div class="col-md-6">
                      <select class="form-control" name="group" id="group" required>
                        <option value="A_pos" >A+ </option>
                        <option value="A_neg">A-</option>
                        <option value="B_pos">B+</option>
                        <option value="B_neg">B-</option>
                        <option value="O_pos">O+</option>
                        <option value="O_neg">O-</option>
                        <option value="AB_pos">AB+</option>
                        <option value="AB_neg">AB-</option>
                      </select>
                    </div>
                  </div>
              
              <div class="form-group row">
                <label for="quantity" class="col-md-3 col-form-label">Qyantity</label>
                <div class="col-md-6">
                  <input type="number" name="quantity" min="0" max="100000" step="1" value="0" class="form-control" required >
                </div>
              </div>
              
              <div class="form-group row ">
                <div class="offset-md-3 col-md-9" >
                  <button type="submit" name="add_blood" class="btn btn-primary" >Add Blood</button>
                </div>
              </div>

            </form> 
          </center>
            </div>
            
          </div>
        </div>

        <div class="row row-heading">
          <div class=" col-12 col-md-6 ">
            <center><p><strong>Click here to view blood samples</strong></p></center>
            <center><a href="blood_sample.php" class="btn btn-success" role="button" >View Blood Sample</a></center>
          </div>
          <div class=" col-12 col-md-6 ">
            <center><p><strong>Click here to view requests for blood samples</strong></p></center>
            <center><a href="view_request.php" class="btn btn-success" role="button" >View Blood Request</a></center>  
          </div>
        </div>

      </div>
    </section>

  


    <footer class="container-fluid footer">
      
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>

<?php
  
  if(isset($_REQUEST['add_blood'])){
    
    $group = $_POST['group'];
    $quantity = $_POST['quantity'];

    $query = "UPDATE blood_info SET $group = $group+$quantity WHERE Username = '$user' ";
    
    mysqli_query($conn, $query);  
    unset($_POST['add_blood']);
  }
?>