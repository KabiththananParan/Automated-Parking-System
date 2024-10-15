<?php
    session_start();
    require '../config.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="./Images/logo.png" type="image/x-icon">

    <link rel="stylesheet" href="../Navbar/nav.css">
    <link rel="stylesheet" href="./login.css">
    <link rel="stylesheet" href="../Footer/footer.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    
</head>
<body>
     <!--Navbar-->

     <div class="navbar">
        <div class="navbar-left">

        <a href="../01.Home/index.html"><img src="./Images/logo.png" alt="logo" width="100px" > </a>

            <h1>e-park</h1>

        </div>

        <div class="navbar-right">
            <div class="right-top">
                <ol>
                    <a href="../04.About US/about.html"><li>About-us</li></a>
                    <a href="../03.Contact US/contact.html"><li>Contact-us</li></a>
                    <a href="../02.FAQs/faqs.html"><li>FAQs</li></a>
                    <a href="#"><li>Login</li></a>
                    <a href="../08.Sign UP/signup.php"><li>Signup</li></a>
                </ol>
            </div>

            <div class="right-bottom">
                <ol>
                    <a href="../06.Parking/parking.html"><li>Parking</li></a>
                    <a href="../05.Pricing/price.html"><li>Pricing</li></a>
                </ol>
            </div>

        </div>
    </div>


    <!--Content-->

    <div class="login">
        <div class="login-card">
            <img src="./Images/logo.png" width="100px">

               
            <div class="login-card-heading">
                <p><span>Welcome Back</span> <br>
                Please enter your details to login.</p>
            </div>
            

            <form id="loginForm" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label>E-mail</label>
                <input class="input" type="email" name="email">
                <br>
                <label>Password</label>
                <input class="input" type="password" name="password">

                <div class="login-settings">
                    <label><input type="checkbox"> Remember Me</label>
                </div>
    
                <input class="submit-btn" type="submit" value="Submit" name="submit_btn">

            </form>
            
           

            <div class="login-card-foot">
                <p>Don't have an account? <span><a href="../08.Sign UP/signup.php">Register</a></span></p>
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
                <li><a href="../04.About US/about.html">About US</a></li>
                <li><a href="../03.Contact US/contact.html">Contact US</a></li>
                <li><a href="../06.Parking/parking.html">Parking</a></li>
                <li><a href="../05.Pricing/price.html">Pricing</a></li>
            </ol>
        </div>

        <div class="footer-rights">
            <p>&copy;2024 e-park. All Rights Reserved. || Design and Development by SLIIT Y1S2 Group - 05</p>
        </div>
    </div>

    <?php

        if (isset($_POST['submit_btn'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $checkAdminEmail = "SELECT * FROM admin WHERE admin_email = '$email'";
            $result = $con->query($checkAdminEmail);

            if ($result->num_rows > 0) {
                $admin = $result->fetch_assoc();
                

                if ($password === $admin['admin_password']) {

                    echo "Login as admin!";
                    Header("Location: ../11. Admin Dashboard/admin.php");
                    exit();
                }
                else {
                    echo "<script>alert('Login password incorrect!');</script>";
                }

            }
            else {    
                $checkEmail = "SELECT * FROM users WHERE email = '$email'";
                $result1 = $con->query($checkEmail);

                if ($result1->num_rows > 0) {

                    $user = $result1->fetch_assoc();
                    $user_id = $user['user_id'];

                    if ($password === $user['password']) {
                        
                        $sql = "INSERT INTO login(user_id, date_time) VALUES ($user_id,NOW())";

                        if($con->query($sql)) {
                            
                            $_SESSION['user_id'] = $user_id;
                            echo "Login Successfully";

                            Header("Location: ../10. User Dashboard/10.0.My Account/account.php");
                            exit();
                        }
                        else {
                            echo "<script>alert('Failed to record your login.');</script>" . $con->error;
                        }
                    }
                    else {
                        echo "<script>alert('Password does not match.');</script>" . $con->error;
                    }

                }
                else {
                    echo "<script>alert('Email not registered. Register First!');</script>" . $con->error;
                    // Header("Location: ../08.Sign UP/signup.php");
                    // exit(); 
                }
            }
        }

        $con->close();

    ?>

<script src="./login.js"></script>

</body>
</html>