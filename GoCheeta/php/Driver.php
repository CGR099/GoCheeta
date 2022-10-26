<?php
session_start();
require_once("config.php");


if (isset($_POST['search'])) {
	 if (empty($_POST['id'])){
        echo ' Please Fill in the Blanks ';
    }
    else {
        $id = $_POST['id'];

        $query = "SELECT * FROM drivers WHERE `driverid`='$id'";
        $result = mysqli_query($conn, $query);
        $row = $result->fetch_assoc();
        if ($result) {
			$_SESSION["driverdata"] =  $row;
            header("location:../Driver.php");
			//echo 'Registration successful';
        }
        else {
            echo 'Please Check Your Query ';
        }
    }
}
else if (isset($_POST['update'])) {
    if (empty($_POST['id']) || empty($_POST['branch']) || empty($_POST['drivername']) || empty($_POST['driverid']) || empty($_POST['drivertel']) || empty($_POST['vehicleid'])){
        echo ' Please Fill in the Blanks ';
    }
    else {
		$id = $_POST['id'];
        $branch = $_POST['branch'];
        $drivername = $_POST['drivername'];
        $drivertel = $_POST['drivertel'];
		$licensceno = $_POST['driverid'];
		$vehicleno = $_POST['vehicleid'];

        $query = " update drivers set name='" . $drivername . "', contactno='" . $drivertel . "', licenseno='" . $licensceno . "', branch='" . $branch . "', vehicleno='" . $vehicleno . "' where driverid='" . $id . "' ";
        $result = mysqli_query($conn, $query);

        if ($result) {
			$_SESSION["success"] =  'Driver Successfully Updated';
            header("location:../Driver.php");
			//echo 'Registration successful';
        }
        else {
            echo 'Please Check Your Query ';
        }
    }
}else if (isset($_POST['submit'])) {
    if (empty($_POST['branch']) || empty($_POST['drivername']) || empty($_POST['driverid']) || empty($_POST['drivertel']) || empty($_POST['vehicleid'])){
        echo ' Please Fill in the Blanks ';
    }
    else {
        $branch = $_POST['branch'];
        $drivername = $_POST['drivername'];
        $drivertel = $_POST['drivertel'];
		$licensceno = $_POST['driverid'];
		$vehicleno = $_POST['vehicleid'];

        $query = " insert into drivers (name,contactno,licenseno,branch,vehicleno) values('" . $drivername . "','" . $drivertel . "','" . $licensceno . "','" . $branch . "','" . $vehicleno . "')";
        $result = mysqli_query($conn, $query);

        if ($result) {
			$_SESSION["success"] =  'Driver Successfully Added';
            header("location:../Driver.php");
			//echo 'Registration successful';
        }
        else {
            echo 'Please Check Your Query ';
        }
    }
}else if (isset($_POST['remove'])) {
    if (empty($_POST['id'])){
        echo ' Please add driver id ';
    }
    else {
       
        $id = $_POST['id'];
        $query = "delete FROM drivers WHERE `driverid`='$id'";
        $result = mysqli_query($conn, $query);

        if ($result) {
			$_SESSION["success"] =  'Driver Successfully Removed';
            header("location:../Driver.php");
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