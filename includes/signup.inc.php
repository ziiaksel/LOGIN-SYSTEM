<?php


if (isset($_POST["submit"])) {
    // if the form submit the 
    //proper way it acces to file signup.inc.php 
$userName = $_POST["txt"];
$email= $_POST["email"];
$password = $_POST["pswd"];

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if (emptyInputSignUp($userName,$email,$password)!== false) {

    header("location: ../register.php?error=emptyinput");
    exit();
}

if (invalidusername($userName)!== false) {
  
    header("location: ../register.php?error=invalidusernam");
    exit();
}
if (invalidemail($email)!== false) {
    header("location: ../register.php?error=invalidemail");
    exit();
} 
if (invalidpassword($password)!== false) {
    header("location: ../register.php?error=invalidpassword");
    exit();
}
// check if username already exists
if (uidexists($conn,$userName,$email)!== false) {
    header("location: ../register.php?error=usernamealreadytaken");
   exit();
}
createUser($conn,$userName,$email,$password);

} else {
//if not deny access to it and redirectt to
    header("location: ../register.php");
    exit();
}
