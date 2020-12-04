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

  $query = "SELECT * FROM request_blood WHERE Accept = 0";
  $result = mysqli_query($conn, $query);  
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
      <div class="row row-head">
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
          <center><p class="h2"><strong>VIEW BLOOD REQUEST</strong></p></center>
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

            <div class="row">
                <center><h3><strong>View Request</strong></h3></center>
            </div> 

            <div class="row">
              <div class="table-responsive table-wrap" >
                <table class="table table-striped table-sm " cellspacing="0">
                  <thead >
                    <tr>
                      <th>S No.</th>
                      <th>Name</th>
                      <th>Phone No.</th>
                      <th>Blood Type</th>
                      <th>Quantity</th>
                      <th>Requests</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      if( !empty(mysqli_num_rows($result)) ){
                          $num = 1;
                          while($row = mysqli_fetch_array($result)){
                          echo "<tr>";
                          echo "<td>".$num."</td>";
                          echo "<td>".$row['Name']."</td>";
                          echo "<td>".$row['Phone_No']."</td>";
                          echo "<td>".$row['Blood_type']."</td>";
                          echo "<td>".$row['Quantity']."</td>";
                          echo "<td><a href='accept_request.php?id=".base64_encode($row['Rec_username'])  ."' class='btn btn-primary' role='button' >Accept</a></td>";
                          echo "</tr>";
                          $num++;
                        }
                      }
                    ?>
                  </tbody>
            </table>
            </div>
            
          </div>
        </div>

        <div class="row row-heading">
          <div class=" col-12 col-md-6 ">
            <center><p><strong>Click here to view blood samples</strong></p></center>
            <center><a href="blood_sample.php" class="btn btn-success" role="button" >View Blood Sample</a></center>
          </div>
          <div class=" col-12 col-md-6 ">
            <center><p><strong>Click here to add blood samples</strong></p></center>
            <center><a href="add_blood_info.php" class="btn btn-danger" role="button" >Add Blood Request</a></center>  
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
