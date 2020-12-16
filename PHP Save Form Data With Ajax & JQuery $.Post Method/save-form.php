<?php

$conn = mysqli_connect("localhost", "root", "", "test");

if(isset($_POST["fname"]) && isset($_POST["lname"])){

	$first_name = $_POST['fname'];
	$last_name = $_POST['lname'];

	$sql = "INSERT INTO students(first_name,last_name) VALUES ('{$first_name}', '{$last_name}')"; 

	if(mysqli_query($conn, $sql)){
		echo 1;
	}else{
		echo 0;
	}

} else{
	echo "All fields are required.";
}

?>
