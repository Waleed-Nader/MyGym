<?php
session_start();
$link = mysqli_connect("localhost", "root", "", "mygym") or die("Error connecting to DB");
 if($_POST['Otype']==1){
     if(isset($_POST['email'])){
 $user=$_POST['email'];
     }else{ $user=$_SESSION['email']; }

 if($_POST['firstName']!=""){
      $fname=$_POST['firstName']; }

 if($_POST['lastName']!=""){ 
     $lname=$_POST['lastName']; }

if($_POST['address']!=""){ 
    $address=$_POST['address']; }

if($_POST['state']!=""){
     $province=$_POST['state']; }

    if($_POST['phone']!="" ){
         $phone=$_POST['phone']; }

        if($_POST['paymentMethod']!=""){ 
            $paymentM=$_POST['paymentMethod']; }

                $time=date("Y-m-d H:i:s");
                //card info
                if(isset($_POST['cardNumber'])){
$ccn=$_POST['cardNumber'];
     }else{ $ccn="0"; }
     if(isset($_POST['cvvNumber'])){
     $cvv=$_POST['cvvNumber']; }else{ $cvv="0"; }
      $cardInfo=$ccn." ".$cvv;   
//query
 $query="UPDATE cart SET `firstname`='$fname',`lastname`='$lname',`address`='$address',`province`='$province',`phone`='$phone',`paymentMethod`='$paymentM',`time`='$time',`cardInfo`='$cardInfo' WHERE email='$user'";
 
if (mysqli_query($link, $query)) {
    echo json_encode(array("statusCode"=>200));

    $query2="INSERT INTO orders(`firstname`,`lastname`,`email`,`address`,`province`,`phone`,`paymentMethod`, `name`, `code`, `price`, `quantity`,`type`,`time`,`cardInfo`)"
    ." SELECT `firstname`,`lastname`,`email`,`address`,`province`,`phone`,`paymentMethod`, `name`, `code`, `price`, `quantity`,`type`,`time`,`cardInfo`"
    ." FROM cart WHERE email='$user'";
   mysqli_query($link,$query2);
   
   $query3="DELETE FROM cart WHERE email='$user'";
   mysqli_query($link,$query3);
} 
else {
    
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
mysqli_close($link);
}
?>