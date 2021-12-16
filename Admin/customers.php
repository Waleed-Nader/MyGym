<?php 
session_start();
if(!isset($_SESSION['user'])){
  header("location:./LI_LO/Login.php");
}

$link = mysqli_connect("localhost", "root", "", "mygym") or die("Error connecting to DB");
$query = "SELECT * FROM users" ;
$results = mysqli_query($link, $query);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Dashboard ADMIN</title>


    

    <!-- Bootstrap core CSS -->
<link href="../CSS/bootstrap.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <link href="../CSS/dashboard.css" rel="stylesheet">
    <script  src='../Scripts/jQuery.js'></script>
    <script  src='../Scripts/Bootstrap.js'></script>
    
    <!-- Custom styles for this template -->
    <link href="../CSS/dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">MY GYM</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search" id="searchBar">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
    <a class="nav-link px-3" href="./LI_LO/logout.php">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="orders.php">
              <span data-feather="file"></span>
              Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="products.php">
              <span data-feather="shopping-cart"></span>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="customers.php">
              <span data-feather="users"></span>
              Customers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="messages.php">
              <span data-feather="bar-chart-2"></span>
              Messages
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="classes.php">
              <span data-feather="bar-chart-2"></span>
              Classes
            </a>
          </li>
        </ul>


      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Members & Customers</h1>

      </div>
<h2>Table</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Full Name</th>
              <th scope="col">Email</th>
              <th scope="col">Subscription Date</th>
              <th scope="col">Subscription type</th>
              <th scope="col">Subscription end</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody id="Container">
       <?php   while($row = mysqli_fetch_assoc($results)){
         ?>
                      <form method='POST'>
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['name']; ?> &nbsp; <?php echo $row['surname']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td><?php echo $row['Subscription date']; ?></td>
              <td><?php echo $row['subscription type']; ?></td>
              <td><?php echo $row['subscription end']; ?></td>
              <td><a href="#EditModal" class="edit" data-bs-toggle="modal">
							<i class="material-icons update" data-toggle="tooltip" 
							data-id="<?php echo $row['id']; ?>"
							data-name="<?php echo $row['name']; ?>"
              data-lastname="<?php echo $row['surname']; ?>"
							data-email="<?php echo $row['email']; ?>"
							data-sdate="<?php echo $row['Subscription date']; ?>"
							data-stype="<?php echo $row['subscription type']; ?>"
              data-sEnd="<?php echo $row['subscription end']; ?>"
							title="Edit">EDIT</i>
						</a></td><td><a href="#staticBackdropLive" data-bs-toggle="modal" data-bs-target="#staticBackdropLive" style="color:red;">
              <b class="delete" data-toggle="tooltip" data-id_d="<?php echo $row['id']; ?>">DELETE</b></a></td>
            </tr>
            </form>
            <?php
          }
  ?>
          </tbody>
        </table>
      </div>

      <!---add-a-subscriber-->
      
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Last name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Subscription Date</th>
                <th scope="col">Subscription type</th>

              </tr>
            </thead>
            <tbody>
            <form method="POST">  <tr>
                <td></td>
                <td><input type="text" name="name" placeholder="Name" required></td>
                <td><input type="text" name="lastName" placeholder="Last Name" required></td>
                <td><input type="email" name="email" placeholder="Email" required></td>
                <td><input type="password" name="password" placeholder="Password" required></td>
                <td><input type="date" name="subscriptiondate" required></td>
                <td><select name="subscriptiontype" required>
                  <option value="" >--Type--</option>
                  <option value="month">Monthly</option>
                  <option value="6months">6 months</option>
                  <option value="1year">1 Year</option>
                </select></td>
                <td><input type="submit" name="add" value="Add"></td>
           
              </tr>
            </tbody>
          </table>
        </div>
      </form>
      
          </div>

    </main>
  </div>
</div>

<?php
$link = mysqli_connect("localhost", "root", "", "mygym") or die("Error connecting to DB");

