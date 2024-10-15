<?php
    require '../config.php'; 

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['employee_id'])) {
        
        $employee_id = $_POST['employee_id'];

        if (isset($_POST['contact']) && isset($_POST['salary'])) {
            $contact = $_POST['contact'];
            $salary = $_POST['salary'];

            $sql = "UPDATE employees SET contact = '$contact', salary = '$salary' WHERE employee_id = '$employee_id'";

            if ($con->query($sql) === TRUE) {
                echo "Employee details updated successfully!";
            } 
            else {
                echo "Error updating employee: " . $con->error;
            }

            header("Location: admin.php");
            exit();
        }

        $sql = "SELECT contact, salary FROM employees WHERE employee_id = '$employee_id'";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $contact = $row['contact'];
            $salary = $row['salary'];
        } 
        else {
            echo "Employee not found.";
            exit();
        }
    } 
    else {
        echo "Invalid request.";
        exit();
    }
?>


<form  method="post" action="">
    <input type="hidden" name="employee_id" value="<?php echo htmlspecialchars($employee_id); ?>">

    <label for="contact">Contact:</label>
    <input type="text" id="contact" name="contact" value="<?php echo htmlspecialchars($contact); ?>">
    
    <br> <br>

    <label for="salary">Salary:</label>
    <input type="number" id="salary" name="salary" value="<?php echo htmlspecialchars($salary); ?>">
    
    <br> <br>

    <input type="submit" name="update" value="Update">
</form>
