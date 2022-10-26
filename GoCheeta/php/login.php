<?php
session_start();
require_once("config.php");

if (isset($_POST['submit'])) {
	$_SESSION["error"] = '';
	$error = "username/password incorrect";
	$error2 = "Please Fill in the Blanks";
    if (empty($_POST['Email']) || empty($_POST['Password'])) {
		 $_SESSION["error"] = $error2;
	     header("location:../Login.php");
        
    }
    else {
        $username = $_POST['Email'];
		$password = $_POST['Password'];
		$type = $_POST['Type'];
		  echo "<script>console.log('Debug Objects: " . $type . "' );</script>";
		if($type == 'customer'){
			$sql= "SELECT * FROM customers WHERE username = '" . $username . "' AND password = '" . $password . "' ";
			$result = mysqli_query($conn,$sql);
			
			$check = mysqli_fetch_array($result);
			if(isset($check)){
			// Store ID
			$_SESSION['customerid'] = $_POST['Email'];
			header("location:../customer_main.php");
			}else{
			 $_SESSION["error"] = $error;
			 header("location:../Login.php");
		
		    }
		}else if($type == 'admin'){
			$sql= "SELECT * FROM admin WHERE username = '" . $username . "' AND password = '" . $password . "' ";
			$result = mysqli_query($conn,$sql);
			
			$check = mysqli_fetch_array($result);
			if(isset($check)){
			// Store ID
			$_SESSION['adminid'] = $_POST['Email'];
			header("location:../bookings.html");
			}else{
			 $_SESSION["error"] = $error;
			 header("location:../Login.php");
		
		    }
		}
		
    }
}
else {
	echo "no type";
    //header("location:../Login.php");
}


?>