if(isset($_POST['add']) && $_POST['name']!="" && $_POST['lastName']!="" && $_POST['email']!="" && $_POST['password']!="" && $_POST['subscriptiondate']!="" && $_POST['subscriptiontype']!=""){

    $name= $_POST['name'];
    $lastname=$_POST['lastName'];
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $sDate=$_POST['subscriptiondate'];
    $sType=$_POST['subscriptiontype'];
   if($sType=="month"){ $interval=strtotime("+ 30 days") ; }
   if($sType=="6months"){ $interval=strtotime("+ 6 months") ; }
   if($sType=="1year"){ $interval=strtotime("+ 1 year") ; }
  $sEnd=date('Y-m-d',$interval);
  //check if user exist
  $sq="SELECT*FROM `users` WHERE email='$email'";
  $rs=mysqli_query($link,$sq);
  if(mysqli_num_rows($rs)>0){
    echo "<script>alert('Customer already Exists ');</script>";
    return false;
  }else{ //add user
  $query="INSERT INTO `users`(`name`, `surname`, `email`, `password`, `Subscription date`, `subscription type`, `subscription end`) 
  VALUES ('$name','$lastname','$email','".md5($pass)."','$sDate','$sType','$sEnd')";
if(mysqli_query($link,$query)){
  echo "<script>alert('Successfully Added');</script>";
}

}
}


?>
<!-- Edit Modal HTML -->
<div id="EditModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="update_form">
					<div class="modal-header">						
						<h4 class="modal-title">Edit User</h4>
						<button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">X</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_u" name="id" class="form-control" required>					
						<div class="form-group">
							<label>Name</label>
							<input type="text" id="name_u" name="name" class="form-control" required>
						</div>
            <label>Last Name</label>
							<input type="text" id="lastname_u" name="lastname" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" id="email_u" name="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Subscription date</label>
							<input type="date" id="sdate_u" name="sdate" class="form-control">
						</div>
            <div class="form-group">
							<label>Subscription Type</label>
              <select id="stype_u" name="stype" class="form-control">
              <option value="">--Select Subscription--</option>
                <option value="month">Month</option>
                <option value="6months">6 Months</option>
                <option value="1year">1 Year</option>
              </select>
						</div>
            <div class="form-group">
							<label>Subscription end</label>
							<input type="date" id="sEnd_u" name="sEnd" class="form-control">
						</div>
				
					
					<div class="modal-footer">
					<input type="hidden" value="2" name="Etype">
						<input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-info" id="update">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<!--DELETE MODAL-->
<div class="modal fade" id="staticBackdropLive" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLiveLabel">DELETE USER</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="delete_form" method="POST">
      <div class="modal-body">
        <p>Are you sure you want to DELETE user?</p>
        <input type="hidden" name="id_d" id="id_d" >
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="delete" class="btn btn-primary">DELETE</button>
          </form>
      </div>
    </div>
  </div>
</div>
<script>
    $(document).on('click','.update',function(e) {
		var id=$(this).attr("data-id");
		var name=$(this).attr("data-name");
    var lastname=$(this).attr("data-lastname");
		var email=$(this).attr("data-email");
		var sdate=$(this).attr("data-sdate");
    var stype=$(this).attr("data-stype");
    var send=$(this).attr("data-sEnd");


		$('#id_u').val(id);
		$('#name_u').val(name);
    $('#lastname_u').val(lastname);
		$('#email_u').val(email);
		$('#sdate_u').val(sdate);
    $('#stype_u').val(stype);
		$('#sEnd_u').val(send);
	});
	
	$(document).on('click','#update',function(e) {
		var data = $("#update_form").serialize();
		$.ajax({
			data: data,
            method: "POST",
			url: "./editCustomers.php",
			success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$('#EditModal').modal('hide');
						alert('successfully updated!'); 
                        location.reload();						
					}
					else if(dataResult.statusCode==201){
					   alert(dataResult);
					}
			}
		});
	});
    </script>
<!---delete script--->
<script>
  $(document).ready(function(){
    $(document).on('click','.delete',function(e) {
		var id=$(this).attr("data-id_d");
		
		$('#id_d').val(id);

	});
	
	$(document).on('click','#delete',function(e) {
		var data = $("#delete_form").serialize();
		$.ajax({
			data: data,
            method: "POST",
			url: "./deleteUser.php",
			success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$('#staticBackdropLive').modal('hide');
						alert('User DELETED!'); 
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


    <script>
$(document).ready(function(){
  $("#searchBar").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#Container tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
  </body>
</html>
