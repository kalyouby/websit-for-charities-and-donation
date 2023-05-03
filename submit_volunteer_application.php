<?php
include("db.php");
  // Retrieve form data
  $charity_id = $_POST['charity_id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $message = $_POST['message'];



  // Insert data into database
  $result = mysqli_query($con, "INSERT INTO volunteer_applications (charity_id, name, email, phone, message) VALUES ($charity_id, '$name', '$email', '$phone', '$message')");

  // Close database connection
  mysqli_close($con);

  // Redirect user to thank-you page
  header('Location: thank_you.php');
?>
