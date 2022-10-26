<?php
session_start();
require_once("config.php");

if (isset($_POST['submit'])) {
	
    if (empty($_POST['branch'])) {
        echo ' Please Fill in the Blanks ';
    }
    else {

		$branch = $_POST['branch'];
        

        $query = "SELECT * FROM branch WHERE `name`='$branch'";
        $result = mysqli_query($conn, $query);
		$row = $result->fetch_assoc();
		
		$query2 = "SELECT SUM(price) as sum FROM `booking` WHERE `branch`='$branch'";
		$result2 = mysqli_query($conn, $query2);
		$row2 = $result2->fetch_assoc();
		
	    $query3 = "SELECT COUNT(*) as noofbookings FROM `booking` WHERE `branch`='$branch'";
		$result3 = mysqli_query($conn, $query3);
		$row3 = $result3->fetch_assoc();
		
        
        if ($result && $result2) {
			$_SESSION["branchdata"] = $row;
			$_SESSION["sumdata"] = $row2;
			$_SESSION["countdata"] = $row3;
            header("location:../branches.php"); 
			
        }
        else {
            echo 'Please Check Your Query ';
        }
    }
}
else {
     header("location:../branches.php");
}