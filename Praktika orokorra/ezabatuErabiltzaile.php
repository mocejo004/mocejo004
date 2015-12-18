<?php
	
	$eposta=$_GET['eposta'];

	$mysqli = new mysqli("mysql.hostinger.es", "u432353203_final", "123456", "u432353203_final");
	
	if ($mysqli->connect_errno) {
		printf("Fall� la conexi�n: %s\n", $mysqli->connect_error);
		exit();
	}
	
	$result =$mysqli->query("DELETE FROM ERABILTZAILEA WHERE Eposta='$eposta'");
	
	if(!$result){
		echo '<p style="color:red">Ezin izan da erabiltzailea ezabatu.</p>';
	}else{
		echo '<p style="color:green">Erabiltzailea ezabatua izan da.</p>';
	}
	
	$result =$mysqli->query("DELETE FROM ALBUMA WHERE Eposta='$eposta'");
	
	if(!$result){
		echo '<p style="color:red">Ezin izan da erabiltzailearen albuma ezabatu.</p>';
	}else{
		echo '<p style="color:green">Erabiltzailearen albumak ezabatuak izan dira.</p>';
	}
	
	$result =$mysqli->query("DELETE FROM ARGAZKIA WHERE Eposta='$eposta'");
	
	if(!$result){
		echo '<p style="color:red">Ezin izan dira erabiltzailearen argazkiak ezabatu.</p>';
	}else{
		echo '<p style="color:green">Erabiltzailearen argazkiak ezabatuak izan dira.</p>';
	}
?>