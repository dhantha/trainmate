<?php

//$xml = simplexml_load_file('passenger_emergency_intercom_H.xml');

//print_r($xml);
$ib = new SimpleXMLElement('passenger_emergency_intercom_H.xml',NULL,TRUE);


//foreach($ib->integration->paragraph->topic->para as $node){
//	echo $node;
///}

print_r($ib);
print_r($ib['@attributes']);
?>
