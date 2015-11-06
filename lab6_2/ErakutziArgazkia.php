<?php
	// Konexioa sortu
	$sql = mysql_connect('localhost', 'root', 'root') or die(mysql_error());
	// Konexioa egiaztatu
	mysql_select_db("QUIZ") or die(mysql_error());
	$email=$_GET["id"];
	$arg = mysql_query("select img from ERABILTZAILEA where Eposta='$email'") or die(mysql_error());	
	$row = mysql_fetch_array( $arg );
	echo $row[0];
?>