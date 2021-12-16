<?php

	$host = "localhost";
	$user = "root";
	$password = "";
	$database = "mygym";
	$tableName="users";
	$conn;

		$conn = mysqli_connect($host,$user,$password,$database);
		if($conn===false){
            die("Error:No Connection.".mysqli_connect_error());
        }
?>