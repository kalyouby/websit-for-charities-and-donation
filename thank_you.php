<?php 
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Thank you for your application</title>
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
                    <a class="nav-link" href="volunteer.php">volunteer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: white;background-color: #2b3087;border-radius: 20px;"><?php echo $_SESSION["username"] ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">logout</a>
                </li>
            
            </ul>
        </div>
    </nav>

    <div class="message">
    <h1>Thank you for your volunteer application!</h1>
  <p>We have received your application and will review it shortly.</p>
  <p>Thank you for your interest in volunteering with our charity.</p>
      
    </div>
  </body>
</html>