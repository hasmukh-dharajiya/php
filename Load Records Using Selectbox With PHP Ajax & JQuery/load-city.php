<?php

$conn = mysqli_connect("localhost","root","","testing") or die("Connection Failed");

$sql = "SELECT distinct(city) FROM students";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");

if(mysqli_num_rows($result) > 0 ){
  $output = mysqli_fetch_all($result, MYSQLI_ASSOC);

  echo json_encode($output);

}else{
  echo "No Record Found.";
}

?>
