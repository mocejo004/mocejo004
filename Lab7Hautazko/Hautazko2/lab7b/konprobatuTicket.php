<?php
require_once('/lib/nusoap.php');
require_once('/lib/class.wsdlcache.php');
$ns="http://localhost/wsp/lab7b/konprobatuTicket.php?wsdl";
$server = new soap_server;
$server->configureWSDL('konprobatePass',$ns);
$server->wsdl->schemaTargetNamespace=$ns;
$server->register('ticket',array('x'=>'xsd:string'),array('z'=>'xsd:string'),$ns);

function ticket($x){
	$file = fopen("ticketak.txt", "r") or exit("Unable to open file!");
	while(!feof($file))
	{
		$line = fgets($file);
		$emaitza=trim($line);
		if($emaitza==$x){
			return 'BAIMENDUN ERABILTZAILEA';
			break;
		}
	}
	return 'BAIMENIK GABEKO ERABILTZAILEA';
	fclose($file);
}

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>