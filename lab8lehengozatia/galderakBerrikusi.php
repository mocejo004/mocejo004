<?php
if ($_COOKIE['logeatutakoErab']== '') 
{ 
	header("Location:Login.html");
	exit(); 
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Galderak berrikusi</title>
<script src="js/galderakBerrikusi.js"></script>
</head>
<body>
<form>
<input type="button" onclick="location='Logout.php'" value="Irten">
<?php
$link=mysqli_connect("localhost", "root", "root","QUIZ");
if (!$link) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    exit;
}	
$sql="SELECT * FROM GALDERA";
$result=$link->query($sql);
if(!$result){
		echo'Konstultak huts egin du: ' . mysql_error();
		echo'<br><span><a href="layout.html">Atzera bueltatu</a></span>';
}else{
	$count=1;
	while($lerro= $result->fetch_array(MYSQLI_BOTH)){
		echo "<div>";
			echo $count.".Galdera</br>Egilea:".$lerro['Eposta'];
			echo '</br>Galdera:</br><textarea name="galdera" id="'.$lerro['pID'].'Galdera" rows="5" cols="40">'.$lerro['Galdera'].'</textarea>';
			echo '</br>Erantzuna:</br><input name="erantzuna" id="'.$lerro['pID'].'Erantzuna"  value="'.$lerro['Erantzuna'].'" size="80">';
			echo '</br>Zailtasuna:<input id="'.$lerro['pID'].'Zailtasuna" maxlength="1" onkeypress="return bakarrikZenbakiak(event);" type="text" value="'.$lerro['Zailtasuna'].'" size="1"name="IzenAbizenak">(1 eta 5 artean)';
			echo '<br><input type="button" onclick="gordeAldaketak('.$lerro['pID'].')" value="Editatu">';
			echo '<div id="'.$lerro['pID'].'div">';
		echo"</div></br>";
		$count++;
	}
}
mysqli_close($link);
?>
</form>
</body>
</html>
