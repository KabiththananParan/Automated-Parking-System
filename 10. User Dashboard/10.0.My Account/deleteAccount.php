<?php
    session_start();
    require '../config.php';


    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id'])) {
        $user_id = $_POST['user_id'];

    
        $sql = "DELETE FROM users WHERE user_id = '$user_id'";
        
        if ($con->query($sql) === TRUE) {
            session_destroy();
            echo "Account deleted successfully!";
            
        
            header("Location: account.php");
            exit();
        } else {
            echo "Error deleting account: " . $con->error;
        }
    } else {
        echo "Invalid request.";
        exit();
    }
?>
