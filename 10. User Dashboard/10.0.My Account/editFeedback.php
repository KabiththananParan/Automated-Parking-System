<?php
    session_start();
    require '../config.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $feedback_id = $_POST['feedback_id'];
        $feedback_msg = $_POST['feedback_msg'];
        
        $sql = "UPDATE feedack SET feedback_msg = '$feedback_msg' WHERE feedback_id = $feedback_id";

        if ($con->query($sql) === TRUE) {
            echo "Feedback updated successfully.";
        } else {
            echo "Error updating feedback: " . $con->error;
        }

        header("Location: account.php");
        exit();
    }
?>
