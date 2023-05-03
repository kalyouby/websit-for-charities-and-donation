<?php
    include("db.php");
    include("auth_session.php");
    $user=$_SESSION["username"];
    if (isset($_POST['submit'])){
      $id = $_POST['id'];
      $amount = $_POST['amount'];
      $paymentMethod = $_POST["payment-method"];
      // Get the user ID
      $sql = "SELECT `id` FROM `users` WHERE `username` = '$user'";
      $result = $con->query($sql);    
      $row = $result->fetch_assoc()['id'];
      
      // Insert the donation
      date_default_timezone_set('Africa/Cairo');
      $date = date('y-m-d h:i:s');
      $sql = "INSERT INTO `donations`(`user_id`, `charity_id`, `amount`, `donation_date`,`payment_method`) VALUES ('$row', '$id', '$amount', '$date', '$paymentMethod')";
      $result = $con->query($sql);
      
      if ($result && mysqli_affected_rows($con) > 0) {
        $sql = "SELECT  `got`, `Target` FROM `charities` WHERE `id` = '$id' ";
        // Execute the SQL statement
        $result = $con->query($sql);

        // Check if the result contains any rows
        if ($result->num_rows > 0) {
            // Output the data of the first row
            $row = $result->fetch_assoc();
            $got= floatval($row["got"])+floatval($amount);
            $Target=floatval($row['Target'])-floatval($amount);
            $sql="UPDATE `charities` SET `got` =$got,`Target` =$Target WHERE `id` =$id ";
            $result = $con->query($sql);
            // Check if the query was successful
            if (mysqli_affected_rows($con) > 0) {
                       // Query was successful, and at least one row was inserted
          $message1="Donation Complete";
          $message2="Thank you for your donation!";
   
            } else {
                // Query failed or no rows were inserted
                $message1="Donation failed";
                $message2="Please Try again!";
                echo " Update failed !";
            }
        } else {
                    // Query failed or no rows were inserted
                    $message1="Donation failed";
                    $message2="Please Try again!";
        }
      } else {
          // Query failed or no rows were inserted
          $message1="Donation failed";
          $message2="Please Try again!";
      }
      
      
    }
    // $id=$_GET['id'];
    // $amount=$_GET['amount'];

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Donation Complete</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css" />
    <style>
      body {
    
      }

      .message {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        text-align: center;
      }

      h1 {
        font-size: 48px;
        margin-bottom: 24px;
      }

      p {
        font-size: 24px;
      }
    </style>
  </head>

  <body>
  <nav class="navbar navbar-expand-md navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php">Egyptian Charities</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Donate</a>
                </li>
                <li class="nav-item">
                <li class="nav-item">
                    <a class="nav-link" href="volunteer.php">volunteer</a>
                </li>
                    <a class="nav-link" style="color: white;background-color: #2b3087;border-radius: 20px;"><?php echo $_SESSION["username"] ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">logout</a>
                </li>
            
            </ul>
        </div>
    </nav>

    <div class="message">
      <h1><?php echo $message1; ?></h1><br>
      <p><?php echo $message2 ;?></p>

    </div>
  </body>
</html>

     
