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


<h2>Vartotojai</h2>

<a href='prideti_vartotoja.php'>Pridėti Vartotoją</a>

<div>

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
	
	$sql = "SELECT user_id, user_name, password, email, date FROM vartotojai";
	$result = $conn->query($sql);
	
    echo "<table class=\"table\">\n";
    echo "  <tr>\n";
	echo "    <th>Vartotojo ID</th>\n";
    echo "    <th>Vartotojo vardas</th>\n";
    echo "    <th>Slaptažodis</th>\n";
    echo "    <th>El.Paštas</th>\n";
    echo "    <th>Data</th>\n";
    echo "    <th></th>\n";
	echo "    <th></th>\n";
    echo "  </tr>";
	
	if ($result->num_rows > 0) {

	while($row = $result->fetch_assoc()) {
		
		echo "<tr>\n";
		echo "    <td>".$row["user_id"]."</td>\n";
		echo "    <td>".$row["user_name"]."</td>\n";
		echo "    <td>".$row["password"]."</td>\n";
		echo "    <td>".$row["email"]."</td>\n";
		echo "    <td>".$row["date"]."</td>\n";
    	echo "    <td>"."<a href='istrinti.php?user_name=".$row["user_name"]."' onclick='return confirmDelete(this);'>Ištrinti</a>"."</td>\n";
		echo "    <td>"."<a href='atnaujinti_vartotoja.php?user_id=".$row['user_id']."' onclick='return confirmUpdate(this);'>Atnaujinti</a>"."</td>\n";
		
		
	}
	
	echo "</table>\n";

	} else {
    echo "0 results";
}
$conn->close();
?>

</div>




</body>
