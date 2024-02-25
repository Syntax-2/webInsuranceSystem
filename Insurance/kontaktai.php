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
	<a href="index.php">Titulinis</a>
	<a href="draudimai.php">Draudimai</a>
	<a href="uzsakytiDraud.php">Užsakyti draudimai</a>
	<a href="asmenineinfo.php">Asmeninė informacija</a>
	<a href="kontaktai.php">Kontaktai</a>
	<div class="animation start-home"></div>
</nav>


<h2>informacija!</h2>


	<h2>Kontaktinis telefono numeris:</h2>
	<h4>+37063577875</h4><br>
	<h2>El. pašto adresas:</h2><br>
	<h4>draudimailtu@gmail.com</h4><br>


</body>


