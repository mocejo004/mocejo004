<?php
	
	$eposta=$_GET['eposta'];

	$mysqli = new mysqli("mysql.hostinger.es", "u432353203_final", "123456", "u432353203_final");

	if ($mysqli->connect_errno) {
		printf("Fall� la conexi�n: %s\n", $mysqli->connect_error);
		exit();
	}
	
	$result =$mysqli->query("UPDATE ERABILTZAILEA SET Onartua=1 WHERE Eposta='$eposta'");
	
	if(!$result){
		echo '<p style="color:red">Ezin izan da erabiltzailea onartu.</p>';
	}else{
		echo '<p style="color:green">Erabiltzailea onartua izan da.</p>';
	}

?>