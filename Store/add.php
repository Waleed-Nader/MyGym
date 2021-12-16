<?php
session_start();
$link = mysqli_connect("localhost", "root", "", "MyGym") or die("DB Connection error");

  if(!isset($_SESSION['email'])){ echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
   You are required to sign in First... Item Not Added !!
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>';
  return false;
 }else{
     $email=$_SESSION['email'];}
     $image = $_POST['image'];
     $name = $_POST['name'];
     $code=$_POST['code'];
     $price = $_POST['price'];
     $qty=$_POST['quantity'];
     $type=$_POST['type'];
     $priceE=$price*$qty;
     $sql = "INSERT INTO cart (email,image,name,code,price,quantity,type)
     VALUES ('$email','$image','$name','$code','$priceE','$qty','$type')";
//update quantity for duplicate items
$q1="SELECT * FROM cart WHERE email='$email' AND code='$code'";
$q="UPDATE cart SET quantity = quantity+ '$qty',price=price+('$qty'*'$price') WHERE email='$email' AND code ='$code'";
$r1=mysqli_query($link,$q1);
$nmr=mysqli_num_rows($r1);

if($nmr>0){ 
   mysqli_query($link,$q);
   echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
   <h5><b>Item Added Successfully to cart!! Gains are Coming !!</b></h5>
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>';
}elseif (mysqli_query($link, $sql)){
        echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
        <h5><b>Item Added Successfully to cart!! Gains are Coming !!</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';

     }
     else {
        echo "Error: " . $sql . ":-" . mysqli_error($link);
     }
     
 

     mysqli_close($link);

?>
