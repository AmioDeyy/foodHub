<?php include('admin/config/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Home</title>

</head>

<body>
  <header>
    <h3>Sylhet Food Hub</h3>


    <ul class="navbar">
      <li><a href="<?php echo SITEURL; ?>index.php">Home</a></li>
      <!-- <li><a href="<?php echo SITEURL; ?>categories.php">Categories</a></li> -->
      <li><a href="resturents.php">Resturant</a></li>
      <li><a href="foods.php">Food</a></li>
      <li><a href="<?php echo SITEURL; ?>login.php">Logout</a></li>

    </ul>

  </header>
</body>

</html>