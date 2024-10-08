<?php

    require '../config.php';


    $employee_id = '';
    $contact = '';
    $salary = '';


    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    
        $employee_id = $_POST['employee_id'];
        $contact = $_POST['contact'];
        $salary = $_POST['salary'];

    
        $sql = "UPDATE employees SET contact = ?, salary = ? WHERE employee_id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("sdi", $contact, $salary, $employee_id);

        if ($stmt->execute()) {
            echo "Employee details updated successfully!";
            echo "<a href='main.php'>Go back to employee list</a>";
        } else {
            echo "Error updating record: " . $con->error;
        }

        
        exit;
    }


    if (isset($_POST['employee_id'])) {
        $employee_id = $_POST['employee_id'];


        $sql = "SELECT contact, salary FROM employees WHERE employee_id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $employee_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $contact = $row['contact'];
            $salary = $row['salary'];
        } else {
            echo "Employee not found.";
            exit;
        }
    } else {
        echo "No employee ID provided.";
        exit;
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
