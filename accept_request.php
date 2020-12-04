 <?php  
  
  // BACKEND FOR ACCEPTING BLOOD REQUEST

  include('connection.php');
  include('sessions.php');  
  session_start();

  if(isset($_GET['id'])){

      $rec_user = base64_decode($_GET['id']); 
      $query = "SELECT * FROM request_blood WHERE Rec_username = '$rec_user' ";
      $result = mysqli_query($conn, $query);

      $row = mysqli_fetch_array($result);

      $group = $row['Blood_type'];
      $hosp_user = $row['Hosp_username'];
      $quantity = $row['Quantity'];

      if( !empty(mysqli_num_rows($result)) ){

        $query = "SELECT * FROM blood_info WHERE Username = '$hosp_user' ";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($conn, $query);

        if($row['$group'] < $quantity ){
          echo "<script type='text/javascript'>
              alert('Insufficient Supply');
               window.location.replace('view_request.php');
            </script>";
        }

        else{
          $query1 = "UPDATE request_blood SET Accept = 1 WHERE Rec_username = '$rec_user' ";
          $query2 = "UPDATE blood_info SET $group = $group-$quantity WHERE Username = '$hosp_user' ";

          mysqli_query($conn, $query1);
          mysqli_query($conn, $query2);
          header('location:view_request.php');
        }
      }
      else{
         echo "<script type='text/javascript'>
              alert('NO Data Found');
               window.location.replace('view_request.php');
            </script>";
      }
  }
?>
