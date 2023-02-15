<!-- Create a PHP script to handle user login. -->
<?php
// Start a session
session_start();
// Get the user inputs
$username = $_POST['username'];
$password = $_POST['pswdlogin'];
require_once 'dbh.inc.php';
require_once 'functions.inc.php';
// Connect to the database
// $conn = mysqli_connect("host", "user", "password", "database");

// Prepare a query to retrieve user information
$query = "SELECT * FROM users WHERE userName=?";

// Prepare the statement
$stmt = mysqli_prepare($conn, $query);

// Bind the parameters to the query
mysqli_stmt_bind_param($stmt, "s", $username);

// Execute the statement
mysqli_stmt_execute($stmt);

// Get the result
$result = mysqli_stmt_get_result($stmt);

// Fetch the result as an associative array
$user = mysqli_fetch_assoc($result);
if ($user && password_verify($password, $user['userPass'])) {
  // If the password is correct, store the username in the session
  $_SESSION['userName'] = $username;

  // Redirect to the home page
  header("Location: ../user_profile/profile.php");
} else {
  // If the password is incorrect, show an error message
  $error = "Your-Login-Name-OR-Password-is-invalid";
}
// Verify the password
//         $matchPass =  $userAlreadyExistInDb["userPass"];    
//         // if these matched return false "notmatch"
//         $chekPass = password_verify($password,$matchPass);
//         if ($chekPass === false) {
//             header("location: ../index.html?error=password-doesnt-match");
//             exit();

// if ($user && password_verify($password, $hashPass)) {
//   // If the password is correct, store the username in the session
//   $_SESSION['userName'] = $username;

//   // Redirect to the home page
//   header("Location: ../profile.php");
// }

?>