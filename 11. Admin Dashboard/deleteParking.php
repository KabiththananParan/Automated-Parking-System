<?php
    session_start();
    require '../config.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['location_id'])) {
        $location_id = intval($_POST['location_id']); 

        
        $sql = "DELETE FROM parking_locations WHERE location_id = $location_id";

        if ($con->query($sql) === TRUE) {
            echo "Location deleted successfully";
        } else {
            echo "Error deleting location: " . $con->error;
        }
        
        $con->close();
    }


    header("Location: admin.php");  
    exit();
?>
