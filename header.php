
<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Basic Header</title>

	<link rel="stylesheet" href="header.css">
	<!-- <link rel="stylesheet" href="assets/header-fixed.css"> -->
	<link href='https://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
	<!-- icons -->
	<link rel="stylesheet" href="iconmon/style.css">

</head>

<body>

	<header class="brand-navigation">
		<div class="content">
			<!-- logo -->
		  <nav>
			<ul class="navigation">

			  <?php
			 if (isset($_SESSION["loggedin"])) {
			echo '<div class="nav_container">';
			  echo '<li><a class="nav-link" href="#">Welcome User</a></li>';
			  echo '<li><a lass="nav-link" href="../logout.php">Log Out <span class="icon-sign-out"></span></a></li>';
		echo '</div>';
			  
			 } else {
				echo '<li><a href="../register.php">REGISTER OR LOGIN</a></li>';
			 }	
			 
			//  if (isset($_SESSION['username']) && isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			// 	echo "Welcome, " . htmlspecialchars($_SESSION['username']);
			//   } else {
			// 	header('Location: login.php');
			// 	exit;
			//   }
			
			 ?>
			 <!-- In this example, the function showUsername checks 
			 if the $_SESSION['username'] and $_SESSION['logged_in'] 
			 variables are both set and that $_SESSION['logged_in'] is equal to true. If both conditions are met, the username is displayed with a welcome message after being sanitized with htmlspecialchars() to prevent against XSS attacks. If not, 
			 the user is redirected to the login page.This function provides a more secure approach to checking if a user is logged in, as it requires two conditions to be met instead of just one. Additionally, sanitizing the output of the username
			 helps to prevent against security vulnerabilities. -->




			</ul>
		  </nav>
		
		</div>
	  </head<a<er>

<!-- You need this element to prevent the content of the page from jumping up -->
<div class="header-fixed-placeholder"></div>

<!-- The content of your page would go here. -->
</body>
</html>


