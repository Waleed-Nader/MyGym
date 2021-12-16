<?php

$link = mysqli_connect("localhost", "root", "", "mygym") or die("Error connecting to DB");

if($_POST['Etype']==2){
    $id=$_POST['id'];
    $email=$_POST['email'];
    $status=$_POST['status'];
    
    
    $query="UPDATE `orders` SET `status`='$status' WHERE id='$id' AND email='$email'";
    if (mysqli_query($link, $query)) {
        echo json_encode(array("statusCode"=>200));
    } 
    else {
        echo "Error: " . $query . "<br>" . mysqli_error($link);
    }
    mysqli_close($link);
}
?>
