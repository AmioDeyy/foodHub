<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="style.css">
    <title>Register Page</title>
</head>

<body>

    <header>
        <h3>Sylhet Food Hub</h3>


        <ul class="navbar">
            <li><a href="index.php" class="active">Home</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="#menu">Menu</a></li>
            <li><a href="#blog">Blog</a></li>
            <li><a href="index.php" #contact>Contact</a></li>
            <!-- <li><a href="#" class="cart"><i class='bx bxs-cart-download'></i></a></li> -->
        </ul>


    </header>
    <section class="login">
        <div class="container">
            <div class="signup-side">
                <h3>Hello Friend!</h3>
                <p>Do you have an account with us.</p>
                <div class="signup-submit">
                <button class="btn"><a href="login.php" style="color: white;">Sign In</a></button>


                </div>
            </div>
            <div class="login-side">
                <h4>Sign Up</h4>
                <form action="registerAction.php" method="post">

                    <label> Name:</label>
                    <input type="text" name="r_username" placeholder="Enter Your Name" required />

                    <label> Email:</label>
                    <input type="email" name="r_email" placeholder="Enter Your Email" required />

                    <label>Mobile:</label>
                    <input type="tel" name="r_mobile" placeholder="Enter your Mobile" required />

                    <label>Password:</label>
                    <input type="password" name="r_pass" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$!%&*_+><]).{8,}$" title="Must contain at least one number, one uppercase and lowercase letter, one special character (@#$!%&*_+><), and at least 8 characters." required />


                    <label>Confirm password:</label>
                    <input type="password" name="r_conpass" placeholder="Enter Your Confirm Password" required />

                    <div class="login-submit">
                        <button type="submit" name="register">Sign Up</button>
                    </div>
                </form>
            </div>

        </div>
    </section>
</body>



<!---custom js link--->
<script type="text/javascript" src="js/script.js"></script>


</html>