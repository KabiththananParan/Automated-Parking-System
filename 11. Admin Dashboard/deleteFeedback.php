<?php
    session_start();
    require '../config.php'; 


        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['feedback_id'])) {
            $feedback_id = $_POST['feedback_id']; 

            $sql = "DELETE FROM feedack WHERE feedback_id = $feedback_id";

            if ($con->query($sql) === TRUE) {
                $_SESSION['message'] = "Feedback deleted successfully";
            } else {
                $_SESSION['message'] = "Error deleting feedback: " . $con->error;
            }

            $con->close();
        }


    header("Location: admin.php"); 
    exit();
?>
