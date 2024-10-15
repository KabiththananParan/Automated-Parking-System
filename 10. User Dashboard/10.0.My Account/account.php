<?php

session_start();
require '../config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../2.Login/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT name, email, phone, DOB FROM users WHERE user_id = $user_id";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "Error fetching user details: " . $con->error;
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>

    <link rel="shortcut icon" href="./Images/logo.png" type="image/x-icon">

    <link rel="stylesheet" href="../Navbar/nav.css">
    <link rel="stylesheet" href="./account.css">
    <link rel="stylesheet" href="../Footer/footer.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

</head>

<body>
<!--Navbar For Login USERS-->

    <div class="navbar">
        <div class="navbar-left">

        <a href="../10.1.Home/index.html"><img src="./Images/logo.png" alt="logo" width="100px" ></a>

            <h1>e-park</h1>

        </div>

        <div class="navbar-right">
            <div class="right-top">
                <ol>
                    <a href="../10.3.Feedbags/feedbags.php"><li>Feedback</li></a>
                    <a href="../10.2.FAQs/faqs.html"><li>FAQs</li></a>
                    <a href="../10.6.Pricing/price.php"><li>BOOK NOW</li></a>
                </ol>

                    <a href="#"><img src="./Images/user.png" width="80px"></a>
                
            </div>

            <div class="right-bottom">
                <ol>
                    <a href="../10.7.Parking/parking.html"><li>Parking</li></a>
                    <a href="../10.6.Pricing/price.php"><li>Payment</li></a>
                </ol>
            </div>

        </div>
    </div>



    <!--User - Dashboard-->

    <div class="dashboards">

        <div class="dashboard-navication">
            <ol>
                <li><button class="btn-1">My Account</button></li>
                <li><button class="btn-2">My Bookings</button></li>
                <li><button class="btn-3">My Feedbacks</button></li>
            </ol>
        </div>

        <!--Dashboard-1 My Account-->
        <div class="dashboard-1">
                <div class="dashboard-1-top">
                    <div class="details">
                        <p>Name</p>
                        <button><?php echo $user['name']; ?></button>
                    </div>
        
                    <div class="details">
                        <p>Email</p>
                        <button><?php echo $user['email']; ?></button>
                    </div>
        
                    <div class="details">
                        <p>DOB</p>
                        <button><?php echo $user['DOB']; ?></button>
                    </div>
        
                    <div class="details">
                        <p>Phone</p>
                        <button><?php echo $user['phone']; ?></button>
                    </div>
                </div>

                <div class="dashboard-1-bottom">
                <form method="post" action="editAccount.php">
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                    <input type="submit" class='btn-edit' value="Edit Account">
                </form>

                <br><br>
                
                <form method="post" action="deleteAccount.php">
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                    <input type="submit" class="btn-delete" value="Delete Account">
                </form>
                </div>
        </div>

        <!--Dashboard-2 Bookings-->

        <div class="dashboard-2">
            <div class="dashboard-2-container">

                <div class="bookings">
                    <div>

                    <?php
                        $user_id = $_SESSION['user_id'];

                        $sql = "SELECT payment_id, full_name, invoice_no, total_amount FROM payment WHERE $user_id = user_id"; 
                        $result = $con->query($sql);
                        
                        if (!$result) {
                            echo "Error: " . $con->error;
                        } 
                        elseif ($result->num_rows > 0) {
                            echo "<ol class='booking-list'>";
                            
                            while ($row = $result->fetch_assoc()) {
                                echo "<li> Payment ID : " . $row["payment_id"] . "</li>";
                                echo "<li> Full Name : " . $row["full_name"] . "</li>";
                                echo "<li> Invoice No : " . $row["invoice_no"] . "</li>";
                                echo "<li> Total_amount : " . $row["total_amount"] . "</li>";

                                echo "<li>
                                    <form method='post' action='cancelBooking.php'>
                                        <input type='hidden' name='payment_id' value='" . $row['payment_id'] . "'>
                                        <input type='submit' class='btn-delete' value='Cancel Booking'>
                                    </form>
                                  </li>";
                                echo "<br>";
                            }
                            echo "</ol>";
                        } 
                        else {
                            echo "No results found.";
                        }

                    ?>
    
                    </div>
                </div>
            </div>
        </div>


        <!--Dashboard-3 Feedback-->

        <div class="dashboard-3">

            <div class="dashboard-3-container">
                    
                        <?php
                        $user_id = $_SESSION['user_id'];

                        $sql = "SELECT feedback_id,	feedback_msg FROM feedack WHERE $user_id = user_id"; 
                        $result = $con->query($sql);
                        
                        if (!$result) {
                            echo "Error: " . $con->error;
                        } 
                        elseif ($result->num_rows > 0) {
                           
                            
                            while ($row = $result->fetch_assoc()) {
                                echo "<ol>";
                                echo "<li>Feedback ID :" . $row["feedback_id"] . "</li>";
                                echo "<br>";
                                echo "<li>Feedback :" . $row["feedback_msg"] . "</li>";

                                echo "<br> <br>";

                                echo "<form method='post' action='editFeedback.php'>";
                                echo "<input type='hidden' name='feedback_id' value='" . $row["feedback_id"] . "'>";
                                echo "<input class='edit-feedback' type='text' name='feedback_msg' value='" . $row["feedback_msg"] . "' required>";
                                echo "<button type='submit' class='btn-edit'>Edit</button>";
                                echo "</form>";

                                echo "<br> <br>";

                                echo "<form method='post' action='deleteFeedback.php'>";
                                echo "<input type='hidden' name='feedback_id' value='" . $row["feedback_id"] . "'>";
                                echo "<button type='submit' class='btn-delete'>Delete</button>";
                                echo "</form>";

                                echo "<br>";
                                echo "<ol>";
                            }
                                
                        } 
                        else {
                            echo "No results found.";
                        }

                    ?>
            </div>

        </div>

    </div>
    

    <!--Footer-->

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

    <script src="./account.js"></script>



    
</body>

</html>