<?php
    session_start();
    require '../config.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id'])) {
        $user_id = $_POST['user_id'];

        $sql = "DELETE FROM users WHERE user_id = $user_id";

        if ($con->query($sql) === TRUE) {
            echo "User deleted successfully";
        } 
        else {
            echo "Error deleting user: " . $con->error;
        }
        $con->close();
    }
    header("Location: admin.php"); 
    exit();
?>
