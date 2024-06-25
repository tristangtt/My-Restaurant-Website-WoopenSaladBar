<!-- Student Name: Hsin Tang
     File Name: Contact.php
     Stuednt Number: 041111914
     Edit Date: 2024.Apr.01
     Description: This page is for the customer feedback or contact form.-->


<?php require_once('abstractDAO.php'); ?>
<?php require_once('feedback.php'); ?>
<?php require_once('feedbackDAO.php'); ?>

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
        
        // If no errors, proceed with registration
        if (!$hasError) {
            $feedbackDAO = new feedbackDAO();
            $addSuccess = $feedbackDAO->addContact($_POST['name'], $_POST['email'], $_POST['topic'], $_POST['message']);
            if ($addSuccess) {
                echo '<script>alert("Feedback submitted successfully!");</script>';
                // Redirect or display success message
            } else {
                echo '<script>alert("Failed to submit feedback. Please try again.");</script>';
                // Show error message
            }
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Group8">
        <link rel="stylesheet" href="../../CSSFiles/Style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Woopen Salad Bar - Help</title> 
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
                <a href="Contact.php">Contact</a>
                <a href="../Register/Register.php" class="register">Register</a>
            </div>
        </div> <hr>

        <!-- Heading Section -->
        <div class = "top-area">
            <h1>Salad Support Center! 🥗</h1><br>
            <h3>For any questions, inquiries, or to provide feedback, please fill out the form below. ❤️</h3>
        </div> 

        <!--Form Section-->
        <div class="container">
            <h1>Contact Us</h1><br>
            <form action="Contact.php" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="topic">Select a Topic:</label>
                <select id="topic" name="topic" required>
                    <option value="" disabled selected>Select a topic</option>
                    <option value="General Inquiry">In-store order</option>
                    <option value="Technical Support">Online/Delivery order</option>
                    <option value="Feedback">Feedback</option>
                </select>

                <label for="message">Comments</label>
                <textarea id="message" name="message" rows="8" required></textarea>

                <input type="submit" name="Submit" id="Submit" value="Submit" class="button">
                <input type="reset" name="Reset" id="Reset" value="Reset" class="button">
            </form>
        </div>


        <!-- Contact Area -->
        <div class = "contact">  
            <p>Follow Us</p>
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

    </body>
</html>