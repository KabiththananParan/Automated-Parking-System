<?php
    require '../config.php'; 

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['location_id'])) {
        $location_id = $_POST['location_id'];

        
        if (isset($_POST['new_location_name'])) {
            $new_location_name = $_POST['new_location_name'];

            $sql = "UPDATE parking_locations SET location_name = '$new_location_name' WHERE location_id = '$location_id'";
            
            if ($con->query($sql) === TRUE) {
                echo "Location updated successfully!";
            } 
            else {
                echo "Error updating location: " . $con->error;
            }

            header("Location: admin.php");
            exit();
        }

        $sql = "SELECT location_name FROM parking_locations WHERE location_id = '$location_id'";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $location_name = $row['location_name'];
        } 
        else {
            echo "Location not found.";
            exit();
        }
    } 
    else {
        echo "Invalid request.";
        exit();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Parking Location</title>

    <link rel="shortcut icon" href="./Images/logo.png" type="image/x-icon">

    <link rel="stylesheet" href="./ediParking.css">
</head>
<body>
    <h2>Edit Parking Location</h2>

    <form class="container" method="post" action="">
        <input type="hidden" name="location_id" value="<?php echo $location_id; ?>">
        <label for="new_location_name">New Location Name:</label>

        <input type="text" id="new_location_name" name="new_location_name" value="<?php echo $location_name; ?>" required>
        <input type="submit" value="Update Location">
    </form>

</body>
</html>
