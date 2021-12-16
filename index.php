<?php 
session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>My Gym</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="icon" type="image/x-icon" href="images/iconI.png">
    <link rel='stylesheet' type='text/css' media='screen' href='CSS/main.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='CSS/bootstrap.css'>
    <script src='Scripts/main.js'></script>
    <script src='Scripts/jQuery.js'></script>
    <script src='Scripts/Bootstrap.js'></script>
</head>
<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark" aria-label="Second navbar example">
        <div class="container-fluid">
          <a class="navbar-brand" href="">My Gym</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
    
          <div class="collapse navbar-collapse" id="navbarsExample02">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Pages\Our Programs.php">Our Programs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Store\Store.php">Store</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Pages\Contact us.php">Contact us</a>
              </li>
            </ul>
            <div class="text-end">
<?php if ( isset( $_SESSION['email'] ) ) { ?><a href="./Pages/Profile.php"><img src="./images/ProfPic.png" style="width: 40px;"></a>
<?php } ?>
<?php if(isset($_SESSION['email'])){ ?>
              <input type="button" class="btn btn-outline-light me-2"
onclick="location.href='LoginRegister/logout.php'" value="Logout"> <?php }else{ ?>
  <input type="button" class="btn btn-outline-light me-2" onclick="location.href='LoginRegister/login.php'" value="Login" > <?php } ?>
              <button type="button" onclick="location.href='LoginRegister/registration.php'" class="btn btn-warning"<?php if(isset($_SESSION['email'])){ echo('style="display: none;"'); }  ?> >Sign-up</button>
            </div>
          </div>
        </div>
      </nav>
      <?php
      if ( isset( $_SESSION['email'] ) ) {
  // Grab user data from the database using the email
  // Let them access the "logged in only" pages
  echo('<span class="badge rounded-pill bg-success">You are Signed in as '.$_SESSION['email'].'</span>');
} else {
 echo('<span class="badge rounded-pill bg-warning text-dark">Sign in or Register</span>');
}
?>
 <div class="left-caption" style="opacity: 0.5;">
   <h1 id="txtup">SHAPE <br>
   YOUR MUSCLES 
   <br>WITH US</h1>
   <h5>We Have 1000 sqr meters<br>
        to exercice and improve.</h5>
 </div>
 <script>
   $(document).ready(function(){
    $(".left-caption").animate({
    marginLeft: '250px',
    opacity: '1',
    

  },3000);
});
 </script>
      <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
        <div class="feature col">
          <div class="feature-icon bg-primary bg-gradient">
            <svg class="bi" width="1em" height="1em"><use xlink:href="#collection"></use></svg>
          </div>
          <h2><b><u>Our training schedule</u></b></h2>
          <p>We have a variety of training classes throughout the week and one on one personal trainers to follow your progress and improve your skill set.
           <br> Plus the first session is <b>Free</b>
          </p>
          <a href="Pages/Our Programs.php" class="icon-link">
            Check our programs
            <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"></use></svg>
          </a>
        </div>
        <div class="feature col">
          <div class="feature-icon bg-primary bg-gradient">
            <svg class="bi" width="1em" height="1em"><use xlink:href="#people-circle"></use></svg>
          </div>
          <h2><b><u>Supplements Store:</u></b></h2>
          <p>We have a wide range of supplements from Whey,Mass gainers, Amino acids to Vitamins... <br>
          All at the very best price you can get!</p>
          <a href="Store/Store.php" class="icon-link">
            Visit our Store Here!
            <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"></use></svg>
          </a>
        </div>
        <div class="feature col">
          <div class="feature-icon bg-primary bg-gradient">
            <svg class="bi" width="1em" height="1em"><use xlink:href="#toggles2"></use></svg>
          </div>
          <h2><b><u>Contact Us:</u></b></h2>
          <p>Do not heistate to contact us at any times for more questions,
            We will get back to you as soon as possible,
            99% of our customers were satisfied with our customer care services.
          </p>
          <a href="Pages/Contact us.php" class="icon-link">
            Contact Us Now!
            <svg class="bi" width="1em" height="1em"><use xlink:href="#chevron-right"></use></svg>
          </a>
        </div>
      </div>
</body>
<hr style="color: white;">
<footer class="text-center text-white">
  <!-- Grid container -->
  <div class="container p-4">
    <!-- Section: Social media -->
      <!-- Facebook -->
      <a class="btn btn-floating m-1" href="www.facebook.com/MyGym" role="button"
        ><img src="./images/R.png" width="30px"></img></a>

      <!-- Twitter -->
      <a class="btn btn-floating m-1" href="www.twitter.com/MyGym" role="button"
        ><i class="fab fa-twitter"><img src="./images/T.png" width="30px"></i
      ></a>

     <!-- Instagram -->
      <a class="btn btn-floating m-1" href="www.instagram.com/MyGym" role="button"
        ><i class="fab fa-instagram"><img src="./images/i.png" width="30px"></i
      ></a>


      <!-- Github -->
      <a class="btn btn-floating m-1" href="www.github.com/MyGym" role="button"
        ><i class="fab fa-github"><img src="./images/G.png" width="40px"></i
      ></a>
    <!-- Section: Social media -->

   

    <!-- Section: Text -->
      <p>
        Do not hesitate to <a href="./Pages/Contact us.php">contact us</a> , we are here to help and make the best of your fitness experience with our professional team
      </p>
  



  <!-- Copyright -->
  <div class="text-center p-3" >
    © 2021 Copyright:
    <a class="text-white" href="https://www.myGym.com/">MyGym.com</a>
  </div>
  <!-- Copyright -->
</footer>
</html> 