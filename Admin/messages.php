<?php
session_start();
if(!isset($_SESSION['user'])){
  header("location:./LI_LO/Login.php");
}
?>
<?php

$link = mysqli_connect("localhost", "root", "", "mygym") or die("Error connecting to DB");
$query = "SELECT * FROM `contact-us`" ;

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

    
    <!-- Custom styles for this template -->
    <link href="../CSS/dashboard.css" rel="stylesheet">
    <script  src='../Scripts/jQuery.js'></script>
    <script  src='../Scripts/Bootstrap.js'></script>
    

  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">MY GYM</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" id="searchBar" placeholder="Search" aria-label="Search">
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
            <a class="nav-link" href="customers.php">
              <span data-feather="users"></span>
              Customers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="messages.php">
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
        <h1 class="h2">Messages and Reply interface</h1>

      </div>


      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Full Name</th>
              <th scope="col">Email</th>
              <th scope="col">Subject</th>
              <th scope="col" >Text</th>
              <th scope="col">Your reply</th>
              <th scope="col" ></th>
            </tr>
          </thead>
          <tbody id="Container">
              <?php
          while($row = mysqli_fetch_assoc($results)){

            ?>
             <form method='POST'>
   <tr>
   <td><?php echo $row['id']; ?></td>
   <td><?php echo $row['name'] ?></td>
   <td><?php echo $row['email'] ?></td>
   <td><?php echo $row['subject'] ?></td>
   <td><?php echo $row['message'] ?></td>
   <td><?php echo $row['our-reply'] ?></td>

   <td><a href="#ReplyModal" class="edit" data-bs-toggle="modal">
							<i class="material-icons update" data-toggle="tooltip" 
							data-id="<?php echo $row['id']; ?>"
							data-name="<?php echo $row['name']; ?>"
							data-email="<?php echo $row['email']; ?>"
							data-subject="<?php echo $row['subject']; ?>"
							data-reply="<?php echo $row['our-reply']; ?>"
							title="Edit">REPLY</i>
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



    </div>
</main>
</div>
</div>

<!-- Edit Modal HTML -->
<div id="ReplyModal" class="modal fade">
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
						<div class="form-group">
							<label>Email</label>
							<input type="email" id="email_u" name="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Subject</label>
							<input type="text" id="subject_u" name="subject" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Reply</label>
							<input type="text" id="reply_u" name="reply" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
					<input type="hidden" value="2" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-info" id="update">Reply</button>
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
        <h5 class="modal-title" id="staticBackdropLiveLabel">DELETE Message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="delete_form" method="POST">
      <div class="modal-body">
        <p>Are you sure you want to DELETE Message?</p>
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
		var email=$(this).attr("data-email");
		var subject=$(this).attr("data-subject");
		var reply=$(this).attr("data-reply");

		$('#id_u').val(id);
		$('#name_u').val(name);
		$('#email_u').val(email);
		$('#subject_u').val(subject);
		$('#reply_u').val(reply);
	});
	
	$(document).on('click','#update',function(e) {
		var data = $("#update_form").serialize();
		$.ajax({
			data: data,
            method: "POST",
			url: "./reply.php",
			success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$('#ReplyModal').modal('hide');
						alert('Message successfully sent!'); 
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
			url: "./deleteMsg.php",
			success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$('#staticBackdropLive').modal('hide');
						alert('Message DELETED!'); 
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
    $("#container tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</body>
</html>
