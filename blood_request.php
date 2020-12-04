<?php  
	
	include('connection.php');
 	include('sessions.php');	
	session_start();

	if(!isset($_SESSION['user'])){
		header('location:index.php');
	}

	if(isset($_POST['request'])){

	    $group = $_POST['group'];
	    $quantity = $_POST['quantity'];
	    $hosp_user = $_POST['request'];

	    $rec_user = $_SESSION['user'];
	    $query = "SELECT * FROM receiver_reg WHERE Username = '$rec_user' ";
	    $result = mysqli_query($conn, $query);

	    $row = mysqli_fetch_array($result);

	    $name = $row['Name'];
	    $phone_no = $row['Phone_No'];

	    if($quantity == 0){
	    	echo "<script type='text/javascript'>
	            alert('Invalid Quantity');
	             window.location.replace('blood_sample.php');
	          </script>";
	    }
	    else{

		    	$query = "SELECT * FROM request_blood WHERE Rec_username = '$rec_user' AND Blood_type = '$group' ";
		    $result = mysqli_query($conn, $query);

		   	if( !empty(mysqli_num_rows($result)) ){
		   		$query = "UPDATE request_blood SET Quantity = Quantity+$quantity WHERE Rec_username = '$rec_user' AND Blood_type = '$group'  ";
		   	}
		   	else{
		    $query = "INSERT INTO request_blood(Name, Hosp_username, Phone_No, Blood_type, Quantity, Rec_username, Accept) VALUES ('$name', '$hosp_user', '$phone_no', '$group', '$quantity','$rec_user', 0 ) ";
		   	}
	    	mysqli_query($conn, $query); 
	    	echo "<script type='text/javascript'>
	            alert('Request Sent');
	             window.location.replace('blood_sample.php');
	          </script>";
	    	
	    }
    } 

?>
