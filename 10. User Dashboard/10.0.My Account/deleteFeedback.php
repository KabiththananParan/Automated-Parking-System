<?php
    session_start();
    require '../config.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $feedback_id = $_POST['feedback_id'];

        $sql = "DELETE FROM feedack WHERE feedback_id = $feedback_id";

        if ($con->query($sql) === TRUE) {
            echo "Feedback deleted successfully.";
        } else {
            echo "Error deleting feedback: " . $con->error;
        }

        header("Location: account.php");
        exit();
    }
?>
