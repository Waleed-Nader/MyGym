<?php 
session_start();


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Our Programs</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../CSS/Programs.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../CSS/bootstrap.css'>
    <script src='../Scripts/OurPrograms.js'></script>
    <script src="../Scripts/Bootstrap.js"></script>
    <script src="../Scripts/jQuery.js"></script>
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
                <a class="nav-link" aria-current="page" href="../index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="Our Programs.php">Our Programs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="..\Store\Store.php">Store</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Contact us.php">Contact us</a>
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
      <?php
      if ( isset( $_SESSION['email'] ) ) {

  echo('<span class="badge rounded-pill bg-success">You are Signed in as '.$_SESSION['email'].'</span>');
} else {
 echo('<span class="badge rounded-pill bg-warning text-dark">Sign in or Register</span>');
}
?>

<!--carousel-->

<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style="width: 80%;margin:10px 0 5px 10%;">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../images/OIP.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../images/OIP1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../images/OIP2.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!---/carousel-->
<div id="getresponse"  style=" position: -webkit-sticky;
    position: sticky; top: 0;z-index: 999;"></div>
<hr style="color:white;">
<h4 style="color:white; margin-left:10%;">Membership plans:</h4>
<!---membership-plans--->
      <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
        <div class="col" style="width: 300px;">
          <div class="card mb-4 rounded-3 shadow-sm">
            <div class="card-header py-3">
              <h4 class="my-0 fw-normal">Free</h4>
            </div>
            
            <div class="card-body">
              <h1 class="card-title pricing-card-title">$0<small class="text-muted fw-light">/Trial</small></h1>
              <ul class="list-unstyled mt-3 mb-4">
                <li>1st Session is Free </li>
                <li> Gym Access</li>
                <li>Guided tour around the facility</li>
                <li>Help from our Personal Trainers</li>
              </ul>

            </div>

          </div>
        </div>
        <div class="col" style="width: 300px;">
          <div class="card mb-4 rounded-3 shadow-sm">
            <div class="card-header py-3">
              <h4 class="my-0 fw-normal">1 Month Membership</h4>
            </div>
            <div class="card-body">
              <h1 class="card-title pricing-card-title">$25<small class="text-muted fw-light">/mo</small></h1>
              <ul class="list-unstyled mt-3 mb-4">
                <li>Gym access</li>
                <li>Free towel</li>
                <li>Personal trainer support</li>
                <li>1 Free BMI test</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col" style="width: 300px;">
          <div class="card mb-4 rounded-3 shadow-sm border-primary">
            <div class="card-header py-3 text-white bg-primary border-primary">
              <h4 class="my-0 fw-normal">1 Year</h4>
            </div>
            <div class="card-body">
              <h1 class="card-title pricing-card-title">$200<small class="text-muted fw-light">/yr</small></h1>
              <ul class="list-unstyled mt-3 mb-4">
                <li>Gym access</li>
                <li>Free towel</li>
                <li>Personal trainer support</li>
                <li>Unlimited classes attendance</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
<!---/membership-plans--->
<hr style="color:white;">

      <!---classes--->
      <h4 style="color:white; margin-left:10%;">Our Classes :</h4><br><br>
<small class="classes-price" style="color:white;">*note that each class is for <b>20$</b> per session*</small>
<script>
  $(document).ready(function(){
var b = $('.classes-price');
function move(){
  b.animate({ 
    marginLeft:'900px', 
    fontSize : '20px',
  },4000).animate({
     marginLeft:'150px',
     fontSize : '15px',
        },4000)
}
setInterval(move,500);
});

 </script>
<!---while-loop-/class-title/class-description-/image/Days/-booking-button/--->
<div style="padding-left: 12%;">
<?php 
$link = mysqli_connect("localhost", "root", "", "mygym") or die("Error connecting to DB");
$query= "SELECT * FROM `classes`"; 
$results = mysqli_query($link, $query);
while($row=mysqli_fetch_assoc($results)){
 ?>
 <form method="POST">
<div class="col" style="margin:10px 10px 10px 10px;width:330px;height: 330px;float:left;">
        <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
         style="background-position:center;background-size: cover;;background-image: url('<?php echo $row['class_image']; ?>');">
          <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1" >
            <h2 > <?php echo $row['Class_name']; ?></h2><br><br><br><br><small> <b>With instructor:</b>&nbsp; <?php echo $row['Class_Coach']; ?></small><br>
            <ul class="d-flex list-unstyled mt-auto">
              <li class="me-auto">
              <a href="#BookModal" class="btn btn-info" data-bs-toggle="modal">
							<b class="material-icons update" data-toggle="tooltip" 
							data-id="<?php echo $row['id']; ?>"
							data-Cname="<?php echo $row['Class_name']; ?>"
							title="Edit">BOOK</b>
						</a>   </li>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <li class="d-flex align-items-center">
                <img src="../images/bootstrap-icons/calendar3.svg" class="bi me-2" >
                <small><?php echo $row['Class_time']; ?></small>
              </li>
            </ul>
          </div>
        </div>
      </div>
      </form>
      <!----/classes--->
      <?php } ?>
      </div>
      <!-- Edit Modal HTML -->
<div id="BookModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="update_form" method="POST">
					<div class="modal-header">						
						<h4 class="modal-title">BOOK</h4>
						<button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">X</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_u" name="id" class="form-control" required>					
            <input type="hidden" id="Cname" name="Cname" class="form-control" required>					
            <div class="form-group">
							<label>Name</label>
							<input type="text" id="name_u" name="name" class="form-control" minlength="3" required>
						</div>
            <div class="form-group">
							<label>Last Name</label>
							<input type="text" id="Lname_u" name="Lname" class="form-control" minlength="3" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" id="email_u" name="email" class="form-control" minlength="6" required>
						</div>
            <div class="form-group">
							<label>Phone</label>
							<input type="text" id="phone_u" name="phone" class="form-control" minlength="8" required>
						</div>
            <div class="condition">

            </div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-info" id="update">BOOK</button>
					</div>
				</form>
			</div>
		</div>
	</div>

      <hr style="color: white;">
</body>

</html>
<script>
$(document).ready(function(){
    $(document).on('click','.update',function(e) {
		var id=$(this).attr("data-id");
		var Cname=$(this).attr("data-Cname");
		$('#id_u').val(id);
    $('#Cname').val(Cname);

	});
	
  
      $(document).on("click","#update",function(e) {
        e.preventDefault();
                    var form=$(this).closest("#update_form");
                    var name= form.find("#name_u").val();
                    var Lname= form.find("#Lname_u").val();
                    var id= form.find("#id_u").val();
                    var Cname= form.find("#Cname").val();
                    var email= form.find("#email_u").val();
                    var phone= form.find("#phone_u").val();
                 
 if(name==""){
  alert("Please enter a value for the \"Name\".");
  return false;
 }
 if(Lname==""){
  alert("Please enter a value for the \"Last Name\".");
  return false;
 }
 if(email=="")
 {
  alert("Please enter an email");
  return false;
 }
 if(phone=="")
 {
  alert("Please enter a Phone number");
  return false;
 }
 if(phone.length<8){ 
  alert("Please enter a valid Phone number");
  return false;
  }
                    $.ajax({
                        method: "POST",
                        url: "BookScript.php",
                        data: "name=" + name+ "&Lname=" + Lname+ "&Cname="+Cname+ "&email="+email+ "&phone="+phone,
                        success: function(response) {
                          $('#BookModal').modal('hide');
                           $("#getresponse").html(response);
                        }
                    });


                });
        });
    
</script>
    </script>