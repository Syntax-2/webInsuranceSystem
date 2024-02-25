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
<html>
  <head>
    <title>Contact form</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="main-block">
      <div class="left-part">
        <i class="fas fa-envelope"></i>
        <i class="fas fa-at"></i>
        <i class="fas fa-mail-bulk"></i>
      </div>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="text-aling: center;">
        <h1>Pridėti Draudimą:</h1>
        <div class="info">
          <input type="text" name="kategorija" placeholder="Įveskite kategoriją">
          <input type="text" name="draudimo_suma" placeholder="Įveskite draudimo sumą">
          <input type="text" name="menesine_imoka" placeholder="Įveskite mėnesinę įmoką">
          <input type="text" name="aprasas" placeholder="Įveskite draudimo aprašymą">
          <input type="text" name="salygu_id" placeholder="Įveskite Salygu Numerį">
        </div>
        <button type="submit">Pateikti</button>
      </form>
    </div>
  </body>
</html>


<?php

include 'connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
		
	$kategorija = $_POST["kategorija"];
    $draudimo_suma = $_POST["draudimo_suma"];
    $menesine_imoka = $_POST["menesine_imoka"];
    $aprasas = $_POST["aprasas"];
    $salygu_id = $_POST["salygu_id"];
    
    
    $sql = "INSERT INTO draudimo_polisai(draudimo_id, kategorija, draudimo_suma, menesine_imoka, aprasas, salygu_id)".
    "VALUES (NULL, '$kategorija', '$draudimo_suma', '$menesine_imoka', '$aprasas', '$salygu_id')";
    
    $result = $conn->query($sql);
    
    header('Location: http://localhost/draudimas/draudimaiAdmin.php');
    
	


}




?>


