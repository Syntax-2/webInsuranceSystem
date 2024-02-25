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
    
<body>
<div class = "name">
	<h3 class ="loginName"><?php
									
									echo "welcome, ".$_SESSION["username"];
								
							?></h3>
	<div class = "atsijungti">
		<form method="post">
		 <input type="submit" name="button1"
                class="button" value="Button1" /> 
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

<div class = "lentele">

<?php

include'connection.php';

$name = $_SESSION["username"];




	$sql = "SELECT * from privati_info where user_name='$name'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {

	echo "<table class=\"table\">\n";
    echo "  <tr>\n";
    echo "    <th>Informacijos nr.</th>\n";
    echo "    <th>Vardas</th>\n";
    echo "    <th>Adresas</th>\n";
    echo "    <th>Gimimo data</th>\n";
	echo "    <th>Lytis</th>\n";
    echo "    <th>Telefono nr.</th>\n";
    echo "    <th></th>\n";
    echo "  </tr>";
	while($row = $result->fetch_assoc()) {
	echo "<tr>\n";
	echo "    <td>".$row["info_id"]."</td>\n";
	echo "    <td>".$row["user_name"]."</td>\n";
	echo "    <td>".$row["adresas"]."</td>\n";
	echo "    <td>".$row["gimimo_data"]."</td>\n";
	echo "    <td>".$row["lytis"]."</td>\n";
	echo "    <td>".$row["telefono_nr"]."</td>\n";
	}

}
else{
	header('Location: http://localhost/draudimas/info_pildymas.php');
}



?>

</div>
<a href='info_redagavimas.php'>Redaguoti informaciją</a>
</form>

</body>


