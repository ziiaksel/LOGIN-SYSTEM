<?php


session_start();
unset($_SESSION["loggedin"]);
unset($_SESSION["userName"]);
header("Location:index.html");