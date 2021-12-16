<?php
$link = mysqli_connect("localhost", "root", "", "mygym") or die("Error connecting to DB");

	if($_POST['Etype']==2){
		$id=$_POST['id'];
    	$name=$_POST['name'];
        $lastname=$_POST['lastname'];
        $email=$_POST['email'];
        $sdate=$_POST['sdate'];
        $stype=$_POST['stype'];
        $send=$_POST['sEnd'];
		
        
        $sql = "UPDATE `users` SET `name`='$name',`surname`='$lastname',`email`='$email',`Subscription date`='$sdate',`subscription type`='$stype',`subscription end`='$send' WHERE id=$id";
		if (mysqli_query($link, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($link);
		}
		mysqli_close($link);
	}
?>