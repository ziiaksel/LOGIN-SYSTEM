

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>
<div class="login-parent">
<form method="post" action="includes/sec_login.inc.php">
		<label for="chk" aria-hidden="true">Login</label>
		<input type="text" name="username" placeholder="Email or username" required>
		<input type="password" name="pswdlogin" placeholder="Password" required>
		<button name="submit" type="submit">Login</button>
		<?php
			// if (isset($_GET["error"])) {
			// if ($_GET["error"]== "incorectpasswordoremail") {
			// 	echo "<p class='error'>Introduce correct passoword/email</p>";
			// }
	
			// 	else if ($_GET["error"]== "wronglogin") {
			// 		echo "<p class='error'>somthing went wrong,try gain</p>";
			// 	}}
						?>
				</form>  
</div>
   
</body>
</html>