<?php

	$mysqli = new mysqli("mysql.hostinger.es", "u432353203_final", "123456", "u432353203_final");

	if ($mysqli->connect_errno) {
		printf("Falló la conexión: %s\n", $mysqli->connect_error);
		exit();
	}

	$eposta=$_SESSION['eposta'];

	$resultado = $mysqli->query("SELECT AlbumIzena FROM ALBUMA WHERE Eposta='$eposta'");

	if (mysqli_num_rows($resultado) > 0){
		
		while(list($albumIzen) = mysqli_fetch_row($resultado))
		{
			$emaitza=$emaitza.'<option value="'.$albumIzen.'">'.$albumIzen.'</option>';
		}
		echo $emaitza;
	}

	$mysqli->close();
?>