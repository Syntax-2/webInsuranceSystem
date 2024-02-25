<?php
include 'connection.php';


$nepatvirtinto_id = $_GET['nepatvirtinto_id'];
$user_name = $_GET['user_name'];
$papildoma_info = $_GET['papildoma_info'];
$draudimo_id = $_GET['draudimo_id'];

echo $nepatvirtinto_id;
echo $user_name;
echo $papildoma_info;



    
$name = $_SESSION["username"];


	$sql = "SELECT user_name, adresas, uzsakyto_id, lytis
    FROM vartotojai
    INNER JOIN privati_info ON vartotojai.user_name = privati_info.user_name
    INNER JOIN patvirtinti_draud ON vartotojai.user_name = patvirtinti_draud.user_name
    WHERE user_name = '$name'";
	$result = $conn->query($sql);




    
	if ($result->num_rows > 0) {

	echo "<table class=\"table\">\n";
    echo "  <tr>\n";
    echo "    <th>Informacijos nr.</th>\n";
    echo "    <th>Vardas</th>\n";
    echo "    <th>Adresas</th>\n";
    echo "    <th>Gimimo data</th>\n";
	echo "    <th>Lytis</th>\n";
    echo "    <th>Telefono nr.</th>\n";
    echo "    <th></th>\n";
    echo "  </tr>";
	while($row = $result->fetch_assoc()) {
	echo "<tr>\n";
	echo "    <td>".$row["info_id"]."</td>\n";
	echo "    <td>".$row["user_name"]."</td>\n";
	echo "    <td>".$row["adresas"]."</td>\n";
	echo "    <td>".$row["gimimo_data"]."</td>\n";
	echo "    <td>".$row["lytis"]."</td>\n";
	echo "    <td>".$row["telefono_nr"]."</td>\n";
	}

}
else{
	header('Location: http://localhost/draudimas/info_pildymas.php');
}



$sql = "DELETE FROM nepatvirtinti_draud WHERE nepatvirtinto_id = '$nepatvirtinto_id'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $conn->error;
  }

  header('Location: http://localhost/draudimas/uzklausosAdmin.php');


?>