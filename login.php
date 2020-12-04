<?php 

	include('connection.php');
	include('sessions.php');

	session_start();


	$user = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	echo "USERNAME = '$user' <br> Password = '$password' ";

	$query1 = "SELECT * FROM receiver_reg WHERE Username = '$user' AND Password = '$password' ";
	$result1 = mysqli_query($conn, $query1);
	$num1 = mysqli_num_rows( $result1 );

	$query2 = "SELECT * FROM hospital_reg WHERE Username = '$user' AND Password = '$password' ";
	$result2 = mysqli_query($conn, $query2);
	$num2 = mysqli_num_rows($result2);

	$message = "";
	if(empty($num1) and empty($num2) ) { $message .= "Invalid username and password"; }


	if($message != ""){
		echo "<script type='text/javascript'>
            alert('$message');
             window.location.replace('index.php');
          </script>";
	}
	else{

		$_SESSION['user'] = $user;
		if( !empty($num1)) $_SESSION['user_type'] = "reciever";
		else if( !empty($num2)) $_SESSION['user_type'] = "hospital";
		 header('location:blood_sample.php');
		// header('location:add_blood_info.php');

	}
?>