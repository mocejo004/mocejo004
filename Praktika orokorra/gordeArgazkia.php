<?php
	session_start ();
	$link = new mysqli("mysql.hostinger.es", "u432353203_final", "123456", "u432353203_final");

	if ($link->connect_errno) {
		printf("Falló la conexión: %s\n", $link->connect_error);
		exit();
	}
	
	if (is_uploaded_file($_FILES["argazkia"]["tmp_name"]))
	{
        if ($_FILES["argazkia"]["type"]=="image/jpeg" || $_FILES["argazkia"]["type"]=="image/pjpeg" || $_FILES["argazkia"]["type"]=="image/gif" || $_FILES["argazkia"]["type"]=="image/bmp" || $_FILES["argazkia"]["type"]=="image/png")
		{
			$eposta=$_SESSION['eposta'];
			$mota=$_FILES["argazkia"]["type"];
			$IzenaAlbum=$_POST['album'];
			if($IzenaAlbum=="albumBerria"){
					$albumIzena=$_POST['albumName'];
					$result=$link->query("INSERT INTO ALBUMA(Eposta,AlbumIzena) VALUES('$eposta','$albumIzena')");
	
					if(!$result)
					{
						printf("Kontsultak huts egin du album berri bat sortzerakoan");
						exit();
					}
					$IzenaAlbum=$albumIzena;
			}
			$izena=$_POST['imgName'];
			$kategoria=$_POST['imgPerm'];
			$argazkia=addslashes(file_get_contents($_FILES['argazkia']['tmp_name']));		
			$result=$link->query("SELECT IdAlbum FROM ALBUMA WHERE AlbumIzena='$IzenaAlbum'");
			if(!$result){
				echo "Errorea albuma lortzerakoan.";
				exit();
			}
			$idAlbum=$result->fetch_array(MYSQLI_BOTH);
			$id=$idAlbum['IdAlbum'];
			$result=$link->query("INSERT INTO ARGAZKIA(Izena,Argazkia,Eposta,Kategoria,IdAlbum) VALUES('$izena','$argazkia','$eposta','$kategoria','$id')");
			
			if(!$result){
				echo "Errorea datuak datu basean gordetzerakoan.";
				exit();
			}
			echo "Datuak ondo gorde dira.";
		}
	}
	header('Location:logeatuta.php');

	mysqli_close($link);
?>