<?php 

  include('connection.php');
  include('sessions.php');

  session_start();

  // REGISTRATION TABLE FIELD

  $hosp_name = mysqli_real_escape_string($conn, $_POST['hosp_name']);
  $username  = mysqli_real_escape_string($conn, $_POST['username']);
  $password  = mysqli_real_escape_string($conn, $_POST['password']);
  $phone_no  = mysqli_real_escape_string($conn, $_POST['phone']);
  $address   = mysqli_real_escape_string($conn, $_POST['address']);
  $conform_password = mysqli_real_escape_string($conn, $_POST['conform_password']);


  
  // QUERY TO CHECK USER OF SAME USERNAME OR HOSPITAL NAME EXIST OR NOT

  $query1="SELECT * FROM `hospital_reg` WHERE Username = '$username' ";
  $query2="SELECT * FROM `hospital_reg` WHERE Hospital_Name = '$hosp_name'";
  
  $result1=mysqli_query($conn, $query1);
  $result2=mysqli_query($conn, $query2);
  
  $num1=mysqli_num_rows($result1);
  $num2=mysqli_num_rows($result2);


  
  // ERROR CHECKING
  
  $message = "";

  if( !empty($num1) ) { $message .= "Username already taken <br>"; }
  if( !empty($num2) ) { $message .= "Hospital already register <br>"; }
  if( $password != $conform_password ) { $message .= "Enter password correctly"; }


  if( $message != "" ){ 
    
    echo "<script type='text/javascript'>
            alert('$message');
             window.location.replace('registration.php');
          </script>";
  }
  else{
    $query1 = "INSERT INTO hospital_reg(Hospital_Name, Username, Password, Phone_No, Address) VALUES ('$hosp_name', '$username', '$password', '$phone_no', '$address' ) ";
    $query2 = "INSERT INTO blood_info(Username, O_pos, O_neg, A_pos, A_neg, B_pos, B_neg, AB_pos, AB_neg) VALUES ('$username', 0,0,0,0,0,0,0,0 ) ";

    mysqli_query($conn, $query1);
    mysqli_query($conn, $query2);
    header('location:index.php');

  }

?>