<?php
    require '../config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedbags</title>

    <link rel="shortcut icon" href="./Images/logo.png" type="image/x-icon">

    <link rel="stylesheet" href="../Navbar/nav.css">
    <link rel="stylesheet" href="./feedbags.css">
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

    <!--Feedbags-->

    <div class="container">
        <h2>Feedbacks</h2>

        <div class="feedbags">

        <div class="text-area">
            <p>
                Please leave your feedbacks here...
            </p>
            
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <textarea name="msg" value="" id="feedbag" rows="17" cols="50">
                </textarea>

                <input id="btn" type="submit" name="submit_btn" value="Submit">
            </form>

            <p id="thanks"></p>
        </div>
        </div>

    </div>

    <?php
    if (isset($_POST["submit_btn"])) {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            echo "User is not logged in";
        } else {
            $user_id = $_SESSION['user_id'];
        }

        $message = $_POST["msg"];

        $sql = "INSERT INTO feedack(user_id, feedback_msg) VALUES ('$user_id', '$message')";
        if($con->query($sql)) {
            echo "Feedback sent.";
            header("Location: ../10.0.My Account/account.php");
            exit();
        }
        else {
            echo "Error: " . $con->error;
        }

    }
    
    $con->close();

    ?>

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


    <script src="./feedbags.js"></script>
    
</body>

</html>