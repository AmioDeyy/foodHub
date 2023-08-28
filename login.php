<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="style.css">
    <title>Login Page</title>


</head>

<body>
    <header>
        <h3>Sylhet Food Hub</h3>


        <ul class="navbar">
            <li><a href="index.php" class="active">Home</a></li>
            <li><a href="index.php" #about>About Us</a></li>
            <li><a href="resturents.php">Resturants</a></li>

            <li><a href="index.php" #contact>Contact</a></li>
            <!-- <li><a href="#" class="cart"><i class='bx bxs-cart-download'></i></a></li> -->
        </ul>


    </header>
    <br><br><br><br>

    <section class="login">
        <div class="container">

            <div class="login-side">
                <h4>Sign In</h4>
                <form action="loginAction.php" method="post">
                    <label>Email:</label>
                    <input type="email" name="l_email" placeholder="E.g. apu@gmail.com" required />


                    <label>Password:</label>
                    <input type="password" name="l_pass" placeholder="password" required />
<!-- 
                    <div class="forget-pass">

                        <a href="">Forgot your Password!</a>

                    </div> -->
                    <div class="login-submit">
                        <button type="submit" name="login">Sign In</button>
                    </div>
                </form>
            </div>

            <div class="signup-side">
                <h3>Hello Friend!</h3>
                <p>If you have don't have an accoout with us please click the below button.</p>
                <div class="signup-submit">
                    <button class="btn"><a href= "register.php" style="color: white;">Sign Up</a></button>
                

                </div>
            </div>
        </div>
    </section>
</body>

</html>