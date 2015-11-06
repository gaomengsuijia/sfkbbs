<?php
class goushi{
	var $name;
	var $age;
	function __construct($name,$age){
		$this->name=$name;
		$this->age=$age;
	}
}
class Person{
	private $redis;
	function __construct($name,$age){
		$this->redis=new goushi();
		return $this->redis;
	}
	
}
//$b = new goushi('li','lu');
$a = new Person('li','lu');

var_dump($a);


?>