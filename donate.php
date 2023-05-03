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
    <title>Charities</title>
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css" />
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
    <br>
    <br>
    <div class="container">
      <div class="row">
      <?php 
    include("db.php");
$id=$_GET['id'];
    // Perform the SQL statement
$sql = "SELECT * FROM `charities` where `id`=$id";
$result = $con->query($sql);

// Output the results
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
      echo '<div class="col-md-4">
      <form  action="complete.php" method="POST" class="card">
        <img
          class="card-img-top"
          src="'. $row["image"].'"
          alt="Card image cap"
        />
        <div class="card-body">
        <h5 class="card-title">'. $Names[$row["name"]].'</h5>
        <p class="card-text"> Got : '. $row["got"].'</p>
        <p class="card-text"> Target : '. $row["Target"].'</p>
        <input type="number" class="form-control" name="amount" >
        <input type="hidden" id="id" name="id" value="'.$row['id'].'">
        <br>
        <label for="payment-method">Payment Method</label>
        <!-- HTML code -->
        <select id="payment-method" class="form-control" name="payment-method" required>
          <option value="">--Select--</option>
          <option value="vodafone-cash">Vodafone Cash</option>
          <option value="visa">Visa</option>
        </select>
        <br>
        <div  class="form-group" id="vcash" style="display:none;">
          <label for="vodafone-cash-number">Vodafone Cash Number:</label>
          <input type="tel" id="vodafone-cash-number" name="vodafone-cash-number" pattern="010[0-9]{8}|02[0-9]{8}" required>
          <br>

        </div>
        
        <div class="form-group" id="visa" style="display:none;">
        <label for="visa-number">Visa Number:</label>
        <input type="text" name="visa-number" id="visa-number" pattern="4[0-9]{12}(?:[0-9]{3})?" required>
        <br>
        <label for="visa-expiry">Visa Expiry:</label>
        <input type="text" name="visa-expiry" id="visa-expiry">
        <br>
        </div>

        
        <script>
          // JavaScript code
          const paymentMethod = document.querySelector("#payment-method");
          const vcash = document.querySelector("#vcash");
          const visa = document.querySelector("#visa");
        
          paymentMethod.addEventListener("change", () => {
            if (paymentMethod.value === "vodafone-cash") {
              vcash.style.display = "block";
              visa.style.display = "none";
              if(!document.getElementById("vodafone-cash-number").hasAttribute("required")) {
                document.getElementById("vodafone-cash-number").setAttribute("required");
              }
              document.getElementById("visa-number").removeAttribute("required");

            } else if (paymentMethod.value === "visa") {
              vcash.style.display = "none";
              visa.style.display = "block";
              if(!document.getElementById("visa-number").hasAttribute("required")) {
                document.getElementById("visa-number").setAttribute("required");
              }
              document.getElementById("vodafone-cash-number").removeAttribute("required");
            } else {
              vcash.style.display = "none";
              visa.style.display = "none";
              
            }
          });
        </script>
        <input type="submit" name="submit" value="Donate now" class="btn btn-primary">
        </div>
        </form>  
      
      ';
      
    }
  } 
  ?>
        </div>
     
        
      </div>
    </div>

<!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
