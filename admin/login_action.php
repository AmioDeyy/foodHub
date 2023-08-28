<!-- <?php
session_start();

if (isset($_POST['login'])) {
    $l_email = $_POST['l_email'];
    $l_pass = $_POST['l_pass'];

    if (empty($l_email) || empty($l_pass)) {
        $_SESSION['login_error'] = "Please fill in all the fields"; // Error message for empty fields
        header('Location: login.php'); // Redirect back to the login page
        exit();
    }

    include('admin/config/config.php');


    // Check if the email and password match a regular user in the database (case-insensitive)
    $result = mysqli_query($conn, "SELECT * FROM register WHERE LOWER(db_email) = '$l_email' AND db_password = '$l_pass'");
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['email'] = $l_email; // Create a session variable for the logged-in user
        header('Location: home copy.php'); // Redirect to the regular user home page
        exit();
    } else {
        $_SESSION['login_error'] = "Invalid Credentials"; // Store the error message in the session
        header('Location: login.php'); // Redirect back to the login page
        exit();
    }
}
?> -->