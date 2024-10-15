
<?php
    
    require '../config.php';
    ob_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-park</title>
    <link rel="shortcut icon" href="./Images/logo.png" type="image/x-icon">

    <link rel="stylesheet" href="../Navbar/nav.css">
    <link rel="stylesheet" href="./signup.css">
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
                    <a href="../07.Login/login.php"><li>Login</li></a>
                    <a href="#"><li>Signup</li></a>
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

    <div class="signup">
        <div class="signup-card">
            <img src="./Images/logo.png" width="100px">

               
            <div class="signup-card-heading">
                <p>Create an Account</p>
            </div>
            

            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label>Name</label>
                <input class="input" type="text" name="name">
                <br>
                <label>Username</label>
                <input class="input" type="text" name="userName">
                <br>
                <label>Phone</label>
                <input class="input" type="text" name="phone">
                <br>
                <label>E-mail</label>
                <input class="input" type="email" name="email">
                <br>
                <label>Password</label>
                <input class="input" type="password" name="password">
                <br>
                <label>DOB</label>
                <input class="input" type="date" name="dob">

                
                <div class="signup-settings">
                    <input type="checkbox" required>
                    <label> I accept <span>Terms and Conditions</span></label>
                </div>

                <input class="submit-btn" type="submit" value="Submit" name="submit_btn">
                <input class="submit-btn" type="reset" value="Reset">
            </form>
            

            <div class="signup-card-foot">
                <p>Have an account? <span><a href="../07.Login/login.php">Login</a></span></p>
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

if (isset($_POST["submit_btn"])) {
    $Name = $_POST["name"];
    $UserName = $_POST["userName"];
    $Phone = $_POST["phone"];
    $Email = $_POST["email"];
    $Password = $_POST["password"];
    $DOB = $_POST["dob"];

    $checkEmail = "SELECT * FROM users WHERE email = '$Email'";
    $result = $con->query($checkEmail);

    $checkUsername = "SELECT * FROM users WHERE user_name = '$UserName'";
    $result2 = $con->query($checkUsername);
    
    if ($result->num_rows > 0) {
        echo "<script>alert('This email is already registered. Please use a different email.');</script>";
    }

    else {

        if ($result2->num_rows > 0) {
            echo "<script>alert('This user name is taken.');</script>";
        }

        else {

            $sql = "INSERT INTO users(name, user_name, email, password, phone, DOB) VALUES ('$Name', '$UserName', '$Email', '$Password', '$Phone', '$DOB')";

            if($con->query($sql)) {
                echo "<script>alert('Account create sucecessfully. Now login with your email.');</script>";
                Header("Location: ../07.Login/login.php");
                exit();   
            }
            else {
                echo "Error: " . $con->error;
            }
        }
    }      
}

$con->close();
ob_end_flush();
?>


    <script src="./signup.js"></script>
</body>
</html>