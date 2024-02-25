<?php
session_start();

include 'connection.php';

if($_SERVER["REQUEST_METHOD"] == "GET"){
		
$salygu_id = $_GET["salygu_id"];

 
    
$sql = "DELETE FROM salygos WHERE salygu_id='$salygu_id'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $conn->error;
  }

  header('Location: http://localhost/draudimas/salygosAdmin.php');

}



	   
?>