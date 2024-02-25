<?php
session_start();

include 'connection.php';

if($_SERVER["REQUEST_METHOD"] == "GET"){
		
$draud_id = $_GET["draudimo_id"];

 
    
$sql = "DELETE FROM draudimo_polisai WHERE draudimo_id='$draud_id'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $conn->error;
  }

header('Location: http://localhost/draudimas/draudimaiAdmin.php');


}



	   
?>