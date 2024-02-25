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

$name = $_SESSION["username"];

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
    
<body>
<div class = "name">
	<h3 class ="loginName"><?php
									
									echo "Sveiki, ".$name;
								
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
	<a href="index.php">Titulinis</a>
	<a href="draudimai.php">Draudimai</a>
	<a href="uzsakytiDraud.php">Užsakyti draudimai</a>
	<a href="asmenineinfo.php">Asmeninė informacija</a>
	<a href="kontaktai.php">Kontaktai</a>
	<div class="animation start-home"></div>
</nav>


<h2>Jūsų aktyvūs draudimai</h2>


<div class = "lentele">

<script>
function confirmDelete(delUrl) {
  if (confirm("Ar tikrai norite ištrinti?")) {
   document.location = delUrl;
  }
}
</script>

<?php

include'connection.php';
	
$sql = "SELECT uzsakyto_id, user_name, draudimo_id, draudimo_aprasas, uzsakymo_data from patvirtinti_draud where user_name='$name'";
	$result = $conn->query($sql);
	
   
	
	if ($result->num_rows > 0) {

    echo "<table class=\"table\">\n";
    echo "  <tr>\n";
    echo "    <th>uzsakyto_id</th>\n";
    echo "    <th>user_name</th>\n";
    echo "    <th>draudimo_id</th>\n";
    echo "    <th>draudimo_aprasas</th>\n";
	  echo "    <th>uzsakymo_data</th>\n";
    echo "    <th></th>\n";
    echo "  </tr>";

    // output data of each row
	while($row = $result->fetch_assoc()) {
		
		echo "<tr>\n";
		echo "    <td>".$row["uzsakyto_id"]."</td>\n";
		echo "    <td>".$row["user_name"]."</td>\n";
		echo "    <td>".$row["draudimo_id"]."</td>\n";
		echo "    <td>".$row["draudimo_aprasas"]."</td>\n";
		echo "    <td>".$row["uzsakymo_data"]."</td>\n";
    echo "    <td>"."<a href='atsaukimasUzsakyto.php?uzsakyto_id=".$row["uzsakyto_id"]. "' onclick='return confirmDelete(this);'>Atšaukti draudimą</a>"."</td>\n";
		
		
	}
	
	echo "</table>\n";

	} else {
    echo "Neturite užsakytų draudimų.";
}
$conn->close();
?>

</div>


</body>


