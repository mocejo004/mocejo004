<?php
	// Konexioa sortu
	$sql = mysql_connect('localhost', 'root', 'root') or die(mysql_error());
	// Konexioa egiaztatu
	mysql_select_db("QUIZ") or die(mysql_error());
	$email='mzumarraasdasdga004@ikasle.ehu.eus';
	$arg = mysql_query("select IzenAbizenak from ERABILTZAILEA where Eposta='$email'",$sql) or die(mysql_error());	
	$row = mysql_fetch_array( $arg );
	if($row[0]!=null){
		echo "aurkitu da '$row[0]'";
	}
	else{echo "ez da aurkitu";}
?>