<?php
require_once 'config_mysql.php';

$myarray = (isset($_POST['myarray'])) ? $_POST['myarray'] : ['0'];
$myarray = json_decode($myarray, true);

$jsonData = new stdClass();
$jsonData->userName = $myarray['Username'];
$jsonData->passWord = $myarray['password'];

$param_username = $myarray['Username'];

$sql = "SELECT Username, password FROM players WHERE Username LIKE '$param_username'";
$result = $link->query($sql) or die($link->error);
$num_rows = mysqli_num_rows($result);

if($num_rows == 0){
	$jsonRejectResponse = new stdClass();
	$jsonRejectResponse->status = "reject";
	$jsonRejectResponse->reason = "Username or password do not match.";
	$myJSON = json_encode($jsonRejectResponse);
	echo ($myJSON);
}else{
	$row = $result->fetch_assoc();
	$param_password = $myarray['password'];
	if(password_verify($param_password, $row['password'])){
		session_start();
		$_SESSION['username'] = $param_username;
		$jsonAcceptResponse = new stdClass();
		$jsonAcceptResponse->status = "accept";
		$jsonAcceptResponse->reason = "Successful login.";
		$jsonAcceptResponse->user = $param_username;
		$myJSON = json_encode($jsonAcceptResponse);
		echo ($myJSON);
	}else{
		$jsonRejectResponse = new stdClass();
		$jsonRejectResponse->status = "reject";
		$jsonRejectResponse->reason = "Username or password do not match.";
		$myJSON = json_encode($jsonRejectResponse);
		echo ($myJSON);
	}
	mysqli_close($link);
}
?>