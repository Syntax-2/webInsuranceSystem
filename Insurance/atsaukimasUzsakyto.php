<?php
session_start();

include 'connection.php';

if($_SERVER["REQUEST_METHOD"] == "GET"){
		
$uzsakyto_id = $_GET["uzsakyto_id"];

 
    
$sql = "DELETE FROM patvirtinti_draud WHERE uzsakyto_id=$uzsakyto_id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $conn->error;
  }

header('Location: http://localhost/draudimas/uzsakytiDraud.php');


}



	   
?>