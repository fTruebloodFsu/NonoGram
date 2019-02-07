<?php
require_once 'config_mysql.php';

$param_level = (isset($_POST['param_level'])) ? $_POST['param_level'] : "Level_13_01";

$sql = "SELECT * FROM games WHERE Level LIKE '$param_level' ORDER BY Score DESC LIMIT 3";
$result = $link->query($sql) or die($link->error);

$resultsJSON = array();

while($row = $result->fetch_assoc()){
	$resultsJSON[] = $row;
}

mysqli_close($link);

echo json_encode($resultsJSON);
?>