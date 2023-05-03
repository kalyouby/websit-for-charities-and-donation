<?php

$hostname     = "localhost"; // enter your hostname
$username     = "root";  // enter your table username
$password     = "usbw";   // enter your password
$databasename = "charites";  // enter your database
// Create connection 
$con = new mysqli($hostname, $username, $password,$databasename);
 // Check connection 
if ($con->connect_error) { 
die("Unable to Connect database: " . $con->connect_error);
 }
?>