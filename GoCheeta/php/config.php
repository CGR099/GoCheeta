<?php
echo '<script>console.log("from config")</script>';
$servername = "localhost";

$username = "root"; 

$password = ""; 

$dbname = "cabservicedb"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo '<script>console.log("connection error")</script>';
    die("Connection failed: " . $conn->connect_error);

}

?> 