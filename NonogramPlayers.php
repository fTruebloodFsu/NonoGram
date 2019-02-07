<?php

class player implements JsonSerializable{
	private $userName;
	private $firstName;
	private $lastName;
	private $passWord;
	private $age;
	private $gender;
	private $location;
	
	public function __construct(){
		$this->userName="unknown";
		$this->passWord="unknown";
		$this->firstName="unknown";
		$this->lastName="unknown";
		$this->age="unknown";
		$this->gender="unknown";
		$this->location="unknown";
	}
	
	public function GetUserName() {
		return $this->userName; 
	}
	
	public function GetFirstName(){
		return $this->firstName;
	}
	
	public function GetLastName(){
		return $this->lastName;
	}
	
	public function GetPassWord(){
		return $this->passWord;
	}
	
	public function GetAge(){
		return $this->age;
	}
	
	public function GetGender(){
		return $this->gender;
	}
	
	public function GetLocation(){
		return $this->location;
	}
	
	public function SetUserName($un) {
		$this->userName=$un;
	}
	
	public function SetFirstName($fn){
		$this->firstName=$fn;
	}
	
	public function SetLastName($ln){
		$this->lastName=$ln;
	}
	
	public function SetPassWord($pw){
		$this->passWord=$pw;
	}
	
	public function SetAge($a){
		$this->age=$a;
	}
	
	public function SetGender($g){
		$this->gender=$g;
	}
	
	public function SetLocation($loc){
		$this->location=$loc;
	}
	
	public function jsonSerialize() {
        return [
			'userName' => $this->GetUserName(),
			'passWord' => $this->GetPassWord(),
            'firstName' => $this->GetFirstName(),
			'lastName' => $this->GetLastName(),
            'age' => $this->GetAge(),
			'gender' => $this->GetGender(),
			'location' => $this->GetLocation(),
            ];
    }
	
	public function Set($json)
	{	
		$this->SetUserName($json->userName);
		$this->SetPassWord($json->passWord);
		$this->SetFirstName($json->firstName);
		$this->SetLastName($json->lastName);
		$this->SetAge($json->age);
		$this->SetGender($json->gender);
		$this->SetLocation($json->location);
	}
	
	public function Display() {
		$v=json_encode($this);
		echo $v;
	}
	
	public function GetString() {
		return json_encode($this);
	}
}

/*$jsonData->userName = "ftrueblood";
$jsonData->passWord = "123";
$jsonData->firstName = "fletch";
$jsonData->lastName = "true";
$jsonData->age = "2";
$jsonData->gender = "male";
$jsonData->location = "here";

$newPlayer = new player();
$newPlayer->Set($jsonData);
echo $newPlayer->Display();
*/
?>