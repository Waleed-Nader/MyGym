<?php
$link = mysqli_connect("localhost", "root", "", "mygym") or die("Error connecting to DB");

	if($_POST['type']==2){
		$id=$_POST['id'];

		$reply=$_POST['reply'];
		$sql = "UPDATE `contact-us` SET `our-reply`='$reply' WHERE id=$id";
		if (mysqli_query($link, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($link);
	}
?>