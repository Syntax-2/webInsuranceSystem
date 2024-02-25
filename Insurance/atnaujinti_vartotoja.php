<?php
session_start ();
include 'connection.php';
if($_SERVER["REQUEST_METHOD"] == "GET"){
$_SESSION['user_id'] = $_GET['user_id'];
}
$user_id = $_SESSION["user_id"];
$query=mysqli_query($conn, "select * from `vartotojai` where user_id = '$user_id'");
$row = mysqli_fetch_array($query);


if($_SERVER["REQUEST_METHOD"] == "POST"){    
  $user_id = $_SESSION["user_id"];
  $user_name = $_POST["user_name"];
  $password = base64_encode($_POST["password"]);
  $email = $_POST["email"];

  echo "skaicius " . $_SESSION["user_id"] . ".<br>";
   echo $user_name;
   
    $sql = "UPDATE `vartotojai` SET `user_id` = '$user_id', `user_name` = '$user_name', `password` = '$password', `email` = '$email' WHERE `vartotojai`.`user_id` = '$user_id'";
    //$sql = "UPDATE vartotojai SET user_name='Doemama' WHERE user_id=2";
    $result = $conn->query($sql);
    if ($conn->query($sql) === true) {
			echo "Client record updated successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
    
    header('Location: http://localhost/draudimas/vartotojaiAdmin.php');
    


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
        <h1>Atnaujinti Vartotoją</h1>
        <div class="info">
          <input type="text" name="user_name" value="<?php echo $row['user_name']; ?>" placeholder="Vardas Pavardė">
          <input type="password" name="password" value="<?php echo $row['password']; ?>" placeholder="Slaptažodis">
          <input type="text" name="email" value="<?php echo $row['email']; ?>" placeholder="El.Paštas">
        </div>
        <button type="submit">Atnaujinti</button>
        
      </form>
    </div>
  </body>
</html>



