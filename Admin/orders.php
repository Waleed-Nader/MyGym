<?php
session_start();
if(!isset($_SESSION['user'])){
  header("location:./LI_LO/Login.php");
}
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
<script  src='../Scripts/jQuery.js'></script>
    <script  src='../Scripts/Bootstrap.js'></script>
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
            <a class="nav-link active" href="orders.php">
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
        <h1 class="h2">Dashboard</h1>

      </div>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Status</th>
              <th scope="col">ID</th>
              <th scope="col">Email</th>
              <th scope="col">Full Name</th>
              <th scope="col">Address</th>
              <th scope="col">Phone</th>
              <th scope="col">Payment method</th>
              <th scope="col">Item name</th>
              <th scope="col">Item code</th>
              <th scope="col">Item Price</th>
              <th scope="col">Quantity</th>
              <th scope="col">Order Time</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody id="container">
      <?php   
       $link = mysqli_connect("localhost", "root", "", "mygym") or die("Error connecting to DB");
$query = "SELECT * FROM orders" ;
$results = mysqli_query($link, $query);
while($row = mysqli_fetch_assoc($results)){ ?>
<form method='POST'>						
            <tr <?php if($row['status']=="Not available"){ echo"style='background-color:red;'"; }
                       if($row['status']=="Done"){ echo"style='background-color:green;'"; } ?>>
              <td><?php echo($row['status']); ?></td>
              <td><?php echo($row['id']); ?></td>
              <td><?php echo($row['email']); ?></td>
              <td><?php echo($row['firstname']." ".$row['lastname']); ?></td>
              <td><?php echo($row['address']);echo($row['province']); ?></td>
              <td><?php echo($row['phone']); ?></td>
              <td><?php if($row['paymentMethod']=='card'){ echo"<a href='#cardModal' class='ccn' data-bs-toggle='modal' data-bs-target='#cardModal' data-id_cc='"."$row[id]"."'>Card</a>";}else{ echo($row['paymentMethod']); }  ?></td>
              <td><?php echo($row['name']); ?></td>
              <td><?php echo($row['code']); ?></td>
              <td><?php echo($row['price']); ?></td>
              <td><?php echo($row['quantity']); ?></td>
              <td><?php echo($row['time']); ?></td>
<td><a href="#EditModal" class="edit" data-bs-toggle="modal">
						<b><i class="material-icons update" data-toggle="tooltip" 
							data-id="<?php echo $row['id']; ?>"
							data-email="<?php echo $row['email']; ?>"
              data-status="<?php echo $row['status']; ?>"
														title="Edit">SET STATUS</i></b></a></td>
            <td><a href="#staticBackdropLive" data-bs-toggle="modal" data-bs-target="#staticBackdropLive" style="color:red;">
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



<div id="EditModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="update_form">
					<div class="modal-header">						
						<h4 class="modal-title">Edit Status</h4>
						<button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">X</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id" name="id" class="form-control" required>					
						<input type="hidden" id="email" name="email" class="form-control" required>					
          </div>
            <div class="form-group">
							<label>Choose status</label>
              <select id="status" name="status" class="form-control" required>
              <option value="">--Select Status--</option>
                <option value="Available">Available</option>
                <option value="Not available">Not available</option>
                <option value="Canceled">Canceled</option>
                <option value="Shipped">Shipped</option>
                <option value="Done">DONE</option>
              </select>
						</div>

					<div class="modal-footer">
					<input type="hidden" value="2" name="Etype">
						<input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-info" id="update">Set</button>
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
        <h5 class="modal-title" id="staticBackdropLiveLabel">DELETE OrderItem</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="delete_form" method="POST">
      <div class="modal-body">
        <p>Are you sure you want to DELETE Order Item?</p>
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
<!--card MODAL-->
<div class="modal fade" id="cardModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cardModalLabel">Credit Card info</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" id="CCNform">        
        <input type="hidden" name="id_ccn" id="id_ccn" >
              </form>


      </div>
      <table class="table" id="CCNresponse">
      

      </table>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
      $(document).on('click','.ccn',function(e) {
        var idccn=$(this).attr("data-id_cc");
        $('#id_ccn').val(idccn);
        var xhttp = new XMLHttpRequest();
  var dataCC = $("#CCNform").serialize();
xhttp.onreadystatechange=function(){
  if(this.readyState==4 && this.status==200){
    document.getElementById("CCNresponse").innerHTML=xhttp.responseText;
  }
};
xhttp.open("POST","./CCNget.php",true);  
xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xhttp.send(dataCC);
      });

</script>
<script>
    $(document).on('click','.update',function(e) {
		var id=$(this).attr("data-id");
		var email=$(this).attr("data-email");
		var status=$(this).attr("data-status");



		$('#id').val(id);
		$('#email').val(email);
		$('#status').val(status);

	});
	
	$(document).on('click','#update',function(e) {
		var data = $("#update_form").serialize();
		$.ajax({
			data: data,
            method: "POST",
			url: "./orderStatusUpdate.php",
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
			url: "./deleteOrder.php",
			success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$('#staticBackdropLive').modal('hide');
						alert('Order Item DELETED!'); 
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