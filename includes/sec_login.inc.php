<?php
  
  $username = $_POST["username"];
  $password = $_POST["pswdlogin"];

  require_once 'dbh.inc.php';

//   $conn = mysqli_connect("hostname", "username", "password", "authe");
  
  $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE userName=? AND userPass=?");
  mysqli_stmt_bind_param($stmt, "ss", $username, $password);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  
  if (mysqli_num_rows($result) > 0) {
    //user exists, start a session and redirect to dashboard or home page
    session_start();
    $_SESSION["loggedin"] = true;
    // echo "Welcome, " . htmlspecialchars($_SESSION['username']) = $username;
    $_SESSION["userName"] = $username;
    header("location: ../user_profile/profile.php");
  } else {
    //user doesn't exist, redirect to login page with an error message
    header("location: ../index.php?error=Invalid---Login");
  }
  
  mysqli_close($conn);
  
?>
