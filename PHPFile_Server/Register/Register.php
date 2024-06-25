<!-- Student Name: Hsin Tang
     File Name: Register.php
     Stuednt Number: 041111914
     Edit Date: 2024.Apr.01
     Description: This page is for the customer register account.-->

<?php require_once('abstractDAO.php'); ?>
<?php require_once('User.php'); ?>
<?php require_once('UserDAO.php'); ?>


<?php
    // Check if form submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Tracks errors with the form fields
        $hasError = false;
        // Array for our error messages
        $errorMessages = array();

        // Check for email format
        $email = $_POST['email'];
        if ($email == "" || !preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
            $hasError = true;
            if ($email == "") {
                $errorMessages['emailError'] = 'X Please enter an email address.';
            } else {
                $errorMessages['emailError'] = 'X Email address should be in the format xyz@xyz.xyz.';
            }
        }
        
        
        // Check for password format
        $password = $_POST['password'];
        if ($password == "" || !preg_match("/^(?=.*[a-z])(?=.*[A-Z])[A-Za-z\d]{8,}$/", $password)) {
            $hasError = true;
            if ($password == "") {
                $errorMessages['passwordError'] = 'X Please enter a valid password.';
            } elseif (strlen($password) < 8) {
                $errorMessages['passwordError'] = 'X Password must be at least 8 characters long.';
            } elseif (!preg_match("/[a-z]/", $password)) {
                $errorMessages['passwordError'] = 'X Password must contain at least one lowercase letter.';
            } elseif (!preg_match("/[A-Z]/", $password)) {
                $errorMessages['passwordError'] = 'X Password must contain at least one uppercase letter.';
            }
        }

        // Check if terms are agreed
        if (!isset($_POST['agree_terms'])) {
            $hasError = true;
            $errorMessages['termsError'] = 'X You must agree to the terms and conditions.';
        }

        // If no errors, proceed with registration
        if (!$hasError) {
            $userDAO = new UserDAO();
            // Assuming you have a function to add user to database in userDAO
            $addSuccess = $userDAO->addUser($_POST['email'], $_POST['password']);
            if ($addSuccess) {
                echo '<script>alert("Registration successful!");</script>';
                // Redirect or display success message
            } else {
                echo '<script>alert("Registration failed. Please try again.");</script>';
                // Display error message
            }
        }
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Group8">
        <link rel="stylesheet" href="../../CSSFiles/Style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Woopen Salad Bar - Register Your Account</title>
    </head>

    <body>
        <!--Header-->
        <div class="header">
            <div class="logo-container">
                <img src="../../images/logo.png" alt="Salad logo" >
            </div>

            <div class="header-right">
                <!-- Navigation -->
                <a href="../../HTMLFiles/index.html">Home</a>
                <a href="../../HTMLFiles/Menu.html">Menu</a>
                <a href="../Order/Order.php">Order</a>
                <a href="../Contact/Contact.php">Contact</a>
                <a href="Register.php">Register</a>
            </div>
        </div> <hr>

        <!-- Heading Section -->
        <div class = "top-area">
            <h1>Please register your account here!</h1><br>
        </div> 
        
        <div class="container">        
            <form method="post" action="Register.php">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <?php 
                // If there was an error with the email field, display the message
                if(isset($errorMessages['emailError'])){
                    echo '<span style=\'color:red\'>' . $errorMessages['emailError'] . '</span>';
                }
                ?>

                <label for="password">Password:</label>
                <span style="color: red;">* Must be 8 characters long and contain at least one uppercase and lowercase.</span>
                <input type="password" id="password" name="password" required>
                <?php 
                // If there was an error with the password field, display the message
                if(isset($errorMessages['passwordError'])){
                    echo '<span style=\'color:red\'>' . $errorMessages['passwordError'] . '</span>';
                }
                ?>
 
                <br><br>
                <label>
                    <input type="checkbox" id="receive_news" name="receive_news">
                    I wish to receive Woopen news on my e-mail
                </label>
                <br>

                <label>
                    <input type="checkbox" id="agree_terms" name="agree_terms" onclick="showTermsPopup()">
                    I agree to the terms and conditions
                </label>
                <?php 
                // If there is an error with the agree_terms field, show a message
                if(isset($errorMessages['termsError'])){
                    echo '<span style=\'color:red\'>' . $errorMessages['termsError'] . '</span>';
                }
                ?>


                <input type="submit" name="Submit" id="Submit" value="Register" class="button">
                <input type="reset" name="Reset" id="Reset" value="Reset" class="button">
            </form>
        </div>
            
            
            <!-- Contact Area -->
            <div class = "contact">  
                <p>Follow Us<p>
                <div class="contact-icon">
                    <!-- social media icons-->
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                </div>
            </div>

            <!-- Footer -->
            <footer>
                <p>© 2024 Group8. All rights reserved.</p>
            </footer>            



            <script>
            function showTermsPopup() {
                var agreeCheckbox = document.getElementById("agree_terms");
                if (agreeCheckbox.checked) {
                    // If you agree to the terms, display the rules pop-up window
                    var rulePopup = confirm("Terms and Conditions\n\nWelcome to Woopen! \nPlease read these terms carefully before using our service.\n\n1. You must be at least 18 years old to use our service.\n2. Your personal information will be handled according to our Privacy Policy.\n\nDo you agree to the Terms and Conditions?");
                    if (!rulePopup) {
                        // If you do not agree to the terms, uncheck the Agree to terms checkbox
                        agreeCheckbox.checked = false;
                    }
                }
            }
            </script>
        
    </body>
</html>
