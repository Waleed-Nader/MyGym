<?php
include 'conn.php';

$email=isset($_SESSION['email']);
$code=isset($_POST['icode']);

echo("$email");
echo("$code");
//if(isset($_SESSION["email"])){
//    mysqli_query($conn,"DELETE FROM cart WHERE email = '$email'"); 
//header("location:cart.php");
//}
//else{echo("error");}
?>