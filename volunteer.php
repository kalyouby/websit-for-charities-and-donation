<?php 
include("auth_session.php");

$Names= array(
  '57357'=>"57357 مستشفى",
  'bahyea'=>"مستشفى بهية",
  'Resala'=>"جمعية رسالة",
  'orman'=>"جمعية الارمان",
);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Volunteer Application Form</title>
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css" />
    <style>
          /* Center form on page */
    body {
    }
    .forms{
        display: flex;
      align-items: center;
      justify-content: center;
      height: 60vh;
    }
    form {
        
      width: 400px;
      padding: 20px;
      background-color: #f2f2f2;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    /* Style form elements */
    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }
    input,
    select,
    textarea {
      width: 100%;
      padding: 8px;
      border: none;
      border-radius: 3px;
      box-sizing: border-box;
      margin-bottom: 15px;
    }
    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #3e8e41;
    }
    /* Style error messages */
    .error {
      color: red;
      font-weight: bold;
      margin-bottom: 10px;
    }
    .banner {
  background-image: url('banner-image.jpg');
  background-size: cover;
  background-position: center;
  height: 650px;
  display: flex;
  justify-content: center;
  align-items: center;
  color: #fff;
  text-align: center;
}

.banner h1 {
  font-size: 3rem;
  margin: 0;
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
    <div class="banner">
</div>

<div class="forms">
    <form method="post" action="submit_volunteer_application.php">
      <label for="charity_id">Charity:</label>
      <select name="charity_id" id="charity_id" required>
        <option value="">Select a charity...</option>
        <?php
      include("db.php");
          // Retrieve charities from database
          $result = mysqli_query($con, 'SELECT id, name FROM charities');
          while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['id'] . '">' . $Names[$row["name"]] . '</option>';
          }

          // Close database connection
          mysqli_close($con);
        ?>
      </select>
      <label for="name">Name:</label>
      <input type="text" name="name" id="name" required pattern="[A-Za-z\s]+" title="Name must not contain numbers">
      <label for="email">Email:</label>
      <input type="email" name="email" id="email" required>
      <label for="phone">Phone:</label>
      <input type="tel" name="phone" id="phone" required pattern="[0][0-9]{10}">
      <label for="message">Message:</label>
      <textarea name="message" id="message"></textarea>
      <input type="submit" value="Submit">
      <?php
        // Display error message if form submission failed
        if (isset($_GET['error'])) {
          $error = $_GET['error'];
          switch ($error) {
            case 'empty_fields':
              echo '<p class="error">Please fill in all required fields.</p>';
              break;
            case 'invalid_email':
              echo '<p class="error">Please enter a valid email address.</p>';
              break;
            default:
              break;
          }
        }
      ?>
  </form>
    </div>
 
    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
