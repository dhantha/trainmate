<?php
$parser = xml_parser_create();

function start($parser,$element_name,$element_attrs){
	switch($element_name){
		case "APPLICABLE-CARS":
		echo "<br><b>Applicable Cars:</b> <br>";
		break;
		
		case "EQUIPMENT-CONDITIONS":
		echo "<b>Equipment Condition:</b> <br>";
		break;
		
		case "PARA":
		echo "<li>";
		break;
		
		case "VERBATIM":
		echo "<font class=\"verbatim\">";
		break;
		
		case "HAZARD-DESC":
		echo "<font class=\"Hazard\">";
		break;
		
		case "REF-DOCS":
		echo "<b>Reference Documents:</b> <br>";
		break;
		
		case "SPECIAL-TOOLS":
		echo "<b>Special Tools:</b> <br>";
		break;
		
		case "TITLE":
		echo "<b>";
		break;
		
		case "SUPPLIES":
		echo "<b>Supplies:</b> <br><ul>";
		break;
		
		case "CONSUMABLES":
		echo "<b>Consumables:</b> <br><ul>";
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
		
		case "IB":
		$e_list = $element_attrs['E-LIST-NUMBER'];
		$task_code = $element_attrs['TASK-CODE'];
		$topic = $element_attrs['MAINT-ITEM-DESC'];
		echo '<b>'.$e_list.' ' .$task_code.'</b><br>';
		echo '<b>'.$topic.'</b><br>';
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
	
		case "IB":
		echo "<br>";
		break;
		
		case "APPLICABLE-CARS":
		echo "<br><br>";
		break;
		
		case "PARA":
		echo "</li>";
		break;
		
		case "VERBATIM":
		echo "</font>";
		break;
		
		case "HAZARD-DESC":
		echo "</font>";
		break;
		
		case "REF-DOCS":
		echo "<br>";
		break;
		
		case "TITLE":
		echo "</b><br>";
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
$fp = fopen("communication_control_unit_B2.xml","r");

while($data = fread($fp,4096)){
	xml_parse($parser,$data,feof($fp)) or die (sprintf("XML Error: %s at line %d",xml_error_string(xml_get_error_code($parser)),xml_get_current_line_number($parser)));
}
xml_parser_free($parser);
?>
