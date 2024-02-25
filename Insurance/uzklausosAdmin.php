<?php
session_start ();
if(isset($_POST['button1'])) {

	session_unset();
	session_destroy();

	header('Location: http://localhost/draudimas/loginPage.php');
}
if(!isset($_SESSION["username"])){
	header("Location: loginPage.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleIndex.css">
    <title>Document</title>
</head>

<body>
 <div class = "name">
	<h3 class ="loginName"><?php
									
									echo "Sveiki, ".$_SESSION["username"];
								
							?></h3>
	<div class = "atsijungti">
		<form method="post">
		 <input type="submit" name="button1"
                class="button" value="Atsijungti" /> 
		</form>
	</div>
 </div>   

<h1>Draudimo Sistema</h1>

<nav>
	<a href="vartotojaiAdmin.php">Vartotojai</a>
	<a href="draudimaiAdmin.php">Draudimai</a>
	<a href="salygosAdmin.php">Salygos</a>
	<a href="uzklausosAdmin.php">Užklausos</a>
	<a href="darbuotojaiAdmin.php">Darbuotojai</a>
	<div class="animation start-home"></div>
</nav>


<h2>Užklausos</h2>

<div class = "lentele">

<script>
function confirmDelete(delUrl) {
  if (confirm("Ar tikrai norite ištrinti?")) {
   document.location = delUrl;
  }
}
function confirmUpdate(delUrl) {
  if (confirm("Ar tikrai norite atnaujinti?")) {
   document.location = delUrl;
  }
}
</script>

<?php

include'connection.php';
	
	$sql = "SELECT * FROM nepatvirtinti_draud";
	$result = $conn->query($sql);
	
    echo "<table class=\"table\">\n";
    echo "  <tr>\n";
    echo "    <th>Nepatvirtinto draudimo ID</th>\n";
    echo "    <th>Vardas Pavardė</th>\n";
    echo "    <th>Draudimo ID</th>\n";
    echo "    <th>Papildoma_info</th>\n";
    echo "    <th></th>\n";
	echo "    <th></th>\n";
    echo "  </tr>";
	
	if ($result->num_rows > 0) {
    // output data of each row
	while($row = $result->fetch_assoc()) {
		
		echo "<tr>\n";
		echo "    <td>".$row["nepatvirtinto_id"]."</td>\n";
		echo "    <td>".$row["user_name"]."</td>\n";
		echo "    <td>".$row["draudimo_id"]."</td>\n";
		echo "    <td>".$row["papildoma_info"]."</td>\n";
		echo "    <td>"."<a href='atsauktiUzklausa.php?nepatvirtinto_id=".$row["nepatvirtinto_id"]."' onclick='return confirmDelete(this);'>Nepatvirtinti</a>"."</td>\n";
		echo "    <td>"."<a href='patvirtinti_draud.php?draudimo_id=".urlencode($row["draudimo_id"])."&user_name=".urlencode($row["user_name"])."&papildoma_info=".urlencode($row["papildoma_info"])."&nepatvirtinto_id=".urlencode($row["nepatvirtinto_id"])."' onclick='return confirmUpdate(this);'> Patvirtinti </a>"."</td>\n";
						
	}
	
	echo "</table>\n";

	} else {
    echo "0 results";
}
$conn->close();
?>

</div>

</body>
