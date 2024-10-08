<?php
    session_start();
    require '../config.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['location_name'])) {
        $location_name = $con->real_escape_string($_POST['location_name']); 

    
        $sql = "INSERT INTO parking_locations (location_name) VALUES ('$location_name')";

        if ($con->query($sql) === TRUE) {
            echo "Parking location added successfully.";
        } else {
            echo "Error adding location: " . $con->error;
        }

        $con->close();
    }


    header("Location: admin.php");
    exit();
?>
