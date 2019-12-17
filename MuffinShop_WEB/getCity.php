<?php
$connection = new mysqli("localhost", "root", "", "muffinshop");

if($connection->connect_error){
    die("<h1>Hiba az adatbázishoz való kapcsolódás során:</h1> " . $connection->connect_error);
}

$connection->set_charset("utf-8");


$sql = $connection->prepare("SELECT city FROM cities WHERE zip = ?");
$sql->bind_param("s", $_GET["zip"]);
$sql->execute();

$result = $sql->get_result();

if($result->num_rows > 0){
    echo $result->fetch_assoc()["city"];
}else{
    echo "Hibás irányítószám!";
}
?>