<?php
$connection = new mysqli('localhost', 'root', '', 'muffinshop');

if($connection->connect_error){
	die("<h1>Hiba az adatbázishoz való kapcsolódás során:</h1> " . $connection->connect_error);
}

$connection->set_charset("utf-8");

$handle = fopen('cities.csv', "r");
$i = 0;
while(($data = fgetcsv($handle, 5000, ";")) !== FALSE){
	if($i > 0){
		$import = "INSERT INTO cities (zip, city) VALUES ('".$data[0]."', '".$data[1]."')";
		$sql = $connection->prepare($import);
		if(!$sql->execute()){
			echo "hiba volt: <br> $sql->error";
		}else if($sql->affected_rows == 0){
			echo var_dump($sql);
		}
	}
	$i = 1;
}
?>