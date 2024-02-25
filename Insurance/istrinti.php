<?php
session_start();

include 'connection.php';

if($_SERVER["REQUEST_METHOD"] == "GET"){
		
$name = $_GET["user_name"];

 
    
$sql = "DELETE FROM vartotojai WHERE user_name='$name'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $conn->error;
  }

  header('Location: http://localhost/draudimas/vartotojaiAdmin.php');

}



	   
?>