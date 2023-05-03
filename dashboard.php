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
    <br>
    <!-- Slideshow container -->
<div class="slideshow-container">

<!-- Full-width images with number and caption text -->
<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="banner1.jpg" style="width:100%">
  <div class="text">التطوع ينقذ </div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="banner2.png" style="width:100%">
  <div class="text">تبرعك ينقذ حياه اسره</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="banner3.jpg" style="width:100%">
  <div class="text">(وجعلنا من الماء كل شيئ حي)</div>
</div>

<!-- Next and previous buttons -->
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
<span class="dot" onclick="currentSlide(1)"></span>
<span class="dot" onclick="currentSlide(2)"></span>
<span class="dot" onclick="currentSlide(3)"></span>
</div>

    <br>
    <div class="container">
      <div class="row">
      <?php 
    include("db.php");

    // Perform the SQL statement
$sql = "SELECT * FROM `charities`";
$result = $con->query($sql);

// Output the results
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {

     echo '<div class="col-md-4">
          <div class="card">
            <img
              class="card-img-top"
              src="'. $row["image"].'"
              alt="Card image cap"
            />
            <div class="card-body">
            <h5 class="card-title">'. $Names[$row["name"]].'</h5>
            <p class="card-text"> Got : '. $row["got"].'</p>
            <p class="card-text"> Target : '. $row["Target"].'</p>
              <a href="donate.php?id='.$row['id'].'" class="btn btn-primary">Donate now</a>
            </div>
          </div>
          </div>'
          ;
    }
  } 
    ?>
        </div>
     
        
      </div>
    </div>
    <!-- jQuery and Bootstrap JS -->
    <script>
      let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 3000); // Change image every 2 seconds
}
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
