<?php
////nusoap.php klasea gehitzen dugu
require_once('/lib/nusoap.php');
require_once('/lib/class.wsdlcache.php');

$soapclient = new soapclient('http://sw14.hol.es/ServiciosWeb/comprobarmatricula.php?wsdl',true);

$eposta=$_GET['eposta'];
$result = $soapclient->call($eposta);
if ($result=='NO'){
	echo 'Eposta ez dago erregistratuta';
}
else{
	echo 'eposta erregistratuta dago';
}
?>