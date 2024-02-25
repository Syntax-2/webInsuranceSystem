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
        <h1>Atnaujinti Darbuotoją</h1>
        <div class="info">
          <input type="text" name="darbuotojo_username" placeholder="Darbuotojo Vardas">
          <input type="password" name="darbuotojo_slaptazodis" placeholder="Darbuotojo Slaptažodis">
          <input type="text" name="darbuotojo_email" placeholder="Darbuotojo El.Paštas">
          <input type="text" name="telefono_nr" placeholder="Telefono Nr.">
        </div>
        <button type="submit">Atnaujinti</button>
      </form>
    </div>
  </body>
</html>


<?php

include 'connection.php';



if($_SERVER["REQUEST_METHOD"] == "POST"){
		
	$darbuotojo_username = $_POST["darbuotojo_username"];
    $darbuotojo_slaptazodis = base64_encode($_POST["darbuotojo_slaptazodis"]);
    $darbuotojo_email = $_POST["darbuotojo_email"];
    $telefono_nr = $_POST["telefono_nr"];
    
   
    $sql = "INSERT INTO darbuotojai(darbuotojo_username, darbuotojo_slaptazodis, darbuotojo_email, telefono_nr)"."VALUES ('$darbuotojo_username', '$darbuotojo_slaptazodis', '$darbuotojo_email', '$telefono_nr')";
    
    $result = $conn->query($sql);
    
    header('Location: http://localhost/draudimas/darbuotojaiAdmin.php');
    
	


}


?>