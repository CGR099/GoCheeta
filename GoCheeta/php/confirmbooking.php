<?php
session_start();
require_once("config.php");

if (isset($_POST['submit'])) {
    if (empty($_POST['pickup']) || empty($_POST['destination'])) {
        echo ' Please Fill in the Blanks ';
    }
    else {
		$success = "booking successful";
        $id = $_SESSION['customerid'];
        $driver = '';
        $price = 2000;
        $branch = $_POST['branch'];
        $pickup = $_POST['pickup'];
        $destination = $_POST['destination'];
        $vehicle = $_POST['vehtype'];

        $query = " insert into booking (branch,pickup,destination,vehicle,customer,driver,price) values('$branch','$pickup','$destination','$vehicle','$id','$driver','$price')";
        $result = mysqli_query($conn, $query);

        if ($result) {
			$_SESSION["success"] = $success;
            header("location:../customer_main.php");
			//echo 'Booking Successful';
        }
        else {
            echo 'Please Check Your Query ';
        }
    }
}
else {
    header("location:../html/Registraion.html");
}



?>