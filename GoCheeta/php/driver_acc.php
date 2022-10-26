<?php
session_start();
require_once("config.php");


if (isset($_POST['submit'])) {
    if (empty($_POST['id']) || empty($_POST['name']) || empty($_POST['contact']) || empty($_POST['branch']) || empty($_POST['vehino'])){
        echo ' Please Fill in the Blanks ';
    }
    else {
		$id = $_POST['id'];
        $name = $_POST['name'];
		$contact = $_POST['contact'];
		 $branch = $_POST['branch'];
		$vehino = $_POST['vehino'];
       
        $query = "update drivers set name='" . $name . "', contactno='" . $contact . "',branch='" . $branch . "',vehicleno='" . $vehino . "' where driverid='" . $id . "' ";
        $result = mysqli_query($conn, $query);

        if ($result) {
			$_SESSION["success"] =  'Account Successfully Updated';
            header("location:../drive acc.php");
			//echo 'Registration successful';
        }
        else {
            echo 'Please Check Your Query ';
        }
    }
}else {
    header("location:../Add_Driver.php");
}



?>