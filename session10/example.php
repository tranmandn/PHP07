<?php
class Human {
	public $name;
	public $age;
	public $gender;
	public function setName($name){
		$this ->name = $name;
	}
	private function setAge($age){
		$this ->age = $age;
	}
	public function setGender($gender){
		$this ->gender = $gender;
	}
	public function getName(){
		echo $this ->name;
	}
	public function getAge(){
		echo $this ->age;
	}
	public function getGender(){
		echo $this ->gender;
	}

}
class Me extends Human {
	public $id;
	public function setId($id){
		$this ->id = $id;
	}
	public function getId(){
		echo $this ->id;
	}
}
$studen = new Me();
$studen -> setname('Man');
$studen -> setGender('Male');
$studen -> setId('1');
$studen -> getName();
$studen -> getGender();
$studen -> getId();


?>