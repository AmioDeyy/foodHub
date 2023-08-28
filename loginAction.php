<?php
include 'config.php';
session_start();

if (isset($_POST['login'])) {
    $l_email = $_POST['l_email'];
    $l_pass = $_POST['l_pass'];



    
    $qur = "SELECT * FROM `register` WHERE `db_email` = '$l_email' AND `db_password` = '$l_pass'";
    $result = mysqli_query($conn, $qur);
    $userRow = mysqli_fetch_assoc($result);
  
    if(mysqli_num_rows($result)>0){
        if ($userRow['is_verified'] == 1 && ($l_pass == $userRow['db_password']))
        {
            $_SESSION['email'] = $l_email; // Create a session variable for the logged-in user
            header('Location: home.php'); // Redirect to the regular user home page
            exit();
        }
        else {
            $_SESSION['login_error'] = "Invalid Credentials or Email not verified";
            header('Location: login.php');
         
        }
    }else {
            $_SESSION['login_error'] = "User not found";
            header('Location: login.php');
            exit();
        }


}
?>
