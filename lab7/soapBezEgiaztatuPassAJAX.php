<?php
////nusoap.php klasea gehitzen dugu
require_once('/lib/nusoap.php');
require_once('/lib/class.wsdlcache.php');

$soapclient = new soapclient('http://sw14.hol.es/ServiciosWeb/comprobarmatricula.php?wsdl',true);

$pasahitza=$_GET['pasahitza'];
$result = $soapclient->call($pasahitza);
if ($result=='BALIOGABEA'){
	echo 'Pasahitza ez da fidagarria';
}
else{
	echo 'Pasahitza fidagarria';
}
?>