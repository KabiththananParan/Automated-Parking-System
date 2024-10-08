<?php
    session_start();
    require '../config.php';


    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id'])) {
        $user_id = $_POST['user_id'];

    
        if (isset($_POST['new_name']) && isset($_POST['new_phone'])) {
            $new_name = $_POST['new_name'];
            $new_phone = $_POST['new_phone'];

        
            $sql = "UPDATE users SET name = '$new_name', phone = '$new_phone' WHERE user_id = '$user_id'";
            
            if ($con->query($sql) === TRUE) {
                echo "Account updated successfully!";
            } else {
                echo "Error updating account: " . $con->error;
            }

            header("Location: account.php");
            exit();
        } else {
        
            $sql = "SELECT name, phone FROM users WHERE user_id = '$user_id'";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $current_name = $row['name'];
                $current_phone = $row['phone'];
            } else {
                echo "User not found.";
                exit();
            }
        }
    } else {
        echo "Invalid request.";
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>

    <link rel="shortcut icon" href="./Images/logo.png" type="image/x-icon">

    <link rel="stylesheet" href="./editAccount.css">
</head>
<body>
    <div class="container">
        <h2>Edit Account</h2>

        <form method="post" action="">
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            <label for="new_name">New Name:</label>
            <input type="text" id="new_name" name="new_name" value="<?php echo $current_name; ?>" required>

            <br>
            <label for="new_phone">New Phone Number:</label>
            <input type="text" id="new_phone" name="new_phone" value="<?php echo $current_phone; ?>" required>
            <br>

            <input type="submit" value="Update Account">
        </form>
    </div>
</body>
</html>

