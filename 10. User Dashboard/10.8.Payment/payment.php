<?php
session_start();
require '../config.php';

if (isset($_POST["submit_btn"])) {
    // Check if user is logged in
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php"); // Redirect to login if not logged in
        exit();
    } else {
        $user_id = $_SESSION['user_id'];
    }

    // Retrieve form data
    $packagetype = $_POST["package_type"];
    $selectedLocation = $_POST["selected_location"];
    $paymentMethod = $_POST["payment-method"];
    $invoice_number = $_POST["invoice_number"];
    $fullName = $_POST["fullName"];
    $NIC = $_POST["NIC"];
    $vechileNo = $_POST["vechile_no"];
    $hours = intval($_POST["hours"]); // Convert to integer

    // Check for package
    $checkPackage = "SELECT * FROM price_packages WHERE package_name = '$packagetype'";
    $result1 = $con->query($checkPackage);

    if ($result1 && $result1->num_rows > 0) {
        $package = $result1->fetch_assoc();
        $package_id = $package['package_id'];
        $price = $package['package_price'];
        $totalAmount = $price * $hours;

        // Insert into payment table
        $sql = "INSERT INTO payment (full_name, invoice_no, NIC_No, vechicle_no, package_id, location, method, parking_hours, total_amount, user_id, date_time) 
                VALUES ('$fullName', '$invoice_number', '$NIC', '$vechileNo', '$package_id', '$selectedLocation', '$paymentMethod', '$hours', '$totalAmount', '$user_id', NOW())";

        if ($con->query($sql) === TRUE) {
            // Redirect after successful insertion
            header("Location: ../10.0.My Account/account.php");
            exit();
        } else {
            echo "Error: " . $con->error; // Display error for debugging
        }
    } else {
        echo "Selected package not found."; // Handle case where no package is found
    }

    $con->close(); // Close the database connection
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>

    <link rel="shortcut icon" href="./Images/logo.png" type="image/x-icon">
    
    <link rel="stylesheet" href="../Navbar/nav.css">
    <link rel="stylesheet" href="./payment.css">
    <link rel="stylesheet" href="../Footer/footer.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>

<body>

    <!-- Navbar For Login USERS -->
    <div class="navbar">
        <div class="navbar-left">

            <a href="../10.1.Home/index.html"><img src="./Images/logo.png" alt="logo" width="100px"></a>
            <h1>e-park</h1>

        </div>

        <div class="navbar-right">
            <div class="right-top">
                <ol>
                    <a href="../10.3.Feedbags/feedbags.php"><li>Feedback</li></a>
                    <a href="../10.2.FAQs/faqs.html"><li>FAQs</li></a>
                    <a href="../10.6.Pricing/price.php"><li>BOOK NOW</li></a>
                </ol>
                <a href="../10.0.My Account/account.php"><img src="./Images/user.png" width="80px"></a>
            </div>
            
            <div class="right-bottom">
                <ol>
                    <a href="../10.7.Parking/parking.html"><li>Parking</li></a>
                    <a href="../10.6.Pricing/price.php"><li>Payment</li></a>
                </ol>
            </div>
        </div>

    </div>

<!-- Payment -->
    <h1 style="text-align: center; margin-top: 20px; font-size: 40px;">Payment</h1>

    <div class="payment_container">

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

            <label>Select Package</label> 
                <input type="radio" name="package_type" value="Basic" <?php if (isset($_POST['package']) && $_POST['package'] == 'Basic') echo 'checked'; ?>>Basic
                <input type="radio" name="package_type" value="Pro" <?php if (isset($_POST['package']) && $_POST['package'] == 'Pro') echo 'checked'; ?>>Pro
                <br>
                <label>Select Location</label> 

                <select name="selected_location" required>
                    <option value="" disabled selected>Select a location</option>
                    <option value="Cargills">Cargills</option>
                    <option value="Hospital">Hospital</option>
                    <option value="Library">Library</option>
                    <option value="Mall">Mall</option>
                    <option value="Theater">Theater</option>
                    <option value="Railway Station">Railway Station</option>
                    <option value="Ice Cream Shop">Ice Cream Shop</option>
                    <option value="Stadium">Stadium</option>
                    <option value="University">University</option>
                </select>

                <br><br>

                <label>Payment Method</label> 
                <input type="radio" name="payment-method" value="Bank"><img src="./Images/bank.png" width="50px">
                <input type="radio" name="payment-method" value="PayPal"><img src="./Images/paypal.png" width="70px">

                <br><br>

                <label>Enter your bill Invoice Number</label>
                <input name="invoice_number" type="text" required>

                <br>

                <label>Full Name</label>
                <input name="fullName" type="text" required>

                <br>

                <label>NIC No</label>
                <input name="NIC" type="text" required>

                <br>

                <label>Vehicle No</label>
                <input name="vechile_no" type="text" required>

                <br>

                <label>Parking Hours</label>
                <input name="hours" type="number" max="24" required>

                <br>

                <input type="submit" value="Submit" name="submit_btn">
                <input type="reset" value="Reset">

        </form>

    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="footer-icons">
            <img src="../Footer/Icons/facebook.png" width="50px">
            <img src="../Footer/Icons/instagram.png" width="50px">
            <img src="../Footer/Icons/twitter.png" width="50px">
        </div>

        <div class="footer-links">
            <ol>
                <li><a href="../10.5.About US/about.html">About US</a></li>
                <li><a href="../10.4.Contact US/contact.html">Contact US</a></li>
                <li><a href="../10.7.Parking/parking.html">Parking</a></li>
                <li><a href="../10.6.Pricing/price.php">Pricing</a></li>
            </ol>
        </div>

        <div class="footer-rights">
            <p>&copy;2024 e-park. All Rights Reserved. || Design and Development by SLIIT Y1S2 Group - 05</p>
        </div>

    </div>

    <!-- <?php
    if (isset($_POST["submit_btn"])) {
        if (!isset($_SESSION['user_id'])) {
            echo "User is not logged in";
            exit();
        } else {
            $user_id = $_SESSION['user_id'];
        }

        $packagetype = $_POST["package_type"];
        $selectedLocation = $_POST["selected_location"];
        $paymentMethod = $_POST["payment-method"];
        $invoice_number = $_POST["invoice_number"];
        $fullName = $_POST["fullName"];
        $NIC = $_POST["NIC"];
        $vechileNo = $_POST["vechile_no"];
        $hours = $_POST["hours"];

        // Check for package
        $checkPackage = "SELECT * FROM price_packages WHERE package_name = '$packagetype'";
        $result1 = $con->query($checkPackage);

        if ($result1->num_rows > 0) {
            $package = $result1->fetch_assoc();
            $package_id = $package['package_id'];
            $price = $package['package_price'];

            $totalAmount = $price * $hours;

            // Insert into payment table
            $sql = "INSERT INTO payment (full_name, invoice_no, NIC_No, vechicle_no, package_id, location, method, parking_hours, total_amount, user_id, date_time) 
                    VALUES ('$fullName', '$invoice_number', '$NIC', '$vechileNo', '$package_id', '$selectedLocation', '$paymentMethod', '$hours', '$totalAmount', '$user_id', NOW())";

            if ($con->query($sql)) {
                // Redirect after successful insertion
                header("Location: ../10.0.My Account/account.php");
                exit();
            } else {
                echo "Error: " . $con->error;
            }
        }
    }

    $con->close();
    ob_end_flush(); // Flush the output buffer
    ?> -->

</body>
</html>
