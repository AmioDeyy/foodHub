<?php
include 'config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendEmail($r_email, $v_code)
{
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';
    require 'PHPMailer/Exception.php';

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'apudeb2000@gmail.com';
        $mail->Password   = 'fobeadbroxvbfdpr';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        $mail->setFrom('apudeb2000@gmail.com', 'DEB');
        $mail->addAddress($r_email);

        $mail->isHTML(true);
        $mail->Subject = 'Email verification from Sylhet Food Hub';
        $mail->Body    = "Thanks for registration!
        Click the link below to verify the email address.
        <a href='http://localhost/Final_Submission/verify.php?r_email=" . urlencode($r_email) . "&v_code=" . urlencode($v_code) . "'> Verify your Email.</a>";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

if (isset($_POST['register'])) {
    $_r_username = $_POST['r_username'];
    $_r_email = $_POST['r_email'];
    $_r_mobile = $_POST['r_mobile'];
    $_r_pass = $_POST['r_pass'];
    $_r_conpass = $_POST['r_conpass'];

    $token = bin2hex(random_bytes(15));

    $pass = password_hash($_r_pass, PASSWORD_BCRYPT);
    $conpass = password_hash($_r_pass, PASSWORD_BCRYPT);



    $duplicateEmailQuery = "SELECT * FROM `register` WHERE db_email = '$_r_email'";
    $duplicate_email = mysqli_query($conn, $duplicateEmailQuery);

    $duplicate_email_count = mysqli_num_rows($duplicate_email);



    if (empty($_r_username) || empty($_r_email) || empty($_r_mobile) || empty($_r_pass) || empty($_r_conpass)) {
        $_SESSION['register_error'] = "Please fill in all the fields"; // Error message for empty fields
        header('Location: register.php'); // Redirect back to the registration page
        exit();
    }

    $username_pattern = "/[A-Za-z .]{3,20}/";
    $phone_pattern = "/(\+88)?-?01[3-9]\d{8}/";
    //$email_pattern = "/(cse|eee|law)_\d{10}@lus\.ac\.bd/";
    $email_pattern = "/^[^@]+@(?:lus\.ac\.bd|gmail\.com)$/";

    // $pass_pattern = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$!%&*_+><]).+$/";
    $pass_pattern = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$!%&*_+><]).{8,}$/";



    if (mysqli_num_rows($duplicate_email) > 0) {
        // echo "email already exists";
        echo "<script> alert('Email already taken!!')</script>";
        echo "<script> location.href = 'register.php' </script>";
        exit();
    }

    if (!preg_match($username_pattern, $_r_username)) {
        echo "<script> alert('User Name is Only char (3-20)!!')</script>";
        echo "<script> location.href = 'register.php' </script>";
        exit();
    }

    if (!preg_match($email_pattern, $_r_email)) {
        echo "<script> alert('Wrong Email!!')</script>";
        echo "<script> location.href = 'register.php' </script>";
        exit();
    }

    if (!preg_match($phone_pattern, $_r_mobile)) {
        echo "<script> alert('Wrong Phone No!!')</script>";
        echo "<script> location.href = 'register.php' </script>";
        exit();
    }

    if (!preg_match($pass_pattern, $_r_pass)) {
        echo "<script> alert('Provide a proper password!!')</script>";
        echo "<script> location.href = 'register.php' </script>";
        exit();
    }

    if ($_r_pass != $_r_conpass) {
        echo "<script> alert('Password and confirm password do not match!!')</script>";
        echo "<script> location.href = 'register.php' </script>";
        exit();
    }


    $v_code = bin2hex(random_bytes(16));

   
    $insertQuery = "INSERT INTO `register`(`db_username`, `db_email`, `db_mobile`, `db_password`, `verification_code`, `is_verified`) VALUES ('$_r_username','$_r_email','$_r_mobile','$_r_pass','$v_code','0')";


    if (mysqli_query($conn, $insertQuery) && sendEmail($_POST['r_email'], $v_code)) {
        echo "<script> alert('Successfully Registered!') </script>";
        echo "<script> location.href = 'login.php'</script>";
    } else {
        echo "<script> alert('Not inserted!') </script>";
        echo "<script> location.href = 'register.php'</script>";
    }
}
