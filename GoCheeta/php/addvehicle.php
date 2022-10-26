<?php
session_start();
require_once("config.php");

if (isset($_POST['submit'])) {
    if (empty($_POST['branch']) || empty($_POST['vehino']) || empty($_POST['vehtype']) || empty($_POST['driverid'])){
        echo ' Please Fill in the Blanks ';
    }
    else {
        $vehino = $_POST['vehino'];
        $branch = $_POST['branch'];
        $vehtype = $_POST['vehtype'];
		$driverid = $_POST['driverid'];
  

        $query = " insert into vehicles (branch,license,type,driverid) values('" . $branch . "','" . $vehino . "','" . $vehtype . "','" . $driverid . "' )";
        $result = mysqli_query($conn, $query);

        if ($result) {
			$_SESSION["successveh"] =  'Vehicle Successfully Added';
            header("location:../Add_Vehicle.php");
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