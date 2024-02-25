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
        <h1>Atnaujinti Draudimą</h1>
        <div class="info">
          <input type="text" name="kategorija" placeholder="Kategorija">
          <input type="text" name="draudimo_suma" placeholder="Draudimo Suma">
          <input type="text" name="menesine_imoka" placeholder="Menesinė Įmoka">
          <input type="text" name="aprasas" placeholder="Draudimo Aprašymas">
          <input type="text" name="salygu_id" placeholder="Salygų Numeris">
        </div>
        <button type="submit">Atnaujinti</button>
      </form>
    </div>
  </body>
</html>


<?php

include 'connection.php';

if($_SERVER["REQUEST_METHOD"] == "GET"){
		$draudimo_id=$_GET["draudimo_id"];
    
}


if($_SERVER["REQUEST_METHOD"] == "POST"){
		
	$kategorija = $_POST["kategorija"];
    $draudimo_suma = $_POST["draudimo_suma"];
    $menesine_imoka = $_POST["menesine_imoka"];
    $aprasas = $_POST["aprasas"];
    $salygu_id = $_POST["salygu_id"];
    
    echo $draudimo_id;

    $sql = "UPDATE draudimo_polisai SET kategorija='$kategorija', draudimo_suma = '$draudimo_suma', menesine_imoka = '$menesine_imoka', aprasas = '$aprasas', salygu_id = '$salygu_id' WHERE draudimo_id='$draudimo_id'";
    
    $result = $conn->query($sql);
    
    header('Location: http://localhost/draudimas/draudimaiAdmin.php');
    
	


}


?>