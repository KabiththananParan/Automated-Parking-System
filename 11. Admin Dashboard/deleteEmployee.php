<?php
session_start();
require '../config.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['employee_id'])) {
    $employee_id = $_POST['employee_id']; 

    
    $sql = "DELETE FROM employees WHERE employee_id = $employee_id";

    if ($con->query($sql) === TRUE) {
        $_SESSION['message'] = "Employee deleted successfully";
    } else {
        $_SESSION['message'] = "Error deleting employee: " . $con->error;
    }

    $con->close();
}

header("Location: admin.php");
exit();
?>
