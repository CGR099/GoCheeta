<?php 

include "config.php"; 

if (isset($_GET['id'])) {

    $booking_id = $_GET['id'];

    $sql = "UPDATE `booking` SET `status`='approved' WHERE `bookingid`='$booking_id'"; 

      $result = mysqli_query($conn, $sql);

     if ($result == TRUE) {

         header("location:../all bookings.php");

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

} 

?>