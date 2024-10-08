<?php
    session_start(); 
    require '../config.php'; 


    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['payment_id'])) {
        $payment_id = $_POST['payment_id'];

        $sql = "DELETE FROM payment WHERE payment_id = '$payment_id'";
        
        if ($con->query($sql) === TRUE) {
            echo "Booking cancelled successfully!";
        } else {
            echo "Error cancelling booking: " . $con->error;
        }

        header("Location: account.php");
        exit();
    } else {
        echo "Invalid request.";
        exit();
    }
?>
