<?php
include 'connection.php';


$nepatvirtinto_id = $_GET['nepatvirtinto_id'];
$user_name = $_GET['user_name'];
$papildoma_info = $_GET['papildoma_info'];
$draudimo_id = $_GET['draudimo_id'];

echo $nepatvirtinto_id;
echo $user_name;
echo $papildoma_info;


$sql = "INSERT INTO `patvirtinti_draud` (`uzsakyto_id`, `user_name`, `draudimo_id`, `draudimo_aprasas`, `uzsakymo_data`) VALUES (NULL, '$user_name', '$draudimo_id', '$papildoma_info', current_timestamp());";
    
$result = $conn->query($sql);
    



$sql = "DELETE FROM nepatvirtinti_draud WHERE nepatvirtinto_id = '$nepatvirtinto_id'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $conn->error;
  }

  header('Location: http://localhost/draudimas/uzklausosAdmin.php');


?>