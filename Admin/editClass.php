<?php
$link = mysqli_connect("localhost", "root", "", "mygym") or die("Error connecting to DB");


		$id=$_POST['id'];
    	$name=$_POST['Cname'];
        $coach=$_POST['inst'];
        $time=$_POST['Cdate'];
        $desc=$_POST['desc'];
		
        $sql = "UPDATE `classes` SET `Class_name`='$name',`Class_time`='$time',`Class_Coach`='$coach',`class_description`='$desc' WHERE id='$id'";
		if (mysqli_query($link, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($link);
		}
		mysqli_close($link);

    //if(isset($_POST['delete'])){
      //  $sql= "DELETE FROM `classes` WHERE id='$id'";
      //  mysqli_query($link, $sql);
 //   }
?>