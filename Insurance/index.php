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
	<a href="index.php">Titulinis</a>
	<a href="draudimai.php">Draudimai</a>
	<a href="uzsakytiDraud.php">Užsakyti draudimai</a>
	<a href="asmenineinfo.php">Asmeninė informacija</a>
	<a href="kontaktai.php">Kontaktai</a>
	<div class="animation start-home"></div>
</nav>


<h2>Ieškokite sau tinkamų pasiūlymų!</h2>

<div class="wrapper">
	<div class="content">
		<h2 class="title">
Kodėl rinktis MUS?</h2> 
<div class="info">
	
<h4>Prieinamumas:</h4> 
<h4>Užtikriname paprastą ir greitą klientų aptarnavimą, būdami pasiekiami bet kuriais kanalais visose Baltijos šalyse 24/7.</h4>
<h4>Žmogiškumas:</h4> 
<h4>Kalbame paprasta, suprantama kalba. Produktai pritaikomi įvairių klientų individualiems poreikiams.</h4>
<h4>Patikimumas:</h4> 
<h4>Patikimumą užtikrina patirtis ir gebėjimas keistis, priimant atsakingus sprendimus.</h4>
</body>


