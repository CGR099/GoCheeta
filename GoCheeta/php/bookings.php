<?php
session_start();
require_once("config.php");

if (isset($_POST['submit'])) {
	
    if (empty($_POST['bookingid'])) {
        echo ' Please Fill in the Blanks ';
    }
    else {
		//$success = "booking successful";
        $bookingid = $_POST['bookingid'];
		$branch = $_POST['branch'];
        

        $query = "SELECT * FROM booking WHERE `bookingid`='$bookingid' AND `branch`='$branch'";
        $result = mysqli_query($conn, $query);
		$row = $result->fetch_assoc();
		
		$customer = $row['customer'];
		$query2 = "SELECT name,nicno,contact FROM customers WHERE `username`='$customer'";
		$result2 = mysqli_query($conn, $query2);
		$row2 = $result2->fetch_assoc();
		
        
        if ($result && $result2) {
			$_SESSION["success"] = '';
			$_SESSION["bookingdata"] = $row;
			$_SESSION["customerdata"] = $row2;
            header("location:../bookings.php"); 
			
        }
        else {
            echo 'Please Check Your Query ';
        }
    }
}


if (isset($_POST['remove'])) {
	
    if (empty($_POST['bookingid'])) {
        echo ' Please Fill in the Blanks ';
    }
    else {
		$success = "delete successful";
        $bookingid = $_POST['bookingid'];
		
     
        $sql = "DELETE FROM `booking` WHERE `bookingid`='$bookingid'";
        $result = $conn->query($sql);
		
        
        if ($result) {
			$_SESSION["success"] = $success;
			
            header("location:../bookings.php"); 
			
        }
        else {
            echo 'Please Check Your Query ';
        }
    }
}
else {
     header("location:../bookings.php");
}