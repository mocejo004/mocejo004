<?php
	
	$baimena=$_GET['baimena'];
	$id=$_GET['id'];
	
	$mysqli = new mysqli("mysql.hostinger.es", "u432353203_final", "123456", "u432353203_final");

	if ($mysqli->connect_errno) {
		printf("Fall� la conexi�n: %s\n", $mysqli->connect_error);
		exit();
	}
	
	$result =$mysqli->query("UPDATE ARGAZKIA SET Kategoria='$baimena' WHERE Id=$id");
	
	if(!$result){
		echo '<p style="color:red">Ezin izan da kategoria aldatu.</p>';
	}else{
		echo '<button type="button"'; if($baimena=="Publikoa"){echo ' style="background-color:green" disabled="true" ';}else{echo ' style="background-color:red"';} echo ' class="btn btn-sm btn-primary" onclick="baimenaAldatu(\'Publikoa\',\''.$id.'\')" >Publikoa</button>';
		echo '<button type="button" '; if($baimena=="Pribatua"){echo ' style="background-color:green" disabled="true" ';}else{echo ' style="background-color:red"';} echo 'class="btn btn-sm btn-primary" onclick="baimenaAldatu(\'Pribatua\',\''.$id.'\')" >Pribatua</button>';
		echo '<button type="button"'; if($baimena=="Atzipen mugatua"){echo ' style="background-color:green" disabled="true" ';}else{echo ' style="background-color:red"';} echo ' class="btn btn-sm btn-primary" onclick="baimenaAldatu(\'Atzipen mugatua\',\''.$id.'\')" >Mugatua</button>';
	}

?>