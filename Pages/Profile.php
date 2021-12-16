<?php 
session_start();
$user=$_SESSION['email'];
$link = mysqli_connect("localhost", "root", "", "mygym") or die("Error connecting to DB");

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>My Gym</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="icon" type="image/x-icon" href="images/iconI.png">
    <link rel='stylesheet' type='text/css' media='screen' href='../CSS/main.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../CSS/bootstrap.css'>
    <script src='../Scripts/Bootstrap.js'></script>
    <script src='../Scripts/jQuery.js'></script>
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
                <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Our Programs.php">Our Programs</a>
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
       $sql="SELECT * FROM `users` WHERE email='$user'"; 
      $result= mysqli_query($link,$sql);
      $row= mysqli_fetch_assoc($result);
      ?>
<fieldset style="color: white;margin:20px 20px 50px 5%">
<form method="POST">
  <label><h3>Your Infos :</h3></label> &nbsp;&nbsp;&nbsp;   <a href="#staticBackdropLive" data-bs-toggle="modal" data-bs-target="#staticBackdropLive" style="margin-left:10%;">
              <b class="update" data-toggle="tooltip" >Edit</b></a><br>
              <div style="margin-left:10%;">
  <b>Name:</b> &nbsp; <?php echo $row['name']." ".$row['surname']; ?><br>
  <b>Age:</b> &nbsp; <?php echo $row['age']?><br>
  <b>Height:</b> &nbsp; <?php echo $row['height']?>&nbsp;Cm<br>
  <b>Weight:</b> &nbsp; <?php echo $row['weight']?>&nbsp;Kg<br>
  <b>Membership:</b> &nbsp; <?php if($row['subscription type']==""){echo "None";}else{ echo $row['subscription type'];}?>
              </div>  
</form>
</fieldset>
<hr style="color:white;">
<!----your orders---->
<div>
<?php
       $sql1="SELECT * FROM `orders` WHERE email='$user'"; 
      $result1= mysqli_query($link,$sql1);
      
      ?>
      <label style="color: white;margin:20px 20px 20px 5%;"><h4>Your Orders:</h4></label>
      <?php if(mysqli_num_rows($result1)==0){echo"<h5 style='color: white;'>--------No Orders---------</h5>";}else{ ?>

      <table class="table" style="color: white;margin:20px 20px 20px 5%;width:60%;">
  <thead>
    <th>Ordered items</th>
    <th>Quantity</th>
    <th>Ordered On</th>
    <th>Status</th>
  </thead>
  <tbody>
    <?php while($row1= mysqli_fetch_assoc($result1)){ ?>
      <tr>
    <td><?php echo $row1['name']?></td>
    <td><?php echo $row1['quantity']?></td>
    <td><?php echo $row1['time']?></td>
    <td><?php echo $row1['status']?></td>
      </tr>
    <?php } ?>
  </tbody>
</table>
</div>
<?php } ?>

<hr style="color:white;">
<!----your msgs ---->
<div>
<?php
       $sql2="SELECT * FROM `contact-us` WHERE email='$user'"; 
      $result2= mysqli_query($link,$sql2);
      
      ?>
      <label style="color: white;margin:20px 20px 20px 5%;"><h3>Your Messages:</h3></label>
<?php if(mysqli_num_rows($result2)==0){echo"<h5 style='color: white;'>--------No Messages Sent---------</h5>";}else{ ?>
      <table class="table" style="color: white;margin:20px 20px 20px 5%;width:60%;">
  <thead>
    <th>Subject</th>
    <th>Your Message</th>
    <th>Reply</th>
  </thead>
  <tbody>
    <?php while($row2= mysqli_fetch_assoc($result2)){ ?>
      <tr>
    <td><?php echo $row2['subject']?></td>
    <td><?php echo $row2['message']?></td>
    <td><?php echo $row2['our-reply']?></td>
      </tr>
    <?php } ?>
  </tbody>
</table>

    </div>
    <?php } ?>
<!---modal-->
<div class="modal fade" id="staticBackdropLive" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLiveLabel">User Data Update</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="update_form" method="POST">
      <div class="modal-body">
        <p><b>Enter Values :</b></p>
        <pre>
        Age:   <input type="number" name="age" id="age" style="width:50px;" ><br>
        Height:<input type="number" name="height" id="weight" style="width:50px;">Cm<br>
        Weight:<input type="number" name="weight" id="weight" style="width:50px;">Kg<br>
        </pre>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="update" class="btn btn-primary">update</button>
          </form>
      </div>
    </div>
  </div>
</div>





<script>
  $(document).ready(function(){

	
	$(document).on('click','#update',function(e) {
		var data = $("#update_form").serialize();
		$.ajax({
			data: data,
            method: "POST",
			url: "./updateUserData.php",
			success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$('#staticBackdropLive').modal('hide');
						alert('All Set!!'); 
                       location.reload();						
					}
					else if(dataResult.statusCode==201){
					   alert(dataResult);
					}
			}
		});
	});
});
    </script>
</body>
</html>
