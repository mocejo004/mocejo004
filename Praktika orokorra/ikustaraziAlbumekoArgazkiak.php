<?php
	
	session_start();
	
	$eposta=$_SESSION['eposta'];
	$albuma=$_GET['albuma'];
	
	$mysqli = new mysqli("mysql.hostinger.es", "u432353203_final", "123456", "u432353203_final");

	if ($mysqli->connect_errno) {
		printf("Falló la conexión: %s\n", $mysqli->connect_error);
		exit();
	}
	
	$result =$mysqli->query("SELECT IdAlbum FROM ALBUMA WHERE Eposta='$eposta' AND AlbumIzena='$albuma' ");
	if (mysqli_num_rows($result) == 0)
		echo '<ul><li>Momentu honetan ez dago argazkirik</li>';
	
	$idAlbum=$result->fetch_array(MYSQLI_BOTH);
	$id=$idAlbum['IdAlbum'];
	
	$query = "SELECT Argazkia,Id,Izena,Kategoria FROM Argazkia WHERE IdAlbum='$id' ";
	
	$result =$mysqli->query($query);
	
	if (mysqli_num_rows($result) == 0)
		echo '<ul><li>Momentu honetan ez dago argazkirik</li>';
	else
	{
		while(list($image_time, $id, $izena, $kategor) = mysqli_fetch_row($result))
		{
			echo "<div class='col-lg-3 col-md-4 col-xs-6 thumb' id='$izena'>
					<a class='thumbnail' href='#' id='$id'>
						<img class='img-responsive'  src='data:image/jpeg;base64,".base64_encode( $image_time )."' />
					</a>
					<b>Izena:</b>$izena</br>";
					
				echo "<p id='button$id'>";
					echo '<button type="button" '; if($kategor=="Publikoa"){echo ' style="background-color:green" disabled="true" ';}else{echo ' style="background-color:red"';} echo ' class="btn btn-sm btn-primary" onclick="baimenaAldatu(\'Publikoa\',\''.$id.'\')" >Publikoa</button>';
					echo '<button type="button" '; if($kategor=="Pribatua"){echo ' style="background-color:green" disabled="true" ';}else{echo ' style="background-color:red"';} echo 'class="btn btn-sm btn-primary" onclick="baimenaAldatu(\'Pribatua\',\''.$id.'\')" >Pribatua</button>';
					echo '<button type="button"'; if($kategor=="Atzipen mugatua"){echo ' style="background-color:green" disabled="true" ';}else{echo ' style="background-color:red"';} echo ' class="btn btn-sm btn-primary" onclick="baimenaAldatu(\'Atzipen mugatua\',\''.$id.'\')" >Atzipen mugatua</button>';
				echo "<p>";
			
			echo "</div>";
				
		}
	}
    
	
?>