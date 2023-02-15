<?php 
//  create databases connection 5 
$serverName = "localhost";
$dbName = "root";
$dbPass = "";
$databasename = "authsystem";
$conn = mysqli_connect($serverName, $dbName, $dbPass, $databasename);
// check connectionw

if (!$conn) {
    die("connection failed". mysqli_connect_errno());
}
