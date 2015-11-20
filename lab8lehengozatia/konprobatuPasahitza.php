<?php
require_once('/lib/nusoap.php');
require_once('/lib/class.wsdlcache.php');
$ns="http://localhost/lab8/konprobatuPasahitza.php?wsdl";
$server = new soap_server;
$server->configureWSDL('konprobatePass',$ns);
$server->wsdl->schemaTargetNamespace=$ns;
$server->register('konprobatu',array('x'=>'xsd:string'),array('z'=>'xsd:string'),$ns);
function konprobatu($x){
	$file = fopen("toppasswords.txt", "r") or exit("Unable to open file!");
	while(!feof($file))
	{
		$line = fgets($file);
		$emaitza=trim($line);
		if($emaitza===$x || $x===''){
			return 'BALIOGABEA';
			break;
		}
	}
	return 'BALIOZKOA';
	fclose($file);
}
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);
?>
