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
        <h1>Pridėti užsakytą draudimą</h1>
        <div class="info">
          <input type="text" name="user_name" placeholder="Kliento Vardas">
          <input type="text" name="draudimo_id" placeholder="Draudimo ID">
          <input type="text" name="draudimo_aprasas" placeholder="Draudimo aprasas">
        </div>
        <button type="submit">Pridėti</button>
      </form>
    </div>
  </body>
</html>


<?php

include 'connection.php';



if($_SERVER["REQUEST_METHOD"] == "POST"){
		
	$user_name = $_POST["user_name"];
    $draudimo_id = $_POST["draudimo_id"];
    $draudimo_aprasas = $_POST["draudimo_aprasas"];
    
   
    $sql = "INSERT INTO patvirtinti_draud(uzsakyto_id, user_name, draudimo_id, draudimo_aprasas, uzsakymo_data)"."VALUES (NULL, '$user_name', '$draudimo_id', '$draudimo_aprasas', current_timestamp())";
    
    $result = $conn->query($sql);
    
    header('Location: http://localhost/draudimas/draudimaiAdmin.php');
    
	


}


?>