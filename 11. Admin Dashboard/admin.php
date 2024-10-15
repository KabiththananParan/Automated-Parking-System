<?php
    session_start();
    require '../config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-park</title>

    <link rel="shortcut icon" href="./Images/logo.png" type="image/x-icon">

    <link rel="stylesheet" href="../Navbar/nav.css">
    <link rel="stylesheet" href="./admin.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>

<body>
<!--Navbar For Login USERS-->

    <div class="navbar">
        <div class="navbar-left">

            <img src="./Images/logo.png" alt="logo" width="100px" >
            <h1>e-park</h1>

        </div>

        <div class="navbar-right">
            <div class="right-top">
                <ol>
                    <!-- <a href="../04.About US/about.html"><li>About-us</li></a>
                    <a href="../03.Contact US/contact.html"><li>Contact-us</li></a>
                    <a href="../02.FAQs/faqs.html"><li>FAQs</li></a> -->
                </ol>

                    <a href="#"><img src="./Images/administrator.png" width="70px"></a>
                
            </div>

            <div class="right-bottom">
                <ol>
                <!-- <a href="../06.Parking/parking.html"><li>Parking</li></a>
                    <a href="../05.Pricing/price.html"><li>Pricing</li></a> -->
                </ol>
            </div>

        </div>
    </div>


    <!--Admin Page-->

    <div class="admin-panel">

        <div class="admin-nav">
            <ol>
                <li><button class="btn-1">User Accounts</button></li>
                <li><button class="btn-2">Parking Slots</button></li>
                <li><button class="btn-3">Employees</button></li>
                <li><button class="btn-4">Feedbacks</button></li>
            </ol>
        </div>

        <!--admin panel Users-->

        <div class="users">
            
            <?php 
            
                $sql = "SELECT user_id, name, user_name, email, phone, DOB FROM users"; 
                $result = $con->query($sql);

           
                if (!$result) {
                    echo "Error: " . $con->error;
                } 
                elseif ($result->num_rows > 0) {
                    echo "<table>";
                    echo "<tr><th>User ID</th><th>Name</th><th>Username</th><th>Email</th><th>Phone</th><th>DOB</th></tr>"; 
                    
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["user_id"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["user_name"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["phone"] . "</td>";
                        echo "<td>" . $row["DOB"] . "</td>";
                        echo "<td><form method='post' action='deleteUser.php'><input type='hidden' name='user_id' value='" . $row['user_id'] . "'><input type='submit' class='btn-delete' value='Delete'></form></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } 
                else {
                    echo "No results found.";
                }

            
               
            ?> 
        </div>


        <!--admin panel Parking Slots-->

        <div style="margin: 20px;" class="parking_slots">

            <form style="margin: 20px;" method="post" action="addParking.php">
                <label for="location_name">Location Name:</label>
                <input type="text" id="location_name" name="location_name" required>
                <input type="submit" class="btn-add" value="Add Parking Location">
            </form>
            
            <?php 
                
                $sql = "SELECT location_id, location_name FROM parking_locations"; 
                $result = $con->query($sql);

        
                if (!$result) {
                    echo "Error: " . $con->error;
                } 
                elseif ($result->num_rows > 0) {
                    echo "<table>";
                    echo "<tr><th>Location ID</th><th>Location Name</th></tr>"; 
                    
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["location_id"] . "</td>";
                        echo "<td>" . $row["location_name"] . "</td>";
                        echo "<td><form method='post' action='editParking.php'><input type='hidden' name='location_id' value='" . $row['location_id'] . "'><input type='submit' class='btn-edit' value='Edit'></form></td>";
                        echo "<td><form method='post' action='deleteParking.php'><input type='hidden' name='location_id' value='" . $row['location_id'] . "'><input type='submit' class='btn-delete' value='Delete'></form></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } 
                else {
                    echo "No results found.";
                }
            ?> 
        </div>

        <!--admin panel Employees-->

        <div class="employees">

        <a href="addEmployee.php" class="btn" ><button class="btn-add">Add Employee</button></a>

            <?php 
                    
                    $sql = "SELECT employee_id, full_name, email, contact, DOB, NIC, Salary FROM employees"; 
                    $result = $con->query($sql);

            
                    if (!$result) {
                        echo "Error: " . $con->error;
                    } 
                    elseif ($result->num_rows > 0) {
                        echo "<table>";
                        echo "<tr><th>Employee ID</th><th>Full Name</th><th>Email</th><th>Contact</th><th>DOB</th><th>NIC</th><th>Salary</th></tr>"; 
                        
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["employee_id"] . "</td>";
                            echo "<td>" . $row["full_name"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["contact"] . "</td>";
                            echo "<td>" . $row["DOB"] . "</td>";
                            echo "<td>" . $row["NIC"] . "</td>";
                            echo "<td>" . $row["Salary"] . "</td>";
                            echo "<td><form method='post' action='editEmployee.php'><input type='hidden' name='employee_id' value='" . $row['employee_id'] . "'><input type='submit' class='btn-edit' value='Edit'></form></td>";
                            echo "<td><form method='post' action='deleteEmployee.php'><input type='hidden' name='employee_id' value='" . $row['employee_id'] . "'><input type='submit' class='btn-delete' value='Delete'></form></td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } 
                    else {
                        echo "No results found.";
                    }
                    
                ?> 
        </div>

        <!--admin panel feedbacks-->

        <div class="feedbacks">
        <?php 
                
                $sql = "SELECT feedback_id, user_id, feedback_msg FROM feedack"; 
                $result = $con->query($sql);

        
                if (!$result) {
                    echo "Error: " . $con->error;
                } 
                elseif ($result->num_rows > 0) {
                    echo "<table>";
                    echo "<tr><th>Feedback ID</th><th>User Id</th><th>feedback_msg</th></tr>"; 
                    
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["feedback_id"] . "</td>";
                        echo "<td>" . $row["user_id"] . "</td>";
                        echo "<td>" . $row["feedback_msg"] . "</td>";
                        
                        echo "<td>
                                <form method='post' action='deleteFeedback.php'>
                                    <input type='hidden' name='feedback_id' value='" . $row['feedback_id'] . "'>
                                    <input type='submit' class='btn-delete' value='Delete'>
                                </form>
                            </td>";

                        echo "</tr>";
                    }
                    echo "</table>";
                } 
                else {
                    echo "No results found.";
                }

            
            ?>
        </div>

    </div>


    <script src="admin.js"></script>
    
</body>

</html>