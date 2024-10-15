<?php
    session_start();
    require '../config.php'; 

    $full_name = '';
    $email = '';
    $contact = '';
    $dob = '';
    $nic = '';
    $salary = '';


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $full_name = mysqli_real_escape_string($con, $_POST['full_name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $contact = mysqli_real_escape_string($con, $_POST['contact']);
        $dob = mysqli_real_escape_string($con, $_POST['DOB']);
        $nic = mysqli_real_escape_string($con, $_POST['NIC']);
        $salary = mysqli_real_escape_string($con, $_POST['Salary']);

        $sql = "INSERT INTO employees (full_name, email, contact, DOB, NIC, Salary) VALUES ('$full_name', '$email', '$contact', '$dob', '$nic', '$salary')";
        
        if ($con->query($sql) === TRUE) {
            $_SESSION['message'] = "Employee added successfully";
            header("Location: ./admin.php"); 
            exit();
        } else {
            $_SESSION['message'] = "Error adding employee: " . $con->error;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>

    <link rel="shortcut icon" href="./Images/logo.png" type="image/x-icon">

    <link rel="stylesheet" href="./addEmployee.css">
</head>
<body>

    <h2>Add New Employee</h2>

    <form class="form-container" method="post" action="">
        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name" required>
        
        <br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <br><br>

        <label for="contact">Contact:</label>
        <input type="text" id="contact" name="contact" required>
        
        <br><br>

        <label for="DOB">Date of Birth:</label>
        <input type="date" id="DOB" name="DOB" required>
        
        <br><br>

        <label for="NIC">NIC:</label>
        <input type="text" id="NIC" name="NIC" required>
        
        <br><br>

        <label for="Salary">Salary:</label>
        <input type="number" id="Salary" name="Salary" required>
        
        <br><br>

        <input type="submit" value="Add Employee">
    </form>


</body>
</html>
