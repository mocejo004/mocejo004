<!DOCTYPE html>
<html>
<head>
<title>Formulario</title>
</head>
<body>
<form action=" " method="post">
Eposta:
<input type="text" name="Eposta" />
Pasahitza:
<input type="password" name="Pasahitza" />
<input type="submit" name="click" value="Login"/><br><br>
</form>
<?php
$sql = mysql_connect('localhost', 'root', 'root') or die(mysql_error());
mysql_select_db("QUIZ") or die(mysql_error());
if (isset($_POST['click'])){
	if(!$_POST['Eposta'] | !$_POST['Pasahitza']){
			echo('Bete Eposta edo/eta Pasahitza');
	}else{
		$eposta=$_POST['Eposta'];
		if (!filter_var($eposta,FILTER_VALIDATE_REGEXP,
			array("options"=>array("regexp"=>"/^[a-z]{1,}\d{3}@ikasle\.ehu\.(eus|es)$/"))) === false) {
			echo("$eposta epostaren formatua egokia. <br>");
			$pasahitza=$_POST['Pasahitza'];
			if (!filter_var($pasahitza,FILTER_VALIDATE_REGEXP,
			array("options"=>array("regexp"=>"/^.{6,}$/"))) === false) {
				echo("pasahitz formatua egokia. <br>");
				$arg = mysql_query("select IzenAbizenak from ERABILTZAILEA where Eposta='$eposta' and Pasahitza='$pasahitza'") or die(mysql_error());	
				$row = mysql_fetch_array( $arg );
				if($row[0]!=null){
					header('Location:logeatuta.html');
				}
					else{echo "<strong style='color: red;'>Sartutako pasahitza edo izena ez dira egokiak!</strong>";}			
			}else{
				echo "Pasaitzaren formatua ez da egokia, beraz ezin zara logeatu. ";
			} 
		}else {
			echo("$eposta -ren formatua ez da egokia, beraz ezin zara logeatu. ");
		}
	}
}
?>
<br>
<br>
<span><a href="layout.html">Atzera joan</a></span>
</body>
</html>