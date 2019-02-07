<?php
require_once 'config_mysql.php';
session_start();

$myarray = (isset($_POST['myarray'])) ? $_POST['myarray'] : "no data";

if($myarray == "no data"){
	$jsonRejectResponse = new stdClass();
	$jsonRejectResponse->status = "reject";
	$jsonRejectResponse->reason = "no data";
	$myJSON = json_encode($jsonRejectResponse);
	echo ($myJSON);
}

$myarray = json_decode($myarray, true);

$jsonGameData = new stdClass();
$jsonGameData->Username = (isset($_SESSION['username'])) ? $_SESSION['username']: "Guest";
$jsonGameData->Level = $myarray['level'];
$jsonGameData->Score = $myarray['score'];
$jsonGameData->gameTime = $myarray['gameTime'];

$sql = "INSERT INTO games (UserName, Level, Score, Time) VALUES(?, ?, ?, ?)";
if($stmt = mysqli_prepare($link, $sql)){
		mysqli_stmt_bind_param($stmt, "ssis", $param_Username, $param_Level, $param_Score, $param_Time);
		$param_Username = $jsonGameData->Username;
		$param_Level = $jsonGameData->Level;
		$param_Score = $jsonGameData->Score;
		$param_Time = $jsonGameData->gameTime;
		
		if(mysqli_stmt_execute($stmt)){
			$jsonAcceptResponse = new stdClass();
			$jsonAcceptResponse->status = "accept";
			$jsonAcceptResponse->reason = "Data entered into table.";
			echo json_encode($jsonAcceptResponse);
		}else{
			$jsonRejectResponse = new stdClass();
			$jsonRejectResponse->status = "reject";
			$jsonRejectResponse->reason = "Data was not recorded";
			$myJSON = json_encode($jsonRejectResponse);
			echo ($myJSON);
		}
		mysqli_stmt_close($stmt);
		mysqli_close($link);
}


?>