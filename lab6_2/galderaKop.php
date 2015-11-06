<?php
$linki=new mysqli ("localhost","root","","QUIZ");
if($linki->connect_errno){
	echo "errorea konektatzean";
}else{
	$eposta=$_COOKIE["logeatutakoErab"];
	$sqli1="SELECT * FROM GALDERA";
	$sqli2="SELECT * FROM GALDERA WHERE Eposta='$eposta';";
	$result1=$linki->query($sqli1);
	$result2=$linki->query($sqli2);
		if(!($result1 && $result2)){
			echo'Konstultak huts egin du: ' . mysql_error();
		}else{
			echo "<br/>Nire galderak/Galderak guztira DB:".mysqli_num_rows($result2)."/".mysqli_num_rows($result1)."";
		}
}
mysqli_close ($linki);
?>
