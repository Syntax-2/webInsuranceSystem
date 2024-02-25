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


<h2>Draudimų polisų suvestinė</h2>

<div class = "lentele">

<a href='prideti_draud.php'>Pridėti draudimą</a>

<script>
function confirmDelete(delUrl) {
  if (confirm("Ar tikrai norite ištrinti?")) {
   document.location = delUrl;
  }
}
function confirmUpdate(delUrl) {
  if (confirm("Ar tikrai norite atnaujinti")) {
   document.location = delUrl;
  }
}
</script>

<?php


include'connection.php';
	
	$sql = "SELECT draudimo_id,kategorija,draudimo_suma,menesine_imoka,aprasas,salygu_id FROM draudimo_polisai";
	$result = $conn->query($sql);
	
    echo "<table class=\"table\">\n";
    echo "  <tr>\n";
    echo "    <th>draudimo_id</th>\n";
    echo "    <th>kategorija</th>\n";
    echo "    <th>draudimo_suma</th>\n";
    echo "    <th>menesine_imoka</th>\n";
	echo "    <th>aprasas</th>\n";
    echo "    <th>salygu_id</th>\n";
    echo "    <th></th>\n";
	echo "    <th></th>\n";
    echo "  </tr>";
	
	if ($result->num_rows > 0) {
    // output data of each row
	while($row = $result->fetch_assoc()) {
		
		echo "<tr>\n";
		echo "    <td>".$row["draudimo_id"]."</td>\n";
		echo "    <td>".$row["kategorija"]."</td>\n";
		echo "    <td>".$row["draudimo_suma"]."</td>\n";
		echo "    <td>".$row["menesine_imoka"]."</td>\n";
		echo "    <td>".$row["aprasas"]."</td>\n";
		echo "    <td>".$row["salygu_id"]."</td>\n";
    	echo "    <td>"."<a href='atsaukti_Draud.php?draudimo_id=".$row["draudimo_id"]. "' onclick='return confirmDelete(this);'>Ištrinti</a>"."</td>\n";
		echo "    <td>"."<a href='atnaujinti_draud.php?draudimo_id=".$row["draudimo_id"]. "' onclick='return confirmUpdate(this);'>Atnaujinti</a>"."</td>\n";
		
	}
	
	echo "</table>\n";

	} else {
    echo "0 results";
}
$conn->close();
?>

</div>

<h2>Vartotojų užsakyti draudimai</h2>

<div class = "lentele">

<a href='prideti_uzsakyta.php'>Pridėti užsakytą draudimą</a>




<?php

include'connection.php';
	
	$sql = "SELECT * FROM patvirtinti_draud";
	$result = $conn->query($sql);
	
    echo "<table class=\"table\">\n";
    echo "  <tr>\n";
    echo "    <th>Užsakyto Draud. ID</th>\n";
    echo "    <th>Vartotojo Vardas</th>\n";
    echo "    <th>Draudimo ID</th>\n";
    echo "    <th>Draudimo aprašas</th>\n";
	echo "    <th>Užsakymo Data</th>\n";
    echo "    <th></th>\n";
	echo "    <th></th>\n";
    echo "  </tr>";
	
	if ($result->num_rows > 0) {
    // output data of each row
	while($row = $result->fetch_assoc()) {
		
		echo "<tr>\n";
		echo "    <td>".$row["uzsakyto_id"]."</td>\n";
		echo "    <td>".$row["user_name"]."</td>\n";
		echo "    <td>".$row["draudimo_id"]."</td>\n";
		echo "    <td>".$row["draudimo_aprasas"]."</td>\n";
		echo "    <td>".$row["uzsakymo_data"]."</td>\n";
    	echo "    <td>"."<a href='atsaukti_uzsakyma.php?uzsakyto_id=".$row["uzsakyto_id"]. "' onclick='return confirmDelete(this);'>Ištrinti</a>"."</td>\n";
		echo "    <td>"."<a href='atnaujinti_uzsakyma.php?uzsakyto_id=".$row["uzsakyto_id"]. "' onclick='return confirmUpdate(this);'>Atnaujinti</a>"."</td>\n";
		
	}
	
	echo "</table>\n";

	} else {
    echo "0 results";
}
$conn->close();
?>

</div>




</body>
