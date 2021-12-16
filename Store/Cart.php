<?php
session_start();
ob_start();
$email=$_SESSION['email'];
$link = mysqli_connect("localhost", "root", "", "MyGym") or die("DB Connection error");
$query = "SELECT * FROM cart WHERE email = '$email'";
$results = mysqli_query($link, $query);
$user=$_SESSION['email'];
//fetching results
$items = array();
while($row = mysqli_fetch_assoc($results))
{
 $items[] = $row;
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>MyCart</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../CSS/Storee.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../CSS/bootstrap.css'>
    <script src='../Scripts/Store.js'></script>
    <script src='../Scripts/jQuery.js'></script>
    <script src="../Scripts/Bootstrap.js"></script>
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
                <a class="nav-link" href="../Pages/Our Programs.php">Our Programs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="Store.php">Store</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../Pages/Contact us.php">Contact us</a>
              </li>
            </ul>

            <div class="text-end">
            <?php if ( isset( $_SESSION['email'] ) ) { ?><a href="../Pages/Profile.php"><img src="../images/ProfPic.png" style="width: 40px;"></a>
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
  // Grab user data from the database using the email
  // Let them access the "logged in only" pages
  echo('<span class="badge rounded-pill bg-success">You are Signed in as '.$_SESSION['email'].'</span>');
} else {
 echo('<span class="badge rounded-pill bg-warning text-dark">Sign in or Register</span>');
}
?>
      
      <div id="shopping-cart">
  <div class="txt-heading">Shopping Cart</div>
  
  <a id="btnEmpty" href="cart.php?actionEmpty">Empty Cart</a>
  <?php
  if(isset($_SESSION["email"])){
      $total_quantity = 0;
      $total_price = 0;}
      else{
          header("location:../LoginRegister/login.php");
      }
  ?>	
  <table class="tbl-cart" cellpadding="10" cellspacing="1">
  <tbody>
  <tr>
  <th style="text-align:left;">Name</th>
  <th style="text-align:left;">Code</th>
  <th style="text-align:right;" width="5%">Quantity</th>
  <th style="text-align:right;" width="10%">Unit Price</th>
  <th style="text-align:right;" width="10%">Price</th>
  <th style="text-align:center;" width="5%">Remove</th>
  </tr>	
  <?php		
      for($j=0;$j<count($items);$j++){

      ?>
      <form method="post">
          <tr>
          <td><img src="<?php echo $items[$j]["image"]; ?>" class="cart-item-image" /><?php echo $items[$j]["name"]; ?></td>
          <td><input type="hidden" name="icode" value="<?php echo $items[$j]["code"]; ?>">
               <input type="hidden" name="itype" value="<?php echo $items[$j]["type"]; ?>">
               <?php echo $items[$j]["code"]; ?></td>
          <td style="text-align:right;"><?php echo $items[$j]["quantity"]; ?></td>
          <td  style="text-align:right;"><?php echo "$ ".$items[$j]["price"]/$items[$j]["quantity"]; ?></td>
          <td  style="text-align:right;"><?php echo "$ ". number_format($items[$j]["price"],2); ?></td>
          <td style="text-align:center;"><a href="cart.php?actionRemove=<?php echo $items[$j]["code"]; ?>" class="btnRemoveAction" ><img src="../images/icon-delete.png" alt="Remove Item" /></a></td>
          </tr>
      </form>
          <?php
          $total_quantity += $items[$j]["quantity"];
          $total_price += $items[$j]["price"];
      }
      ?>
  <?php
  
  $email=$_SESSION['email'];
  $delete=isset($_GET["actionRemove"]);
  $empty=isset($_GET["actionEmpty"]);
  
   while($delete){
    $code=$_GET['actionRemove'];
    mysqli_query($link,"DELETE FROM cart WHERE email = '$email' AND code='$code'");
   die(header("location:cart.php"));
     break;
   }
   while($empty){
    mysqli_query($link,"DELETE FROM cart WHERE email = '$email'");
    die(header("location:cart.php"));
    break;
    
   }
   ob_end_flush();
  ?>
  <tr>
  <td colspan="2" align="right">Total:</td>
  <td align="right"><?php echo $total_quantity; ?></td>
  <td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
  <td></td>
  </tr>
  </tbody>
  </table>
  <br>
  <!---checkout button--->
  <?php $r= mysqli_query($link,"SELECT * FROM cart WHERE email='$email'");
  $n=mysqli_num_rows($r);
  if($n>0){
  ?>
  <a href="#checkoutModal" class="btn btn-success" data-bs-toggle="modal">
							<i class="material-icons update" data-toggle="tooltip" 
              data-email="<?php echo($user); ?>"
							data-firstName=""
              data-lastName=""
							data-address=""
							data-province=""
							data-phone=""
              data-payment=""
							title="Edit">Checkout</i>
						</a>
            <?php
  }else{ ?>
    <input type="button" class="btn btn-success" value="Checkout">
    <?php
  }
  ?>
            <!-- checkout Modal HTML -->
<div id="checkoutModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="update_form">
					<div class="modal-header">						
						<h4 class="modal-title">Checkout: Total price : <?php echo"$total_price"; ?>$</h4>
						<button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">X</button>
					</div>
          <p id="error"></p>
					<div class="modal-body">
          <input type="hidden" class="form-control" id="email" name="email" placeholder="" value="" required>
						<div class="form-group">
							<label>Name</label>
              <input type="text" class="form-control" id="firstName" name="firstName" placeholder="" value="" required>
						</div>
						<div class="form-group">
							<label>Last name</label>
              <input type="text" class="form-control" id="lastName" name="lastName" placeholder="" value="" required>
						</div>
						<div class="form-group">
            <div class="col-12">
                  <label for="address" class="form-label">Shipping Address</label>
                  <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required>

                </div>
						</div>
            <div class="form-group">
							<label>Phone</label>
              <input type="text" class="form-control" id="phone" name="phone" placeholder="ex:70555666" required>
						</div>
						<div class="form-group">
                <div class="col-md-4">
                  <label for="state" class="form-label">Province</label>
                  <select class="form-select" id="state" name="state" required>
                    <option value="">Choose...</option>
                    <option value="Beirut">Beirut</option>
                    <option value="Mont Lebanon">Mont Lebanon</option>
                    <option value="North">North</option>
                    <option value="South">South</option>
                </select>

                </div>	
                           
					</div>
          <div class="form-group">
                <div class="col-md-4">
                  <label for="state" class="form-label">Payment method</label>
                  <select class="form-select" id="paymentMethod" name="paymentMethod" required>
                    <option value="">Choose a payment method...</option>
                    <option value="cash on delivery">Cash on delivery</option>
                    <option value="paypal">Paypal</option>
                    <option value="OMT">OMT</option>
                    <option value="card">Credit Card</option>
                </select>

                </div>	
					</div><hr>

<div class="form-group" id="cardPayment">
  <b>Card Payment:</b><br>
<input class="form-control" id="cardNumber" name="cardNumber" placeholder="Card Number ex:4123456789111222" style="width: 400px;float:left;">
<input class="form-control" id="cvvNumber" name="cvvNumber" placeholder="cvv" style="width: 50px; float:right;">
</div><br><br>
					<div class="modal-footer">
					<input type="hidden" value="1" name="Otype">
						<input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
						<button type="submit" class="btn btn-info" id="update">Place Order</button>
					</div>
				</form>
			</div>
		</div>
	</div>
    </body>
</html>
<script>
  $(function(){
$('#cardPayment').hide();
$('#paymentMethod').change(function(){
if($('#paymentMethod').val()=='card'){
  $('#cardPayment').show();  
}else{ $('#cardPayment').hide(); }
});
  });
  </script>

<script>
    $(document).on('click','.update',function(e) {
    var user =$(this).attr("data-email");
		var firstName=$(this).attr("data-firstName");
		var lastName=$(this).attr("data-lastName");
		var address=$(this).attr("data-address");
		var state=$(this).attr("data-province");
		var phone=document.getElementById("phone").value;
    var paymentMethod=$(this).attr("data-payment");
    var cardNumber = document.getElementById("cardNumber").value;
    var selector = document.getElementById("paymentMethod").value;
    var cvvNumber = document.getElementById("cvvNumber").value;

		$('#email').val(user);
		$('#firstName').val(firstName);
		$('#lastName').val(lastName);
		$('#address').val(address);
		$('#state').val(state);
    $('#paymentMethod').val(paymentMethod);
   
	});

	$(document).on('click','#update',function(e) {
   var pattern= /[0-9]{8}/; 
   //visa and mastercard 
   //visa starts with 4 and 13 or 16 number
   //mastercard  It should be 16 digits long.
   //It should start with either two digits number may range from 51 to 55 or four digits number may range from 2221 to 2720.
   // In the case of 51 to 55, the next fourteen digits should be any number between 0-9.
   var cardPattern = /^(?:4[0-9]{12}(?:[0-9]{3})?|(?:5[1-5][0-9]{2}| 222[1-9]|22[3-9][0-9]|2[3-6][0-9]{2}|27[01][0-9]|2720)[0-9]{12})$/;
   var cvvPattern = /[0-9]{3}/;
if($('#phone')=="" || pattern.test($('#phone').val())===false){
  alert('Enter a valid phone number');
  return false ;
}
if($('#paymentMethod').val()=="card"){
  
if($('#cardNumber').val()==""|| cardPattern.test($('#cardNumber').val())===false){
  alert('Enter a valid Credit Card number');
  return false;
}

if($('#cvvNumber').val()==""||cvvPattern.test($('#cvvNumber').val())===false){
  alert('enter a valid cvv Number');
  return false;
}
}
		var data = $("#update_form").serialize();
		$.ajax({
			data: data,
            method: "POST",
			url: "./checkoutScript.php",
			success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$('#checkoutModal').modal('hide');
						alert('Order successfully placed!'); 
                        location.reload();						
					}
					else if(dataResult.statusCode==201){
					   alert(dataResult);
					}  
			}
		});
	});
    </script>
