<?php
$link = mysqli_connect("localhost", "root", "", "mygym") or die("Error connecting to DB");

	if($_POST['Etype']==2){
		$id=$_POST['id1'];
    	$name=$_POST['name1'];
        $code=$_POST['code1'];
        $price=$_POST['price1'];
        $ptype=$_POST['type1'];
		$sql = "UPDATE `tblproduct` SET `name`='$name',`code`='$code',`price`='$price',`type`='$ptype' WHERE id=$id";
		if (mysqli_query($link, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($link);
	}
?>