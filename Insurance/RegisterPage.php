<?php


$conn = new mysqli('localhost', 'root', '', 'draudimusistema');

$user_name = $email = $password = "";
$nameErr = $emailErr = $passwordErr = "";

$stiprumas = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST"){

  $user_name = test_input($_POST["user_name"]);


  $sql = mysqli_query($conn, "SELECT user_name from vartotojai WHERE user_name = '$user_name'");
  if (mysqli_num_rows($sql) > 0) {
    $nameErr = "Vardas jau užimtas";
    $stiprumas--;
  }

  
  if (!preg_match("/^[a-zA-Z-' ]*$/",$user_name)) {
    $nameErr = "Galimos tik raidės ir tarpai.";
  }
  else{
    $stiprumas++;
  }

  $email = test_input($_POST["email"]);
  // check if e-mail address is well-formed
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Netinkamas El.Paštas";
  }
  else{
    $stiprumas++;
  }

  if($_POST["password"] == $_POST["password1"]){
    $stiprumas++;
  }
  else{
    $passwordErr = "Slatažodžiai nesutampa.";
  }

  if($stiprumas == 3){
    $to = $email;
  $subject = "Sveikinam prisijungus prie svetainės!";
  $txt = "Maloniai kviečiame užsisakyti norimą draudimą mūsų puslapyje.";
  $headers = "From: sender@gmail.com" . "\r\n" .
  "CC: sender@gmail.com";

  mail($to,$subject,$txt,$headers);
    register();
  }

}


function register(){

  $user_name = $_POST['user_name'];
  $email = $_POST['email'];
  $password =base64_encode($_POST['password']);
  
  

  $conn = new mysqli('localhost', 'root', '', 'draudimusistema');

  if($conn -> connect_error){
      die('connection failed: '.$conn -> connect_error);
  }
  else{
      $stmt = $conn->prepare("insert into vartotojai(user_name, password, email) values (?, ?, ?)");
      $stmt ->bind_param("sss", $user_name, $password, $email);
      $stmt -> execute();
      echo "registration successfull";
      $stmt ->close();
      $conn ->close();
  }


  
  
  


  header('Location: http://localhost/draudimas/loginPage.php');
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>


<!DOCTYPE html>
<html>
  <title>Registracija</title>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">
  </head>
  <body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="text-aling: center;">
      <h1>Registruokis</h1>
      <div class="icon">
        <i class="fas fa-user-circle"></i>
      </div>
      <div class="formcontainer">
      <div class="container">
        <label for="uname"><strong>Vardas ir pavardė</strong></label>
        <span class="error"><?php echo $nameErr;?></span>
        <input type="text" placeholder="Įveskite Vardą ir pavardę" name="user_name" required>
        <label for="mail"><strong>El.Paštas</strong></label>
        <span class="error"><?php echo $emailErr;?></span>
        <input type="text" placeholder="Iveskite EL.Paštą" name="email" required>
        <label for="psw"><strong>Slaptažodis</strong></label>
        <span class="error"><?php echo $passwordErr;?></span>
        <input type="password" placeholder="Įveskite Slaptažodį" name="password" required>
        <label for="psw"><strong>Slaptažodis</strong></label>
        <input type="password" placeholder="Pakartokite Slaptažodį" name="password1" required>
      </div>
      <button type="submit"><strong>Registruotis</strong></button>
      <div class="container" style="background-color: #eee">
        <label style="padding-left: 15px">
        
        </label>
        <span class="psw"><a href="LoginPage.php">Prisijungti galite čia!</a></span>
      </div>
    </form>
  </body>
</html>



