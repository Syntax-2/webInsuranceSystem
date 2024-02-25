<?php
session_start ();
if(isset($_POST['button1'])) {

	session_unset();
	session_destroy();

	header('Location: http://localhost/draudimas/loginPage.php');
}
if(!($_SESSION["username"] === "admin1")){
	header('Location: http://localhost/draudimas/vartotojaiAdmin.php');
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


<h2>Darbuotojų suvestinė</h2>

<a href='prideti_darbuotoja.php'>Pridėti Darbuotoją</a>
<div class = "lentele">

<script>
function confirmDelete(delUrl) {
  if (confirm("Ar tikrai norite ištrinti šį darbuotoją?")) {
   document.location = delUrl;
  }
}
function confirmUpdate(delUrl) {
  if (confirm("Ar tikrai norite atnaujinti šį darbuotoją?")) {
   document.location = delUrl;
  }
}
</script>

<?php

include'connection.php';
	
	$sql = "SELECT * FROM darbuotojai";
	$result = $conn->query($sql);
	
    echo "<table class=\"table\">\n";
    echo "  <tr>\n";
    echo "    <th>Vartotojo vardas</th>\n";
    echo "    <th>Slaptažodis</th>\n";
    echo "    <th>El.Paštas</th>\n";
    echo "    <th>Telefono nr.</th>\n";
    echo "    <th></th>\n";
	echo "    <th></th>\n";
    echo "  </tr>";
	
	if ($result->num_rows > 0) {

	while($row = $result->fetch_assoc()) {
		
		echo "<tr>\n";
		echo "    <td>".$row["darbuotojo_username"]."</td>\n";
		echo "    <td>".$row["darbuotojo_slaptazodis"]."</td>\n";
		echo "    <td>".$row["darbuotojo_email"]."</td>\n";
		echo "    <td>".$row["telefono_nr"]."</td>\n";
    	echo "    <td>"."<a href='istrinti_darbuotoja.php?user_name=".$row["darbuotojo_username"]."' onclick='return confirmDelete(this);'>Ištrinti</a>"."</td>\n";
		echo "    <td>"."<a href='atnaujinti_darbuotoja.php?user_name=".$row["darbuotojo_username"]."' onclick='return confirmUpdate(this);'>Atnaujinti</a>"."</td>\n";
		
		
	}
	
	echo "</table>\n";

	} else {
    echo "0 results";
}
$conn->close();
?>

</div>




</body>
