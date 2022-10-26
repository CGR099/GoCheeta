<?php
session_start();
require_once("config.php");


if (isset($_POST['submit'])) {
    if (empty($_POST['id']) || empty($_POST['name']) || empty($_POST['contact'])){
        echo ' Please Fill in the Blanks ';
    }
    else {
		$id = $_POST['id'];
        $name = $_POST['name'];
		$contact = $_POST['contact'];
       
        $query = "update customers set name='" . $name . "', contact='" . $contact . "' where id='" . $id . "' ";
        $result = mysqli_query($conn, $query);

        if ($result) {
			$_SESSION["success"] =  'Account Successfully Updated';
            header("location:../cus acc.php");
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