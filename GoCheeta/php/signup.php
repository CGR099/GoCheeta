<?php

require_once("config.php");

if (isset($_POST['submit'])) {
    if (empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['nic']) || empty($_POST['password'])) {
        echo ' Please Fill in the Blanks ';
    }
    else {
        $username = $_POST['email'];
        $contact = $_POST['phone'];
        $nicno = $_POST['nic'];
        $password = $_POST['password'];

        $query = " insert into customers (username,password,contact,nicno) values('" . $username . "','" . $password . "','" . $contact . "','" . $nicno . "' )";
        $result = mysqli_query($conn, $query);

        if ($result) {
            //header("location:Registraion_view.php");
			echo 'Registration successful';
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