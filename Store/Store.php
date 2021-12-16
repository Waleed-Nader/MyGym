<?php
session_start();

$link = mysqli_connect("localhost", "root", "", "MyGym") or die("DB Connection error");
$query = "SELECT * FROM tblproduct";
$results = mysqli_query($link, $query);
$products = array();
while($row = mysqli_fetch_assoc($results))
{
 $products[] = $row;
}
mysqli_close($link);
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Store</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../CSS/Storee.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../CSS/bootstrap.css'>
    <script src='../Scripts/Store.js'></script>
    <script  src='../Scripts/jQuery.js'></script>
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
  echo('<span class="badge rounded-pill bg-success">You are Signed in as '.$_SESSION['email'].'</span>');
} else {
 echo('<span class="badge rounded-pill bg-warning text-dark">Sign in or Register</span>');
}
?>
      <div class="btn-cart"><button type="button" class="btn btn-secondary" ><a class="link" href="Cart.php">
        <img src="../images/bootstrap-icons/cart.svg" alt="Bootstrap" width="20" height="20">
         Go to Cart</button> </a>
      </div>    
       <br>
       <!---modal--->
       <div role="alert" id="getmodal" style=" position: -webkit-sticky;
    position: sticky; top: 0;z-index: 99999;">
      </div>
      <br>
      <!--filter-->
      <fieldset style="color: white;">
	<legend>Filter items</legend>
  <input type="text" id="searchBar" placeholder="Search">
  &nbsp;&nbsp;&nbsp;&nbsp;
<input type="checkbox" id="all" value="all" checked>ALL &nbsp;
<input type="checkbox" id="whey">Whey &nbsp;
<input type="checkbox" id="pre-workout">Pre-Workout &nbsp;
<input type="checkbox" id="mass-gainer">Mass-Gainer &nbsp;
</fieldset>
<script>
  $(document).ready(function(){
    $('input[type="checkbox"]').change(function(){
      var inputValue = $(this).attr("value");
      if($('#all').is(":checked")){
       $(".whey").show();
       $(".pre-workout").show();
       $(".mass-gainer").show();   
    }else if($('#whey').is(":checked")){
      $(".whey").show();
      $(".pre-workout").hide();
       $(".mass-gainer").hide();
    }
  else if($('#pre-workout').is(":checked")){
      $(".pre-workout").show();
      $(".whey").hide();
       $(".mass-gainer").hide();
    }
    else if($('#mass-gainer').is(":checked")){
      $(".pre-workout").hide();
      $(".whey").hide();
       $(".mass-gainer").show();
    }
      //$("."+ inputValue).show();
      
     
    });
  });
</script>
<script>
 $(document).ready(function(){
  $('input[type="checkbox"]').click(function(){
    $('input[type="checkbox"]').not(this).prop('checked',false);
  
});
  });
</script>

<!--items fetching -->
<div id="itemsContainer">
<?php
  for($i=0; $i<count($products); $i++){
    ?>

  <div id="product-grid" class="<?php printf($products[$i]['type']) ;?>" >
    
      <div class="product-item" style="width: 290px;height: 360px;">
        <form method="post" action="" id="form">
        <input type="hidden" class="product-image" id="product-image" value="<?php echo $products[$i]["image"]; ?>" name="image"><img src="<?php echo $products[$i]["image"]; ?>" style="width: 256px;height:256px;">
        <div class="product-tile-footer">
        <input type="hidden" class="product-title" id="product-title" value="<?php echo $products[$i]["name"]; ?>" name="name"><b><?php echo $products[$i]["name"]; ?></b> <br>
        <input type="hidden" class="product-code" id="product-code" value="<?php echo $products[$i]["code"]; ?>" name="code"><?php echo $products[$i]["code"]; ?><br>
        <input type="hidden" name="type" id="product-type" value="<?php printf($products[$i]['type']) ;?>">
        <input type="hidden" class="product-price" id="product-price" value="<?php echo $products[$i]["price"]; ?>" name="price"><?php echo "$".$products[$i]["price"]; ?>
        <div class="cart-action"><input type="text" class="product-quantity" id="product-quantity" name="quantity" value="1" size="2" />
        <input type="submit" value="Add to Cart" name="add" id="add" class="btnAddAction" /></div>
        </div>

        </form>
      </div>
  </div>

  <?php
}
?>
</div>
<script type="text/javascript">

$(document).ready(function(){
      $(document).on("click","#add",function(e) {
        e.preventDefault();
                    var form=$(this).closest("#form");
                    var name= form.find("#product-title").val();
                    var code= form.find("#product-code").val();
                    var image= form.find("#product-image").val();
                    var price= form.find("#product-price").val();
                    var quantity= form.find("#product-quantity").val();
                    var type= form.find("#product-type").val();


                    $.ajax({
                        method: "POST",
                        url: "add.php",
                        data: "name=" + name+ "&code=" + code+ "&image="+image+ "&price="+price+ "&quantity="+quantity+ "&type="+type,
                        success: function(response) {
                           $("#getmodal").html(response).fadeIn(2000).fadeOut(2000);
                           //$("#getmodal").fadeOut;
                        }
                    });


                });
        });
    
</script>
<script>
$(document).ready(function(){
  $("#searchBar").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#itemsContainer div").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
         </body>
         
</html>