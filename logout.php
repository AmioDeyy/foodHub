<?php
session_start();
if (isset($_SESSION['username'])) {

    session_start();
    session_destroy();

    echo "<script>location.href = 'login.php'</script>";
} else {
    // echo "<script> alert('Do not access thorugh URL! Login Firs!!')</script>";
    echo "<script>Location.href = 'login.php'</script>";
}

session_start();
session_destroy();

echo "<script> location.href = 'login.php' </script>";
