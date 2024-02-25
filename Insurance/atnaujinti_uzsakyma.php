<?php
session_start ();
include 'connection.php';
if($_SERVER["REQUEST_METHOD"] == "GET"){
$_SESSION['uzsakyto_id'] = $_GET['uzsakyto_id'];
}
$uzsakyto_id = $_SESSION["uzsakyto_id"];
$query=mysqli_query($conn, "select * from `patvirtinti_draud` where uzsakyto_id = '$uzsakyto_id'");
$row = mysqli_fetch_array($query);


	  

if($_SERVER["REQUEST_METHOD"] == "POST"){    
  $uzsakyto_id = $_SESSION["uzsakyto_id"];
  $user_name = $_POST["user_name"];
  $draudimo_id = $_POST["draudimo_id"];
  $draudimo_aprasas = $_POST["draudimo_aprasas"];

   
    $sql = "UPDATE `patvirtinti_draud` SET `uzsakyto_id` = '$uzsakyto_id', `user_name` = '$user_name', `draudimo_id` = '$draudimo_id', `draudimo_aprasas` = '$draudimo_aprasas' WHERE `patvirtinti_draud`.`uzsakyto_id` = '$uzsakyto_id'";
    //$sql = "UPDATE vartotojai SET user_name='Doemama' WHERE user_id=2";
    $result = $conn->query($sql);
    if ($conn->query($sql) === true) {
			echo "Client record updated successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
    
    header('Location: http://localhost/draudimas/draudimaiAdmin.php');
    


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
        <h1>Atnaujinti Užsakymą</h1>
        <div class="info">
          <input type="text" name="user_name" value="<?php echo $row['user_name']; ?>" placeholder="Vardas Pavardė">
          <input type="text" name="draudimo_id" value="<?php echo $row['draudimo_id']; ?>" placeholder="Draudimo ID">
          <input type="text" name="draudimo_aprasas" value="<?php echo $row['draudimo_aprasas']; ?>" placeholder="Draudimo Aprašas">
        </div>
        <button type="submit">Atnaujinti</button>
        
      </form>
    </div>
  </body>
</html>

