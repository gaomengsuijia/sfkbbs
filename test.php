<?php
class Person{
	var $age = 10;
	function say(){
		echo $this->age;
	}
};
$son = new Person();
var_dump($son->age);

?>