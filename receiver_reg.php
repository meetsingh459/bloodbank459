<?php 

  include('connection.php');
  include('sessions.php');

  session_start();

  // REGISTRATION TABLE FIELD

  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $username  = mysqli_real_escape_string($conn, $_POST['username']);
  $password  = mysqli_real_escape_string($conn, $_POST['password']);
  $dob  = mysqli_real_escape_string($conn, $_POST['dob']);
  $gender = mysqli_real_escape_string($conn, $_POST['gender']);
  $group   = mysqli_real_escape_string($conn, $_POST['group']);
  $phone_no   = mysqli_real_escape_string($conn, $_POST['phone']);
  $conform_password = mysqli_real_escape_string($conn, $_POST['conform_password']);


  
  // QUERY TO CHECK USER OF SAME USERNAME OR HOSPITAL NAME EXIST OR NOT

  $query="SELECT * FROM `receiver_reg` WHERE Username = '$username' ";
  $result=mysqli_query($conn, $query);
  $num=mysqli_num_rows($result);
  
  // ERROR CHECKING
  
  $message = "";

  if( !empty($num) ) { $message .= "Username already taken <br>"; }
  if( $password != $conform_password ) { $message .= "Enter password correctly"; }


  if( $message != "" ){ 
    
    echo "<script type='text/javascript'>
            alert('$message');
             window.location.replace('registration.php');
          </script>";
  }
  else{
    $query = "INSERT INTO receiver_reg(Name, Username, Password, DOB, Phone_No, Gender, Blood_Group) VALUES ('$name', '$username', '$password', '$dob', '$phone_no', '$gender', '$group' ) ";

    mysqli_query($conn, $query);
    header('location:index.php');

  }

?>