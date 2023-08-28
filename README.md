<?php
include 'config.php'; // Include the configuration file which contains database connection settings
session_start(); // Start a new session or resume the existing session

if (isset($_POST['login'])) { // Check if the form with name 'login' has been submitted
    $l_email = $_POST['l_email']; // Get the email input value from the submitted form
    $l_pass = $_POST['l_pass']; // Get the password input value from the submitted form

    // Construct a SQL query to check if the email and password match a user in the 'register' table
    $qur = "SELECT * FROM `register` WHERE `db_email` = '$l_email' AND `db_password` = '$l_pass'";
    $result = mysqli_query($conn, $qur); // Execute the SQL query using the database connection

    // Fetch the first row of the query result as an associative array
    $userRow = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) { // Check if there's at least one matching user in the result
        if ($userRow['is_verified'] == 1 && ($l_pass == $userRow['db_password'])) {
            // Check if the user is verified and if the entered password matches the stored password
            $_SESSION['email'] = $l_email; // Create a session variable to store the user's email
            header('Location: resturents.php'); // Redirect to the regular user home page
            exit(); // Stop further execution of the script
        } else {
            // If the user is not verified or the entered password is incorrect
            $_SESSION['login_error'] = "Invalid Credentials or Email not verified";
            header('Location: login.php'); // Redirect back to the login page with an error message
        }
    } else {
        // If no user with the provided email and password combination was found in the result
        $_SESSION['login_error'] = "User not found";
        header('Location: login.php'); // Redirect back to the login page with an error message
        exit(); // Stop further execution of the script
    }
}
?>
