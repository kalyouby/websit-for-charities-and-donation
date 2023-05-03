<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Donation</title>
  <link rel="stylesheet" href="styles.css">
  <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
</head>
<body>
  <!-- Navigation Bar -->
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
                <?php 
                if(isset($_SESSION["username"])){
                    echo '
                    <li class="nav-item">
                    <a class="nav-link" style="color: white;background-color: #2b3087;border-radius: 20px;">'.$_SESSION["username"] .'</a>
                    </li>
                    <li class="nav-item">
                                        <a class="nav-link" href="logout.php">logout</a>
                                    </li>
                                
                    ';
                }else{
                    echo'
                    <li class="nav-item">
                    <a class="nav-link" href="login.php">login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registration.php">Register</a>
                </li>
            ';
                }
                ?>
               
                
            </ul>
        </div>
    </nav>

  <!-- Hero Section -->
  <section class="hero">
    <div class="hero-content">
        <br>
        <br>
      <a href="#download" class="button">Download App</a>
    </div>
  </section>

  <!-- Services Section -->
  <section class="services" id="Donation">
    <h2>Donation</h2>
    <div class="service">
      <p>We have collected some charities for you to donate to them easily and safely.</p>
      <img src="box.png" alt="Donation">
      <h3>Volunteer</h3>
      <p>Through the site, you will be able to communicate with all charities to be a volunteer for them.</p>
      <img src="team.png" alt="Volunteer">
    </div>
    </div>
    <div class="service">
      
      <h3>call us</h3>
      <p>For inquiries, suggestions or complaints, please contact us at (01119121605)</p>
      <img src="contact-mail.png" alt="call us">
    </div>
  </section>

  <!-- App Download Section -->
  <section class="download" id="download">
    <h2>Download Our App</h2>
    <p>To facilitate the use of the site, download our application to be able to do all this with ease.</p>
    <a href="#" class="button">Download for iOS</a>
    <a href="#" class="button">Download for Android</a>
  </section>

  <!-- About Section -->
  <section class="about" id="about">
    <h2>About Us</h2>
    <p>"Egypian charities" was established in 2023 as a graduation project for students of computers and information at Misr University for Science and Technology.
The goal of the application is to spread volunteerism and positivity in the community and to spread the message of cooperation in the college and the entire community.</p>
  </section>


  <!-- Footer -->
  <footer>
    <p>&copy; 2023 Donation. All rights reserved.</p>
  </footer>
</body>
</html>

