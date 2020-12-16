<?php 

$conn = mysqli_connect("localhost","root","","test") or die("Connection Failed");

$sql = "SELECT * FROM students";

$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");

$output = mysqli_fetch_all($result, MYSQLI_ASSOC);

$json_data = json_encode($output, JSON_PRETTY_PRINT);

$file_name = "my-" . date("d-m-Y") . ".json";

if(file_put_contents("json/{$file_name}", $json_data )){
	echo $file_name . "File created.";
}else{
	echo "Can't Insert data in JSON file.";
}


?>