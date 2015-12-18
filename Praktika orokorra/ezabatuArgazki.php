<?php
	
	$id=$_GET['id'];

	$mysqli = new mysqli("mysql.hostinger.es", "u432353203_final", "123456", "u432353203_final");

	if ($mysqli->connect_errno) {
		printf("Fall� la conexi�n: %s\n", $mysqli->connect_error);
		exit();
	}
	
	$result =$mysqli->query("DELETE FROM ARGAZKIA WHERE Id='$id'");
	
	if(!$result){
		echo '<p style="color:red">Ezin izan da argazkia ezabatu.</p>';
	}else{
		echo '<p style="color:green">Argazkia ezabatua izan da.</p>';
	}

?>