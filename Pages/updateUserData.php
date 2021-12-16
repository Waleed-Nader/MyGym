<?php
session_start();
$link = mysqli_connect("localhost", "root", "", "mygym") or die("Error connecting to DB");

 
        $email=$_SESSION['email'];
$age=$_POST['age'];
$weight=$_POST['weight'];
$height=$_POST['height'];
		
        
        $sql = "UPDATE `users` SET `age`='$age',`weight`='$weight',`height`='$height' WHERE email='$email'";
		if (mysqli_query($link, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($link);
		}
		mysqli_close($link);
?>