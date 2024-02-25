<?php
session_start ();

$zinute = "";

include 'connection.php';

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

<script>
function confirmDelete(delUrl) {
  if (confirm("Ar tikrai norite užsisakyti šį draudimą?")) {
   document.location = delUrl;
  }
}
</script>

<nav>
	<a href="index.php">Titulinis</a>
	<a href="draudimai.php">Draudimai</a>
	<a href="uzsakytiDraud.php">Užsakyti draudimai</a>
	<a href="asmenineinfo.php">Asmeninė informacija</a>
	<a href="kontaktai.php">Kontaktai</a>
	<div class="animation start-home"></div>
</nav>

<h2>Draudimai:</h2>

<div class = "lentele">



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
    	echo "    <td>"."<a href='uzsakymas.php?draudimo_id=".$row["draudimo_id"]. "' onclick='return confirmDelete(this);'>Užsakyti draudimą</a>"."</td>\n";
		
		
	}
	
	echo "</table>\n";

	} else {
    echo "0 results";
}
$conn->close();
?>



</div>

<h2><?php echo $zinute; ?></h2>




</body>


