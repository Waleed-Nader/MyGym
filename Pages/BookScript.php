<?php
session_start();
$link = mysqli_connect("localhost", "root", "", "mygym") or die("Error connecting to DB");

$cname=$_POST['Cname'];
$email=$_POST['email'];
$name=$_POST['name'];
$Lname=$_POST['Lname'];
if(is_numeric($_POST['phone'])){
$phone=$_POST['phone'];
}else{ echo"<script>alert('Please enter a valid Phone number');</script>"; return false; }
 
//check if user already booked
$sql="SELECT * FROM `classes_booking` WHERE email='$email' AND class_name='$cname'";
$rs= mysqli_query($link,$sql);
 if(mysqli_num_rows($rs)>0){
  echo"<script>alert('You have already booked this class');</script>"; 
  return false;
 }else{
 $query="INSERT INTO `classes_booking`(`class_name`, `name`, `lastname`, `email`, `phone`) 
VALUES ('$cname','$name','$Lname','$email','$phone') ";

if(mysqli_query($link,$query)){

    echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
    <h5><b>Class successfully booked !! See you soon..</b></h5>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
 }



?>