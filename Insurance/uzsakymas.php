<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'draudimusistema');
$username = $_SESSION["username"];

if($_SERVER["REQUEST_METHOD"] == "GET"){
		
	$draudimo_id = $_GET["draudimo_id"];


	


}

$sql = "SELECT * from draudimo_polisai where draudimo_id='$draudimo_id'";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
    
    $draudimo_aprasas = $row["aprasas"];


}

$sql = "INSERT INTO nepatvirtinti_draud(nepatvirtinto_id, user_name, draudimo_id, papildoma_info)"."VALUES (NULL, '$username', '$draudimo_id', '$draudimo_aprasas')";

$result = $conn->query($sql);


?>


<?php
header('Location: http://localhost/draudimas/draudimai.php');

?>