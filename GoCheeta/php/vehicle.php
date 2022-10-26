<?php
session_start();
require_once("config.php");


if (isset($_POST['search'])) {
	 if (empty($_POST['license'])){
        echo ' Please Fill in the Blanks ';
    }
    else {
        $license = $_POST['license'];

        $query = "SELECT * FROM vehicles WHERE `license`='$license'";
        $result = mysqli_query($conn, $query);
        $row = $result->fetch_assoc();
        if ($result) {
			$_SESSION["vehicledata"] =  $row;
            header("location:../vehicles.php");
			//echo 'Registration successful';
        }
        else {
            echo 'Please Check Your Query ';
        }
    }
}
else if (isset($_POST['update'])) {
    if (empty($_POST['license']) || empty($_POST['driverid']) || empty($_POST['branch']) || empty($_POST['type'])){
        echo ' Please Fill in the Blanks ';
    }
    else {
		$licensceno = $_POST['license'];
        $driverid = $_POST['driverid'];
        $branch = $_POST['branch'];
		$type = $_POST['type'];
		

        $query = " update vehicles set branch='" . $branch . "', type='" . $type . "', driverid='" . $driverid . "' where license='" . $licensceno . "' ";
        $result = mysqli_query($conn, $query);

        if ($result) {
			$_SESSION["success"] =  'Vehicle Successfully Updated';
            header("location:../vehicles.php");
			//echo 'Registration successful';
        }
        else {
            echo 'Please Check Your Query ';
        }
    }
}else if (isset($_POST['submit'])) {
    if (empty($_POST['license']) || empty($_POST['driverid']) || empty($_POST['branch']) || empty($_POST['type'])){
        echo ' Please Fill in the Blanks ';
    }
    else {
        $license = $_POST['license'];
        $driverid = $_POST['driverid'];
        $branch = $_POST['branch'];
		$type = $_POST['type'];

        $query = " insert into vehicles (branch,license,type,driverid) values('" . $branch . "','" . $license . "','" . $type . "','" . $driverid . "')";
        $result = mysqli_query($conn, $query);

        if ($result) {
			$_SESSION["success"] =  'Vehicle Successfully Added';
            header("location:../vehicles.php");
			//echo 'Registration successful';
        }
        else {
            echo 'Please Check Your Query ';
        }
    }
}else if (isset($_POST['remove'])) {
    if (empty($_POST['license'])){
        echo ' Please add license ';
    }
    else {
       
        $license = $_POST['license'];
        $query = "delete FROM vehicles WHERE `license`='$license'";
        $result = mysqli_query($conn, $query);

        if ($result) {
			$_SESSION["success"] =  'Vehicle Successfully Removed';
            header("location:../vehicles.php");
			//echo 'Registration successful';
        }
        else {
            echo 'Please Check Your Query ';
        }
    }
}
else {
    header("location:../Add_Driver.php");
}



?>