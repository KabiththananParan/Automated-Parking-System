<?php
    session_start();
    require '../config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prices</title>

    <link rel="shortcut icon" href="./Images/logo.png" type="image/x-icon">

    <link rel="stylesheet" href="../Navbar/nav.css">
    <link rel="stylesheet" href="./price.css">

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

    <!--Pricing-->
    <h1 class="price-hed">Pricing</h1>

    <div class="packages">

        <form method="POST" action="../10.8.Payment/payment.php" class="packages-basic">
                <h2>Basic</h2>
                <p><span>Rs.499</span> / Hour</p>

                <ol>
                    <li>24/7 Access to parking</li>
                    <li>1 Vechile Slot</li>
                    <li>Mobile notification support</li>
                    <li>Basic securing feature</li>
                </ol>

                <input type="hidden" name="package" value="Basic">
                <button type="submit"  class="btn-1">Subscribe</button>
        </form>

        <form method="POST" action="../10.8.Payment/payment.php" class="packages-pro">
            <h2>Pro</h2>
            <p><span>Rs.799</span> / Hour</p>

            <ol>
                <li>24/7 Access to parking</li>
                <li>3 Vechile Slot</li>
                <li>Mobile notification support</li>
                <li>Advanced securing feature</li>
                <li>EV charging station</li>
            </ol>

            <input type="hidden" name="package" value="Pro">
            <button type="submit" class="btn-2">Subscribe</button>
        </form>

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
</body>

</html>