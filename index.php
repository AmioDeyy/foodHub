<?php include('admin/config/config.php'); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Sylhet Food Hub</title>

	<link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;200;300;400;500;600;700&family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="style.css">

</head>

<body>

	<!---header--->
	<header>
		<h3>Sylhet Food Hub</h3>

		<ul class="navbar">
			<li><a href="#home" class="active">Home</a></li>
			<li><a href="#about">About Us</a></li>
			<li><a href="#menu">Menu</a></li>
			<li><a href="#blog">Blog</a></li>
			<li><a href="#contact">Contact</a></li>
		</ul>

		<div class="top-btn">
			<a href="login.php">SIGN IN</a>
			<a href="register.php">SIGN UP</a>
		</div>
	</header>

	<!---home--->
	<section class="home" id="home">
		<div class="home-text">
			<h3>Welcome to Sylhet Food Hub</h3>
			<h1>Enjoy Your Day</h1>
		</div>

		<div class="home-img">
			<img src="img/2.jpg">
		</div>
	</section>

	<!---about--->
	<section class="about" id="about">
		<div class="about-text">
			<h3>About Us</h3>
			<h2>SYLHET FOOD HUB</h2>
			<p> <B>Welcome to Sylhet Food Hub, an enchanting dining destination perfectly located in of Sylhet</B>.</p>

		</div>
	</section>

	<!---menu--->
	<section class="menu" id="menu">
		<div class="center-text">
			<h3>Our Food Menu</h3>
			<h2>Delicious Food</h2>
		</div>

		<?php
		$sql = "SELECT * FROM table_food WHERE active='Yes'";

		//Execute the Query
		$res = mysqli_query($conn, $sql);

		//Count Rows
		$count = mysqli_num_rows($res);

		if ($count > 0) {
			while ($row = mysqli_fetch_assoc($res)) {
				//Get the Values
				$id = $row['id'];
				$title = $row['title'];
				$description = $row['description'];
				$price = $row['price'];
				$image_name = $row['image_name'];
		?>
				<div class="menu-content ">

					<div class="box">
						<div class="box-content">
							<div class="box-img">
								<?php
								if ($image_name == "") {
									echo "<div class='error'>Image not Available.</div>";
								} else {
								?>
									<img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="food" width="100px" height="150">
								<?php
								}
								?>

							</div>

							<div class="box-text">
								<h4><?php echo $title; ?></h4>
								<p style="color:aquamarine;"><?php echo $description; ?></p>
								<h6>৳<?php echo $price; ?></h6>

							</div>

						</div>
					</div>
			<?php
			}
		} else {
			echo "<div class='error'>Food not found.</div>";
		}
			?>

	</section>


	<!---contact--->
	<section class="contact" id="contact">
		<div class="contact-box">
			<h3>Sylht Food Hub</h3>
			<h5>Connect With Us</h5>

			<div class="social">
				<a href="https://www.facebook.com/imdeb99/"><i class='bx bxl-facebook'></i></a>
				<a href="#"><i class='bx bxl-instagram-alt'></i></a>

			</div>

		</div>

		<div class="contact-box"> </div>

		<div class="contact-box"> </div>

		<div class="contact-box address">
			<h3>Conatct</h3>
			<i class='bx bxs-map'><span>Sylhet , City</span></i>
			<i class='bx bxs-envelope'><span>amiodey10@gmail.com</span></i>
			<i class='bx bxs-phone'><span>+88 01744338833</span></i>
		</div>

	</section>

	<div class="end-text">
		<p>© Sylhet Food Hub 2023 . All Rights Reserved.</p>
	</div>

	<script type="text/javascript" src="js/script.js"></script>

</body>

</html>