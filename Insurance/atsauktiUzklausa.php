<?php
session_start();

include 'connection.php';



if($_SERVER["REQUEST_METHOD"] == "GET"){
		
$nepatvirtinto_id = $_GET['nepatvirtinto_id'];

 
    
$sql = "DELETE FROM nepatvirtinti_draud WHERE nepatvirtinto_id='$nepatvirtinto_id'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $conn->error;
  }

  header('Location: http://localhost/draudimas/uzklausosAdmin.php');


}



	   
?>