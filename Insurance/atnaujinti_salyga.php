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
          <input type="text" name="minimalus_amzius" placeholder="Minimalus amžius">
          <input type="text" name="minimalus_terminas" placeholder="Minimalus terminas">
        </div>
        <button type="submit">Pateikti</button>
      </form>
    </div>
  </body>
</html>

<?php

include 'connection.php';
if($_SERVER["REQUEST_METHOD"] == "GET"){
    $_SESSION['salygu_id'] = $_GET['salygu_id1'];
}


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $salygu_id1 = $_SESSION["salygu_id"];
	$minimalus_amzius = $_POST["minimalus_amzius"];
    $minimalus_terminas = $_POST["minimalus_terminas"];

    echo $salygu_id1;
    

    $sql = "UPDATE salygos SET salygu_id='$salygu_id', minimalus_amzius = '$minimalus_amzius', minimalus_terminas = '$minimalus_terminas' WHERE salygu_id='$salygu_id1'";
    
    $result = $conn->query($sql);
    
    header('Location: http://localhost/draudimas/salygosAdmin.php');
    
	


}




?>