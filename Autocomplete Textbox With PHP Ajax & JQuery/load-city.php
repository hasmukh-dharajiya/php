<?php

$conn = mysqli_connect("localhost","root","","testing") or die("Connection Failed");

$search_term = $_POST['city'];

$sql = "SELECT distinct(city) FROM students WHERE city LIKE '%{$search_term}%'";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");

$output = "<ul>";

	if(mysqli_num_rows($result) > 0){  
		while($row = mysqli_fetch_assoc($result)){
			$output .= "<li>{$row['city']}</li>";
		}
  }else{  
  	$output .= "<li>City Not Found</li>";
  } 
$output .= "</ul>";

echo $output;

?>
