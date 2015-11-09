<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
$link=connect();
include_once 'inc/is_manage_login.inc.php';//验证管理员是否登录
if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
	skip('user_list.php', 'error', '用户id参数不正确');
}
$qurey = "select * from sfk_member where id={$_GET['id']}";
$result = execute($link, $qurey);
if(mysqli_affected_rows($link)==1){
	$qurey="delete from sfk_member where id={$_GET['id']}";
	execute($link, $qurey);
	if(mysqli_affected_rows($link)){
		skip('user_list.php', 'ok', '用户删除成功');
	}else {
		skip('user_list.php', 'error', '删除失败，请重试');
	}
	
}else{
	skip('user_list.php', 'error', '用户id不存在');
}