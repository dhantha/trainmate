<?php
$parser = xml_parser_create();

function start($parser,$element_name,$element_attrs){
	switch($element_name){
		case "APPLICABLE-CARS":
		echo "Applicable Cars: <br>";
		break;
		
		case "EQUIPMENT-CONDITIONS":
		echo "Equipment Condition: <br>";
		break;
		
		case "PARA":
		echo "<li>";
		break;
		
		case "VERBATIM":
		echo "<font class=\"verbatim\">";
		break;
		
		case "REF-DOCS":
		echo "Reference Documents: <br>";
		break;
		
		case "SPECIAL-TOOLS":
		echo "Special Tools: <br>";
		break;
		
		case "TITLE":
		echo "";
		break;
		
		case "SUPPLIES":
		echo "Supplies: <br><ul>";
		break;
		
		case "CONSUMABLES":
		echo "Consumables: <br><ul>";
		break;	
		
		case "ACTIVITY":
		echo "<br>";
		break;
		
		case "LIST":
		echo "<ul>";
		break;
		
		case "GRAPHIC":
		$url = str_replace('..\..\\Graphics\\','/',$element_attrs['FILE']);
		$url1 = str_replace(".cgm",".png",$url);
		//echo $url;
		echo "<img src=\"Graphics".$url1."\"/><br>";
		break;
	}
	/*
	switch($element_attrs){
		case $element_attrs['file']:
		echo "pre: ";
		break;
	}
	*/
	
}
function stop($parser,$element_name){
	switch($element_name){
		
		case "APPLICABLE-CARS":
		echo "<br><br>";
		break;
		
		case "PARA":
		echo "</li>";
		break;
		
		case "VERBATIM":
		echo "</font>";
		break;
		
		case "REF-DOCS":
		echo "<br>";
		break;
		
		case "TITLE":
		echo "</li><br>";
		break;
		
		case "PART-NUMBER":
		echo "<br>";
		break;
		
		case "CONSUMABLES":
		echo "</ul><br>";
		break;
		
		case "ACTIVITY":
		echo "<br>";
		break;	

		case "TITLE":
		echo "";
		break;
		
		case "LIST":
		echo "</ul>";
		break;
		
		case "SPECIAL-TOOLS":
		echo "<br>";
		break;
		
		case "SUPPLIES":
		echo "</ul><br>";
		break;
	}
}

function char($parser,$data){
	echo $data;
}
xml_set_element_handler($parser,"start","stop");
xml_set_character_data_handler($parser,"char");
$fp = fopen("cab_communication_control_panel_H.xml","r");

while($data = fread($fp,4096)){
	xml_parse($parser,$data,feof($fp)) or die (sprintf("XML Error: %s at line %d",xml_error_string(xml_get_error_code($parser)),xml_get_current_line_number($parser)));
}
xml_parser_free($parser);
?>
