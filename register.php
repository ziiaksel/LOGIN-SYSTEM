
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sign up / Login Form</title>
  <link rel="stylesheet" href="style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
<div class="announcment">
    <p>Website is still under maintenance don't use any Sensitive Information !</p>
  </div>
<?php 
include 'header.php';
?>
<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form method="post" action="includes/signup.inc.php">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="txt" placeholder="User name" required>
					<input type="email" name="email" placeholder="Email" required>
					<input type="password" name="pswd" placeholder="Password" required>
					<button name="submit" type="submit">Sign up</button>
					<?php
						if (isset($_GET["error"])) {
						if ($_GET["error"]== "usernamealreadytaken") {
							echo "<p class='error'>This username is already taken</p>";
						}
						elseif ($_GET["error"]== "invalidpassword") {
							echo "<p class='error'>password must be 8-16 characters long and contain one uppercase and one lowercase character</p>";
						}
						elseif ($_GET["error"]== "invalidemail") {
							echo "<p class='error'>Must write valid email</p>";
						}
						elseif ($_GET["error"]== "signfailed") {
							echo "<p class='error'>Something went wrong,Please try again</p>";
						}
						elseif ($_GET["error"]== "YOU-ARE-REGISTRED") {
							// must redirect to welcome page
							echo "<p class='success'>You registered succefully</p>";
							

                           

						}
					  }
						?>
				</form>
			</div>

</body>
</html>

<div class="login">
<?php
include 'login.php'
?>
			</div>


	</div><!-- partial -->
  
</body>
</html>
