<?php
if ($_COOKIE['logeatutakoErab']== '') 
{ 
	header("Location:Login.html");
	exit(); 
}
$galdera=$_GET['Galdera'];
$erantzuna=$_GET['Erantzuna'];
$zailtasuna=$_GET['Zailtasuna'];
$id=$_GET['Id'];
$linki=new mysqli ("localhost","root","root","QUIZ");
if($linki->connect_errno){
	echo "errorea konektatzean";
}else{
	
	$sqli ="UPDATE GALDERA SET Galdera='$galdera',Erantzuna='$erantzuna',Zailtasuna='$zailtasuna' WHERE pID='$id'";
	$result=$linki->query($sqli);
	if(!($result)){
		echo "Errorea sqlin.";
	}else{
		echo "<p color='green'>Galdera ondo gorde da</p>";
	}
}
?>