

<?php 
//5.4.0 test_1
echo PHP_VERSION;

if(version_compare(PHP_VERSION,'5.4.0')<0){
	exit('您的PHP版本为'.PHP_VERSION.'！我们的程序要求是PHP版本不低于5.4.0!');
}
echo 'wo shi master xiugai de';
echo "wo shi bei dev xiugai d"
?>
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
