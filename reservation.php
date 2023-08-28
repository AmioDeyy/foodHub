<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Table Reservation</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>

    <h1>Restaurant Table Reservation</h1>
    <form action="reservation.php" method="post">
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>Date</td>
                <td><input type="date" name="date"></td>
            </tr>
            <tr>
                <td>Time</td>
                <td><input type="time" name="time"></td>
            </tr>
            <tr>
                <td>Number of people</td>
                <td><input type="number" name="people"></td>
            </tr>
            <tr>
                <td>Notes</td>
                <td><textarea name="notes"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $people = $_POST['people'];
    $notes = $_POST['notes'];

    // Save the reservation to the database
    $sql = "INSERT INTO reservations (name, date, time, people, notes) VALUES ('$name', '$date', '$time', '$people', '$notes')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Reservation successfully submitted!";
    } else {
        echo "Error submitting reservation.";
    }
}
?>