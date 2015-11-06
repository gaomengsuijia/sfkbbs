<?php
include_once 'tool.inc.php';
if(isset($_COOKIE['sfk']['name']) && isset($_COOKIE['sfk']['pw'])){
	//setcookie('sfk[name]',$_POST['name'],time()-2);
	//setcookie('sfk[pw]',sha1(md5($_POST['pw'])),time()-2);
	//setcookie('sfk[name]','');
	//setcookie("sfk[name]");
	//setcookie("sfk[pw]");
	setcookie("sfk[name]", "", time() - 3600);
	setcookie("sfk[pw]", "", time() - 3600);
	//setcookie('sfk[pw]','');
	//$_COOKIE=array();
	//print_r($_COOKIE);
	
	skip('../login.php','true','注销成功！');
}
?>