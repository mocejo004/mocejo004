<?php
$link = mysql_connect('localhost', 'root', 'root')
    or die('Ezin isan da konektatu: ' . mysql_error());
	
mysql_select_db('QUIZ') or die('Ezin izan da datu basera konektatu.');
$IzenAbizenak=$_POST["IzenAbizenak"];
$Eposta=$_POST["Eposta"];
$Pasahitza=$_POST["Pasahitza"];
$Telefono=$_POST["Telefono"];
$Espezialitatea=$_POST["Espezialitatea"];
if(strcmp($Espezialitatea,"Besterik")==0){
	$Espezialitatea=$_POST["besterik2"];
}
$comentarios=$_POST["comentarios"];
$sql="INSERT INTO ERABILTZAILEA(IzenAbizenak,Eposta,Pasahitza,Telefono,Ezpesialitatea,comentarios) VALUES('$IzenAbizenak','$Eposta','$Pasahitza','$Telefono','$Espezialitatea','$comentarios')";

$result=mysql_query($sql);
if(!$result){
	echo'Konstultak huts egin du: ' . mysql_error();
	echo'<br><span><a href="singnUp.html">Atzera bueltatu</a></span>
';
}else{
		echo'Dena ondo joan da, nahi baduzu<span><a href="IkusiErabiltzaileak.php"> erabiltzaile lista </a></span>ikus dezakezu.';
}
mysql_close($link);
?>


