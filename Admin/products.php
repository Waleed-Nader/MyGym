<?php
session_start();
if(!isset($_SESSION['user'])){
  header("location:./LI_LO/Login.php");
}
?>
<?php
$link = mysqli_connect("localhost", "root", "", "mygym") or die("Error connecting to DB");
$query = "SELECT * FROM tblproduct" ;
$results = mysqli_query($link, $query);
?>
<?php

if(isset($_POST['upload'])){
	$filename = $_FILES["file"]["name"];
	$file_basename = substr($filename, 0, strripos($filename, '.'));
	$file_ext = substr($filename, strripos($filename, '.'));
	$filesize = $_FILES["file"]["size"];
	$allowed_file_types = array('.jpg','.jpeg');

  if (in_array($file_ext,$allowed_file_types) && ($filesize < 200000))
	{	
		// Rename file
		$newfilename = md5($file_basename) . $file_ext;
		if (file_exists("../images/Products/" . $newfilename))
		{
			// file already exists error
			echo "<script>alert('You have already uploaded this file.');</script>";
		}
		else
		{		
			move_uploaded_file($_FILES["file"]["tmp_name"], "../images/Products/" . $newfilename);
      $name= $_POST['name'];
      $code= $_POST['code'];
      $price= $_POST['price'];
      $type= $_POST['type'];
      $filetarget="../images/Products/" . $newfilename;
      $link = mysqli_connect("localhost", "root", "", "mygym") or die("Error connecting to DB");
      $query="INSERT INTO `tblproduct`(`name`, `type`, `code`, `image`, `price`) VALUES ('$name','$type','$code','$filetarget','$price')";
			mysqli_query($link,$query);
      echo "<script>alert('File uploaded successfully.');</script>";		
		}
	}
	elseif (empty($file_basename))
	{	
		// file selection error
		echo "<script>alert('Please select a file to upload.');</script>";
	} 
	elseif ($filesize > 200000)
	{	
		// file size error
		echo "<script>alert('The file you are trying to upload is too large.');</script>";
	}
	else
	{
		// file type error
		echo "<script>alert('Only these file types are allowed for upload: .jpeg , .jpg ');</script>";
		unlink($_FILES["file"]["tmp_name"]);
	}
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
            <a class="nav-link active" href="products.php">
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
        <h1 class="h2">Products</h1>

      </div>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Image</th>
              <th scope="col">Product name</th>
              <th scope="col">Code</th>
              <th scope="col">Price</th>
              <th scope="col">Type</th>
              <th scope="col"></th>
              <th scope="col"></th>

            </tr>
          </thead>
          <tbody id="productContainer">
            <?php while($row = mysqli_fetch_assoc($results)){ ?>
              <form method='POST'>
              <tr>
              <td><?php echo $row['id']; ?></td>
              <td><img src="<?php echo $row['image']; ?>" width = '50px'></td>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['code']; ?></td>
              <td><?php echo $row['price']; ?></td>
              <td><?php echo $row['type']; ?></td>
              <td><a href="#EditModal" class="edit" data-bs-toggle="modal">
							<i class="material-icons update" data-toggle="tooltip" 
							data-id="<?php echo $row['id']; ?>"
              data-image="<?php echo $row['image']; ?>"
							data-name="<?php echo $row['name']; ?>"
							data-code="<?php echo $row['code']; ?>"
							data-price="<?php echo $row['price']; ?>"
							data-ptype="<?php echo $row['type']; ?>"
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
<!----add-new-product--->
<hr>


    </div>
</main>
</div>
</div>




<div id="NewProduct">
    <form method='POST' name="Nproduct" id="Nproduct" action="" enctype="multipart/form-data" >
    <fieldset style="margin-left:20%;">
    <legend><b><h4>Add New Product</h4></b></legend>

<input type="file" name="file" id="imgs" accept="image/jpg,image/jpeg" required>
<input type="text" name="name" id="name" placeholder="Product Name" required>
<input type="text" name="code" id="code" placeholder="Product Code" required>
<input type="number" name="price" id="price" placeholder="Price" required>
<select name="type" id="type" required>
  <option>--Type--</option>
  <option value="whey">whey</option>
  <option value="mass-gainer">mass-gainer</option>
  <option value="pre-workout">pre-workout</option>
</select>
<input type="submit" value="Add" name="upload">
</fieldset>
</form>
</div>



<br>
<hr>


<!-- Edit Modal HTML -->
<div id="EditModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="update_form">
					<div class="modal-header">						
						<h4 class="modal-title">Edit Product</h4>
						<button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">X</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_u" name="id1" class="form-control" required>	
			
						<div class="form-group">
							<label>Name</label>
							<input type="text" id="name_u" name="name1" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Code</label>
							<input type="text" id="code_u" name="code1" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Price</label>
							<input type="text" id="price_u" name="price1" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Type</label>
							<input type="text" id="type_u" name="type1" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
					<input type="hidden" value="2" name="Etype">
						<input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-info" id="update">UPDATE</button>
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
        <h5 class="modal-title" id="staticBackdropLiveLabel">DELETE Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="delete_form" method="POST">
      <div class="modal-body">
        <p>Are you sure you want to DELETE item?</p>
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
   $(document).ready(function(){

    $(document).on('click','.update',function(e) {
		var id=$(this).attr("data-id");
		var name=$(this).attr("data-name");
		var code=$(this).attr("data-code");
		var price=$(this).attr("data-price");
		var ptype=$(this).attr("data-ptype");

		$('#id_u').val(id);
		$('#name_u').val(name);
		$('#code_u').val(code);
		$('#price_u').val(price);
		$('#type_u').val(ptype);
	});
	
	$(document).on('click','#update',function(e) {
		var data = $("#update_form").serialize();
		$.ajax({
			data: data,
            method: "POST",
			url: "./editProduct.php",
			success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$('#EditModal').modal('hide');
						alert('successfully Updated!'); 
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
			url: "./deleteProduct.php",
			success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$('#staticBackdropLive').modal('hide');
						alert('Product DELETED!'); 
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
    $("#productContainer tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</body>
</html>