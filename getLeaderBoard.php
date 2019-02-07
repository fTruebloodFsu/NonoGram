<?php
require_once 'config_mysql.php';

$resultsJSON1 = array();
$resultsJSON2 = array();
$resultsJSON3 = array();
$resultsJSON4 = array();
$resultsJSON5 = array();
$resultsJSON6 = array();
$resultsJSON7 = array();
$resultsJSON8 = array();
$resultsJSON9 = array();
$resultsJSON10 = array();
$resultsJSONFinal = array();

$sql1 = "SELECT * FROM games ORDER BY Score DESC LIMIT 3";
$result1 = $link->query($sql1) or die($link->error);

while($row = $result1->fetch_assoc()){
	$resultsJSON1[] = $row;
}

$sql2 = "SELECT * FROM games ORDER BY Time DESC LIMIT 3";
$result2 = $link->query($sql2) or die($link->error);

while($row = $result2->fetch_assoc()){
	$resultsJSON2[] = $row;
}

$sql3 = "SELECT * FROM games ORDER BY Score ASC LIMIT 3";
$result3 = $link->query($sql3) or die($link->error);

while($row = $result3->fetch_assoc()){
	$resultsJSON3[] = $row;
}

$sql4 = "SELECT * FROM games ORDER BY Time ASC LIMIT 3";
$result4 = $link->query($sql4) or die($link->error);

while($row = $result4->fetch_assoc()){
	$resultsJSON4[] = $row;
}

$sql5 = "SELECT * FROM games ORDER BY Score DESC, Time ASC LIMIT 3";
$result5 = $link->query($sql5) or die($link->error);

while($row = $result5->fetch_assoc()){
	$resultsJSON5[] = $row;
}

$sql6 = "SELECT * FROM games ORDER BY Score ASC, Time DESC LIMIT 3";
$result6 = $link->query($sql6) or die($link->error);

while($row = $result6->fetch_assoc()){
	$resultsJSON6[] = $row;
}

$sql7 = "SELECT * FROM games WHERE Level LIKE '%Level_13_%' ORDER BY Score ASC, Time DESC LIMIT 3";  //worst 13x13 players
$result7 = $link->query($sql7) or die($link->error);

while($row = $result7->fetch_assoc()){
	$resultsJSON7[] = $row;
}

$sql8 = "SELECT * FROM games WHERE Level LIKE '%Level_13_%' ORDER BY Score DESC, Time ASC LIMIT 3";  //best 13x13 players
$result8 = $link->query($sql8) or die($link->error);

while($row = $result8->fetch_assoc()){
	$resultsJSON8[] = $row;
}

$sql9 = "SELECT * FROM games WHERE Level LIKE '%Level_7_%' ORDER BY Score DESC, Time ASC LIMIT 3";  //best 7 players
$result9 = $link->query($sql9) or die($link->error);

while($row = $result9->fetch_assoc()){
	$resultsJSON9[] = $row;
}

$sql10 = "SELECT * FROM games WHERE Level LIKE '%Level_7_%' ORDER BY Score DESC, Time ASC LIMIT 3";  //best 7 players
$result10 = $link->query($sql10) or die($link->error);

while($row = $result10->fetch_assoc()){
	$resultsJSON10[] = $row;
}

$resultsJSONFinal[0] = $resultsJSON1;
$resultsJSONFinal[1] = $resultsJSON2;
$resultsJSONFinal[2] = $resultsJSON3;
$resultsJSONFinal[3] = $resultsJSON4;
$resultsJSONFinal[4] = $resultsJSON5;
$resultsJSONFinal[5] = $resultsJSON6;
$resultsJSONFinal[6] = $resultsJSON7;
$resultsJSONFinal[7] = $resultsJSON8;
$resultsJSONFinal[8] = $resultsJSON9;
$resultsJSONFinal[9] = $resultsJSON10;

mysqli_close($link);

echo json_encode($resultsJSONFinal);
?>