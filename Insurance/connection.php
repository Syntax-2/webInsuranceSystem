<?php

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "draudimusistema";



$conn = mysqli_connect($servername, $username, $password, $dbname) or die("nepavyko");

if (!$conn) {
die("nepavyko: " . mysqli_connect_error());
}
?>