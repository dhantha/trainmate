<html>
<head>
<title>Passenger Emergency Intercom H</title>
<?php
$xml = simplexml_load_file('passenger_emergency_intercom_H.xml');

$arr = $xml->attributes();

$e_number = (string)$arr['e-list-number'];//attributes of ib
$task_code = (string)$arr['task-code'];
$maint_item_desc = (string)$arr['maint-item-desc'];

$child = $xml->task->children();//pre-task
$child1 = $child->children();//children of pre-task
$applicable_cars = (string)$child1[0]; 

//only one node is working 
$equipment_cond = $child1[1]->children()->children();
//print_r($equipment_cond);
//echo (string)$equipment_cond[0]->para;

$ref_docs = $child1[2]->children();//reference documents 

$equipment_item = $child1[3]->children();//equipment item

$main_equipment = $child1[3]->children();//children of main-equipment
$special_tools = $main_equipment[0]->children();//special tools 
$supplies = $main_equipment[1]->children(); //2nd child of main equipment
$consumables = $main_equipment[2]; //3rd child of main equipment
//print_r($consumables);

//needs to get activity title
$activity = $child[1]; //getting activity 1 steps 
//print_r($activity);
//foreach($activity->step as $step){
//	print_r($step);
//};

$activity2 = $child[2];//activity 2

$activity3 = $child[3];//activity 3rd
$activity4 = $activity3->children();
//print_r($activity4);

$follow_on_task = $child[4];//follow on task

/*
foreach ($child1[1]->children()->children()->children() as $x){
	print_r($x);
};
*/
//print_r($ib['@attributes']);

?>
</head>
<body>
<?php

print "<div id=\'enum\'><h3>".$e_number. " " .$task_code."</h3></div>";
print "<div id=\'desc\'>".$maint_item_desc."</div><br>";
print "<div id='\applicable'\>Applicable Cars <br>".$applicable_cars."</div><br>";
print "<div id='\condition\'>Equipment Condition</div>";
print "<ul>";
foreach($equipment_cond as $x){
	print "<li>".(string)$x->children()."</li>";
}
print "</ul><br>";
print "<div id='\refDocs\'>Reference Documents<br>".$ref_docs."</div><br>";
print "<div id='\special\'>Special Tools</div>";
print "<ul>";

foreach($special_tools as $x){
	print "<li>".(string)$x->children()."</li>";
}
print "</ul><br>";
print "<div id='\supplies\'>Supplies</div>";
print "<ul>";
foreach($supplies as $x){
		print "<li>".(string)$x->title."</li>";
}
print "</ul>";

print "<div id='\consumables\'>Consumables</div>";
print "<ul>";
foreach($consumables as $x){
	print "<li>".(string)$x->children()."</li>";
}
print "</ul><br>";
print "<div id=\'image1\'>".$child[1]->title."</div>";
//image file goes here 
print "<img src='/~gunarad/trainmate/communication_systems/images/053J-751-010.png'><br>";
print "<span>".(string)$child[1]->illustration->title."</span><br>";
print "<ul>";
foreach($child[1]->step as $x){
	print "<li>".(string)$x->children()."</li>";
}
print "</ul><br>";
print "<span>".$child[2]->title."<span>";
print "<ul>";
foreach($child[2]->step as $x){
	print "<li>".(string)$x->children()."</span>";
}
print "</ul><br>";

print "<span>".(string)$activity4[0]."</span><br>";
print "<span>".$activity4[1]->children()."</span><br>";
print "<ul>";
foreach($activity4[1]->list->children() as $x){
	print "<li>".(string)$x->children()."</li>";
}
print "</ul><br>";
print "<span>".$activity4[2]->para."</span>";
print "<ul>";
foreach($activity4[2]->step as $x){
	print "<li>".(string)$x->children()."</li>";
}
print "</ul><br>";
print "<span>".$activity4[3]->para."</span><br>";
print "<img src='/~gunarad/trainmate/communication_systems/images/053J-000-001.gif'><br>";
print "<span>".$activity4[3]->illustration->title."</span><br>";
print "<span>".$activity4[3]->step->para."</span><br>";
print "<img src='/~gunarad/trainmate/communication_systems/images/053J-000-002.gif'><br>";
print "<span>".$activity4[3]->step->para."</span><br>";
print "<span>END OF REPLACE</span>";
/*
//print_r($activity4[1]->list->children());
//foreach($activity4[1]->children() as $x){
//	print "<span>".(string)$x."</span>";
//	print_r($x);
//}
//print "<span>".$child[3]->step->list->children()."</span>";
/*
print "<ul>";
foreach($child[3]->step as $x){
	print "<li>".(string)$x->children()."</span>";
	print "<ul>";
	foreach($x as $z){
		print "<li>".$z->children()->children()."</li>";
	}
	print "</ul>";
}
print "</ul>";
*/
?>
</body>
</html>