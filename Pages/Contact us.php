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
    <link rel='stylesheet' type='text/css' media='screen' href='../CSS/Contact.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../CSS/bootstrap.css'>
    <script  src='../Scripts/jQuery.js'></script>

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
                <a class="nav-link" aria-current="page" href="..\index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="..\Pages\Our Programs.php">Our Programs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="..\Store\Store.php">Store</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="..\Pages\Contact us.php">Contact us</a>
              </li>
            </ul>
            <div class="text-end">
            <?php if ( isset( $_SESSION['email'] ) ) { ?><a href="./Profile.php"><img src="../images/ProfPic.png" style="width: 40px;"></a>
<?php } ?>
<?php if(isset($_SESSION['email'])){ ?>
              <input type="button" class="btn btn-outline-light me-2"
onclick="location.href='../LoginRegister/logout.php'" value="Logout"> <?php }else{ ?>
  <input type="button" class="btn btn-outline-light me-2" onclick="location.href='../LoginRegister/login.php'" value="Login" > <?php } ?>
<button type="button" onclick="location.href='../LoginRegister/registration.php'" class="btn btn-warning"<?php if(isset($_SESSION['email'])){ echo('style="display: none;"'); }  ?> >Sign-up</button>
            </div>
          </div>
        </div>
      </nav>

      <!---response--->
      <div id="Container">

      </div>
            <section class="mb-4">

        <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
        <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
            a matter of hours to help you.</p>
    
        <div class="row">
    
            <div class="col-md-9 mb-md-0 mb-5">
                <form id="contact-form" action="" name="contact-form" method="POST">
    
                    <div class="row">
    
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="text" id="name" name="name" class="form-control">
                                <label for="name" class="">Your name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="email" id="email" name="email" class="form-control" value="<?php if(isset($_SESSION['email'])){ echo $_SESSION['email']; } ?>">
                                <label for="email" class="">Your email</label>
                            </div>
                        </div>
    
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form mb-0">
                                <input type="text" id="subject" name="subject" class="form-control">
                                <label for="subject" class="">Subject</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
    
                        <div class="col-md-12">
    
                            <div class="md-form">
                                <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                                <label for="message">Your message</label>
                            </div>
    
                        </div>
                    </div>
                    <div class="text-center text-md-left">
                <input type="submit" class="btn btn-primary" name="send" value="Send">              </div>
                <div class="status"></div>
            </div>
    
                </form>
    
            <div class="col-md-3 text-center">
                <ul class="list-unstyled mb-0">
                    <li><i class="fas fa-map-marker-alt fa-2x"></i>
                        <p>Nahr Ibrahim, MT 10004, LEB</p>
                    </li>
    
                    <li><i class="fas fa-phone mt-4 fa-2x"></i>
                        <p>+ 961 29 351 357</p>
                    </li>
    
                    <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                        <p>MyGym@worldfitness.com</p>
                    </li>
                </ul>
            </div>
    
        </div>
    
    </section>


    <?php
    if(isset($_POST['send'])){

$link = mysqli_connect("localhost", "root", "", "MyGym") or die("DB Connection error");

if(!empty( $_POST['name'])){
$name = mysqli_real_escape_string($link,$_POST['name']); }else{ echo"<script>alert('You must fill in the name')</script>"; return false; }
if(!empty( $_POST['email'])){
$email = mysqli_real_escape_string($link,$_POST['email']); }else{ echo"<script>alert('You must enter a valid email')</script>"; return false; }
if(!empty( $_POST['subject'])){
  $subject = mysqli_real_escape_string($link,$_POST['subject']); }else{ echo"<script>alert('You must enter a subject')</script>"; return false; }
if(!empty( $_POST['message'])){
$message = mysqli_real_escape_string($link,$_POST['message']); }else{ echo"<script>alert('You must fill a message')</script>"; return false; }



$query="INSERT INTO `contact-us`(`name`, `email`, `subject`, `message`) 
VALUES ('$name','$email','$subject','$message')";
if($link){
    mysqli_query($link,$query);
    echo"<script>alert('Message successfully Sent , We will contact you very soon')</script>";
}else{ echo"<script>alert('Error Sending message, Check your connection!!')</script>" ; }
    }
?>
<hr style="color:white;">
<iframe
  width="1000"
  height="450"
  style="border:3px;margin-left:10%;"
  loading="lazy"
  allowfullscreen
  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCn6hShgzIhGA7dC0Q9g07fj6qrSTiRWkc
    &q=Nahr+Ibrahim">
</iframe>
    </body>
    <hr style="color:white;">

    <footer class="text-center text-white">
  <!-- Grid container -->
  <div class="container p-4">
    <!-- Section: Social media -->
      <!-- Facebook -->
      <a class="btn btn-floating m-1" href="www.facebook.com/MyGym" role="button"
        ><img src="../images/R.png" width="30px"></img></a>

      <!-- Twitter -->
      <a class="btn btn-floating m-1" href="www.twitter.com/MyGym" role="button"
        ><i class="fab fa-twitter"><img src="../images/T.png" width="30px"></i
      ></a>

     <!-- Instagram -->
      <a class="btn btn-floating m-1" href="www.instagram.com/MyGym" role="button"
        ><i class="fab fa-instagram"><img src="../images/i.png" width="30px"></i
      ></a>


      <!-- Github -->
      <a class="btn btn-floating m-1" href="www.github.com/MyGym" role="button"
        ><i class="fab fa-github"><img src="../images/G.png" width="40px"></i
      ></a>
    <!-- Section: Social media -->

   

    <!-- Section: Text -->
      <p>
        Do not hesitate to contact us , we are here to help and make the best of your fitness experience with our professional team
      </p>
  



  <!-- Copyright -->
  <div class="text-center p-3" >
    © 2021 Copyright:
    <a class="text-white" href="https://www.myGym.com/">MyGym.com</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
</html>