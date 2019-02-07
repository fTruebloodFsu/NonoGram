<?php
require_once 'config_mysql.php';
include 'NonogramPlayers.php';

$myarray = (isset($_POST['myarray'])) ? $_POST['myarray'] : ['0'];

$myarray = json_decode($myarray, true);

$jsonData = new stdClass();
$jsonData->userName = $myarray['userName'];
$jsonData->passWord = $myarray['password'];
$jsonData->firstName = $myarray['firstName'];
$jsonData->lastName = $myarray['lastName'];
$jsonData->age = $myarray['age'];
$jsonData->gender = $myarray['gender'];
$jsonData->location = $myarray['location'];

$newPlayer = new player();
$newPlayer->Set($jsonData);
$param_username = $newPlayer->getUserName();

$sql = "SELECT * FROM players WHERE Username LIKE '$param_username'";
$result = $link->query($sql) or die($link->error);
$num_rows = mysqli_num_rows($result);

if($num_rows == 0){
	$sql = "INSERT INTO players (Username, password, first_name, last_name, age, gender, location) VALUES (?,?,?,?,?,?,?)";
	if($stmt = mysqli_prepare($link, $sql)){
		mysqli_stmt_bind_param($stmt, "ssssiss", $param_username, $param_password, $param_first_name, $param_last_name, $param_age, $param_gender, $param_location);
		// Set parameters
		$param_username = $newPlayer->getUserName();
		$param_password = password_hash($newPlayer->getPassWord(), PASSWORD_DEFAULT); // Creates a password hash
		$param_first_name = $newPlayer->getFirstName();
		$param_last_name = $newPlayer->getLastName();
		$param_age = $newPlayer->getAge();
		$param_gender = $newPlayer->getGender();
		$param_location = $newPlayer->getLocation();
		
		if(mysqli_stmt_execute($stmt)){
			$jsonAcceptResponse = new stdClass();
			$jsonAcceptResponse->status = "accept";
			$jsonAcceptResponse->reason = "successfully created account";
			mysqli_stmt_close($stmt);
			mysqli_close($link);
			echo json_encode($jsonAcceptResponse);
		} else{
			echo "Something went wrong. Please try again later.";
		}
	}
}
if($num_rows != 0){
	$jsonRejectResponse = new stdClass();
	$jsonRejectResponse->status = "reject";
	$jsonRejectResponse->reason = "Username taken";
	$myJSON = json_encode($jsonRejectResponse);
	echo ($myJSON);
}

?>