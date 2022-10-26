<?php
session_start();
require_once("config.php");

if (isset($_POST['submit'])) {
    if (empty($_POST['branch']) || empty($_POST['drivername']) || empty($_POST['driverid']) || empty($_POST['drivertel']) || empty($_POST['username']) || empty($_POST['password'])){
        echo ' Please Fill in the Blanks ';
    }
    else {
        $username = $_POST['username'];
        $branch = $_POST['branch'];
        $drivername = $_POST['drivername'];
        $password = $_POST['password'];
		$driverid = $_POST['driverid'];
        $drivertel = $_POST['drivertel'];

        $query = " insert into drivers (username,name,password,contactno,licenseno,branch) values('" . $username . "','" . $drivername . "','" . $password . "','" . $drivertel . "','" . $driverid . "','" . $branch . "' )";
        $result = mysqli_query($conn, $query);

        if ($result) {
			$_SESSION["success"] =  'Driver Successfully Added';
            header("location:../Add_Driver.php");
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