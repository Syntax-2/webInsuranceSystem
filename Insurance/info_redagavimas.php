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
        <h1>Asmeninė informacija</h1>
        <div class="info">
          <input type="text" name="adresas" placeholder="Adresas">
          <input type="text" name="data" placeholder="Gimimo Data">
          <input type="text" name="lytis" placeholder="Lytis">
          <input type="text" name="numeris" placeholder="Telefono Nr.">
        </div>
        <button type="submit">Pateikti</button>
      </form>
    </div>
  </body>
</html>

<?php


include 'connection.php';

$username = $_SESSION["username"];

if($_SERVER["REQUEST_METHOD"] == "POST"){
		
	$adresas = $_POST["adresas"];
    $data = $_POST["data"];
    $lytis = $_POST["lytis"];
    $numeris = $_POST["numeris"];

    
   
    $sql = "UPDATE privati_info SET adresas='$adresas', gimimo_data = '$data', lytis = '$lytis', telefono_nr = '$numeris' WHERE user_name='$username'";
    
    $result = $conn->query($sql);
    
    header('Location: http://localhost/draudimas/asmenineinfo.php');
    
	


}


?>