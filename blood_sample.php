<?php
  include('connection.php');
  include('sessions.php');

  session_start();

  $query = "SELECT * FROM hospital_reg, blood_info WHERE hospital_reg.Username = blood_info.Username";

  if(isset($_POST['filter'])){

    $h_name = $_POST['h_name'];
    if($h_name != "" ){
      $query = "SELECT * FROM hospital_reg, blood_info WHERE hospital_reg.Hospital_Name LIKE '$h_name%' AND hospital_reg.Username = blood_info.Username ";

     }

     unset($_POST);
  }

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
      <div class="row row-head ">
        <?php  
          if( $_SESSION['user'] != "") {
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
          <center><p class="h2"><strong>BLOOD SAMPLES</strong></p></center>
        </div>
        
        <div class="row row-content">
            
          <form action="" method="post"  class="form-inline">
            <div class="form-group mb-2">
              <label for="h_name">Hospital Name</label>
              <input type="text" name="h_name"  placeholder="Hospital Name" class="form-control" value="" >
            </div>
            <button type="submit" name="filter" class="btn btn-primary mb-2">Filter</button>
          </form>
            
          <div class="table-responsive table-wrap" >
            <table class="table table-striped table-sm " cellspacing="0">
              <thead >
                <tr>
                  <th>S No.</th>
                  <th>Hospital Name</th>
                  <th>Phone No.</th>
                  <th>Address</th>
                  <th>O+</th>
                  <th>O-</th>
                  <th>A+</th>
                  <th>A-</th>
                  <th>B+</th>
                  <th>B-</th>
                  <th>AB+</th>
                  <th>AB-</th>
                  <?php 
                    if($_SESSION['user_type'] != 'hospital'){
                      echo "<th>Blood Request</th>";
                    }
                  ?>
                </tr>
              </thead>
              <tbody>
                <?php 
                  if( !empty(mysqli_num_rows($result)) ){
                      $num = 1;
                      while($row = mysqli_fetch_array($result)){
                      echo "<tr>";
                      echo "<td>".$num."</td>";
                      echo "<td>".$row['Hospital_Name']."</td>";
                      echo "<td>".$row['Phone_No']."</td>";
                      echo "<td>".$row['Address']."</td>";
                      echo "<td>".$row['O_pos']."</td>";
                      echo "<td>".$row['O_neg']."</td>";
                      echo "<td>".$row['A_pos']."</td>";
                      echo "<td>".$row['A_neg']."</td>";
                      echo "<td>".$row['B_pos']."</td>";
                      echo "<td>".$row['B_neg']."</td>";
                      echo "<td>".$row['AB_pos']."</td>";
                      echo "<td>".$row['AB_neg']."</td>";
                      if($_SESSION['user_type'] != 'hospital'){

                        echo "<td>
                        <form action='blood_request.php' method='post'  class='form-inline'>
                          <div class='form-group row'>
                            
                            <div class='col-md-4'>
                              <select class='form-control' name='group' id='group' required>
                                <option value='A_pos' >A+ </option>
                                <option value='A_neg'>A-</option>
                                <option value='B_pos'>B+</option>
                                <option value='B_neg'>B-</option>
                                <option value='O_pos'>O+</option>
                                <option value='O_neg'>O-</option>
                                <option value='AB_pos'>AB+</option>
                                <option value='AB_neg'>AB-</option>
                              </select>
                            </div>
                        
                          <div class='col-md-4'>
                            <input type='number' name='quantity' min='0' max='100000' step='1 'value='0' class='form-control' required >
                          </div>
                        
                          <div class='col-md-4' >
                            <button type='submit' value='".$row['Username']."' class='btn btn-primary' name='request' >Request</button>
                          </div>
                        </div>
                      </form> 
                      </td>";

                      }
                      echo "</tr>";
                      $num++;
                    }
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>

        <div class="row row-heading">
          <?php 
            if($_SESSION['user_type'] == 'hospital'){
              echo "<div class='col-12 col-md-6'>
                      <center><p><strong>Click here to add blood samples</strong></p></center>
                      <center><a href='add_blood_info.php' class='btn btn-danger' role='button' >Add Blood Sample</a></center>
                    </div>
                    <div class='col-12 col-md-6'>
                      <center><p><strong>Click here to view requests for blood samples</strong></p></center>
                      <center><a href='view_request.php' class='btn btn-success' role='button'>View Blood Request</a></center>  
                    </div>
                  </div>";
            }
          ?>
          

      </div>
    </section>

  


    <footer class="container-fluid footer">
      
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
          
          $("#request").click(function(){
            $("#blood_request").modal('toggle');
          });        
        });
    </script>
</body>
</html>


<?php
  
  if(isset($_POST['request'])){

    $user = $_POST['request'];
    $u = $_SESSION['user'];
    $query = "SELECT * FROM receiver_reg WHERE Username = '$u' ";
    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_array($result);

    $name = $row['Name'];
    $phone_no = $row['Phone_No'];
    $group = $_POST['group'];
    $quantity = $_POST['quantity'];

    $query = "INSERT INTO request_blood(Name, Username, Phone_No, Blood_type, Qyantity) VALUES ('$name', '$user', '$phone_no', '$group', '$quantity' ) ";
    
    mysqli_query($conn, $query);  
    
  }
?>