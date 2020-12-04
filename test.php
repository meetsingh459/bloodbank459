<?php  
	
	include('connection.php');
  include('sessions.php');	
	session_start();

	if(isset($_POST['request'])){

    // $user = base64_decode($_GET['id']);
    // echo $user;


    $group = $_POST['group'];
    $quantity = $_POST['quantity'];
    $hosp_user = $_POST['request'];

    $rec_user = $_SESSION['user'];
    $query = "SELECT * FROM receiver_reg WHERE Username = '$rec_user' ";
    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_array($result);

    $name = $row['Name'];
    $phone_no = $row['Phone_No'];

    echo $hosp_user;
    echo $rec_user;
    echo $group;
    echo $quantity;
    echo $name;
    echo $phone_no;

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
	    $query = "INSERT INTO request_blood(Name, Hosp_username, Phone_No, Blood_type, Quantity, Rec_username, ) VALUES ('$name', '$hosp_user', '$phone_no', '$group', '$quantity','$rec_user' ) ";
	   	}
    	mysqli_query($conn, $query); 
    }
    } 

	// if(isset($_REQUEST['request_blood'])){

 //    $user = $_SESSION['user'];
 //    $query = "SELECT * FROM receiver_reg WHERE Username = '$user' ";
 //    $result = mysqli_query($conn, $query);

 //    $row = mysqli_fetch_array($result);

 //    $group = $_POST['group'];
 //    $quantity = $_POST['quantity'];

    // $query = "INSERT INTO request_blood(Name, Username, Phone_No, Blood_type, Qyantity) VALUES ('$name', '$username', '$password', '$dob', '$phone_no', '$gender', '$group' ) ";
    
    // mysqli_query($conn, $query);  
    // unset($_POST['add_blood']);

  //}

	// echo $_SESSION['user'];
	// echo $_SESSION['user_type'];

	// if(isset($_POST['add_blood'])){


	// 	$user = $_POST['group'];
	// 	$g = 'O_pos';		
	// 	$q = 10;
	// 	$query = "UPDATE blood_info SET $g = $g+$q WHERE Username = '$user' ";
	//     mysqli_query($conn, $query);  
	
	//}
	// $query = "SELECT * FROM hospital_reg, blood_info WHERE hospital_reg.Username ='$user' AND hospital_reg.Username = blood_info.Username ";
 //  	mysqli_query($conn, $query);  

 //  $row = mysqli_fetch_assoc($result);
	// $h_name = 'arun_hosp';
	//  if($h_name != "" ){
 //      $query = "SELECT * FROM hospital_reg, blood_info WHERE hospital_reg.Hospital_Name LIKE '$h_name%' AND hospital_reg.Username = blood_info.Username ";
 //    }
  
 //  else{      
 //    $query = "SELECT * FROM hospital_reg, blood_info WHERE hospital_reg.Username = blood_info.Username";
 //  }

 //  $result = mysqli_query($conn, $query);
 //  while ($row=mysqli_fetch_array($result)) {
	// echo"<tr>";
	// echo"<td height='30'>".$row['Hospital_Name']."</td>";
	// echo"<td height='30'>".$row['Phone_No']."</td>";
	// echo"<td height='30'>".$row['Address']."</td>";
	// echo"<td height='30'>".'Rs '.$row['O_pos']."</td>";
	// echo"<td height='30'>".'Rs '.$row['O_neg']."</td>";
	// echo"<td height='30'>".'Rs '.$row['A_pos']."</td>";
	// echo"<td height='30'>".'Rs '.$row['A_neg']."</td>";
	// echo"<td height='30'>".'Rs '.$row['B_pos']."</td>";
	// echo"<td height='30'>".'Rs '.$row['B_neg']."</td>";
	// echo"<td height='30'>".'Rs '.$row['AB_pos']."</td>";
	// echo"<td height='30'>".'Rs '.$row['AB_neg']."</td>";
	// echo"</tr>";				
 // 	}


?>
