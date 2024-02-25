<?php

session_start();
include 'connection.php';
$nameErr = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $username = $_POST["username"];
  $password = $_POST["password"];
}

$sql = "SELECT password from vartotojai where user_name='$username'";
$result = $conn->query($sql);        

  while($row = $result->fetch_assoc()) {
  if($password == base64_decode($row["password"])){
    echo "welcome you have successfully logeed in";
    $_SESSION["username"] = $username;
    header("Location: index.php");
  }
  else{
    echo "Vartotojas sistemoje nerastas";
    $nameErr = "Vartotojas sistemoje nerastas";
  }
  }
$sql = "SELECT darbuotojo_slaptazodis from darbuotojai where darbuotojo_username='$username'";
$result = $conn->query($sql);        

  while($row = $result->fetch_assoc()) {
  if($password == base64_decode($row["darbuotojo_slaptazodis"])){
    echo "welcome you have successfully logeed in";
    $_SESSION["username"] = $username;
    header("Location: vartotojaiAdmin.php");
  }else{
    echo "Vartotojas sistemoje nerastas";
    $nameErr = "Vartotojas sistemoje nerastas";
  }
  
  }


?>


<!DOCTYPE html>
<html>
  <title>Prisijunkite</title>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">
  </head>
  <body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="text-aling: center;">
      <h1>Prisijunkite</h1>
      <div class="icon">
        <i class="fas fa-user-circle"></i>
      </div>
      <div class="formcontainer">
      <div class="container">
        <label for="uname"><strong>Vardas ir pavardė</strong></label>
        <span class="error"><?php echo $nameErr;?></span>
        <input type="text" placeholder="Įveskite Vardą ir pavardę" name="username" required>
        <label for="psw"><strong>Slaptažodis</strong></label>
        <input type="password" placeholder="Įveskite Slaptažodį" name="password" required>
      </div>
      <button type="submit"><strong>Prisijungti</strong></button>
      <div class="container" style="background-color: #eee">
        <label style="padding-left: 15px">
        
        </label>
        <span class="psw"><a href="RegisterPage.php">Registruotis galite čia!</a></span>
      </div>
    </form>
  </body>
</html>








