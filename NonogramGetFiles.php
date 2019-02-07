<?php

$gridSize = (isset($_POST['gridSize'])) ? $_POST['gridSize'] : ['0'];
$gridSize = 13;

$servername = "localhost"; // default server name
$username = "csci130"; // user name that you created
$password = "123456"; // password that you created
$dbname = "myDB11686";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM Levels WHERE Size = $gridSize";
$result = $conn->query($sql) or die($conn->error);

$newArr = array();

while($row = $result->fetch_assoc()){
	$newArr[] = $row;
}

$conn->close();

echo json_encode($newArr);
?>