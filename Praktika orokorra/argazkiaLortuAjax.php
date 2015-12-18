<?php
	
	$kategoria=$_GET['kategoria'];
	$eposta=$_GET['jabea'];
	
	$mysqli = new mysqli("mysql.hostinger.es", "u432353203_final", "123456", "u432353203_final");

	if ($mysqli->connect_errno) {
		printf("Falló la conexión: %s\n", $mysqli->connect_error);
		exit();
	}
	
	if($kategoria=='publikoa'){
		$query = "SELECT Argazkia,Id,Izena,Kategoria FROM Argazkia WHERE Kategoria='$kategoria'";
		
	}else if($kategoria=='atzipenMugatua'){
		
		$query = "SELECT Argazkia,Id,Izena,Kategoria FROM Argazkia WHERE Kategoria='Atzipen mugatua' ";
	
	
	}else{
		$query = "SELECT Argazkia,Id,Izena,Kategoria FROM Argazkia WHERE Eposta='$eposta' ";
	}
	
	$result =$mysqli->query($query);
	
	if (mysqli_num_rows($result) == 0)
		echo '<h1 style="color:orange">Momentu honetan ez dago argazkirik</h1>';
	else
	{
		while(list($image_time, $id, $izena, $kategor) = mysqli_fetch_row($result))
		{
			echo "<div class='col-lg-4 col-md-4 col-xs-6 thumb col-offset-4' id='$izena'>
					<a class='thumbnail' href='#' id='$id'>
						<img class='img-responsive'  src='data:image/jpeg;base64,".base64_encode( $image_time )."' />
					</a>
					<b>Izena:</b>$izena</br>";
					
			if($kategoria=='pribatua'){
				echo "<p id='button$id'>";
					echo '<button type="button"'; if($kategor=="Publikoa"){echo ' style="background-color:green" disabled="true" ';}else{echo ' style="background-color:red"';} echo ' class="btn btn-sm btn-primary" onclick="baimenaAldatu(\'Publikoa\',\''.$id.'\')" >Publikoa</button>';
					echo '<button type="button" '; if($kategor=="Pribatua"){echo ' style="background-color:green" disabled="true" ';}else{echo ' style="background-color:red"';} echo 'class="btn btn-sm btn-primary" onclick="baimenaAldatu(\'Pribatua\',\''.$id.'\')" >Pribatua</button>';
					echo '<button type="button"'; if($kategor=="Atzipen mugatua"){echo ' style="background-color:green" disabled="true" ';}else{echo ' style="background-color:red"';} echo ' class="btn btn-sm btn-primary" onclick="baimenaAldatu(\'Atzipen mugatua\',\''.$id.'\')" >Atzipen mugatua</button>';
				echo "<p>";
			}
			
			echo "</div>";
				
		}
	}
    
	
?>