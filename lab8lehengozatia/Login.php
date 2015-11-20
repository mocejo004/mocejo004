<?php
$sql = mysql_connect('localhost', 'root', 'root') or die(mysql_error());
mysql_select_db("QUIZ") or die(mysql_error());
if (isset($_POST['click'])){
	if(!$_POST['Eposta'] | !$_POST['Pasahitza']){
			echo('Bete Eposta edo/eta Pasahitza');
	}else{
		$eposta=$_POST['Eposta'];
		$pasahitza=$_POST['Pasahitza'];
		$arg = mysql_query("select IzenAbizenak from ERABILTZAILEA where Eposta='$eposta' and Pasahitza='$pasahitza'") or die(mysql_error());	
		$row = mysql_fetch_array( $arg );
		if($row[0]!=null){
			if($eposta=="web000@ehu.eus"){
				setcookie("logeatutakoErab",$eposta);
				header('Location:galderakBerrikusi.php');
			}else{
				$sql="INSERT INTO KONEXIOA(Eposta) VALUES('$eposta')";
				$result=mysql_query($sql);
				$sql="SELECT MAX(Id) FROM KONEXIOA";
				$emaitza=mysql_query($sql);
				if ($row2 = mysql_fetch_row($emaitza)) {
					$KonexioId=$row2[0];
				}else{
					$KonexioId=0;
				}
				setcookie("KonexioId",$KonexioId);
				if(!$result){
					echo'Konstultak huts egin du, ezin isan da konexioa taulan baliorik gorde: ' . mysql_error();
				}else{
					setcookie("logeatutakoErab",$eposta);
					header('Location:handlingQuizzes.php');
				}
			}
		}
		else{
			header('Location:Login.html');
		}			
	}
}
?>