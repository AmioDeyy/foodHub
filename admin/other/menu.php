<?php include('config/config.php');
include('login_action.php');
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--- CSS file -->
  <link rel="stylesheet" href="css/sytle.css">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Admin Menu/</title>
</head>

<body>


  <nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"></a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item ">
            <a class="nav-link active" aria-current="page" href="admin-home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="manage-admin.php">Admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="manage-category.php">Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="manage-food.php">Food</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="manage-food1.php">Food 1</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="manage-resturant.php">Resturant</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="manageResturant1.php">Resturant 1 </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="manage-order.php">Order</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>