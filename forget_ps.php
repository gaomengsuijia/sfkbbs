<?php
include_once 'inc/config.inc.php';
include_once 'inc/mysql.inc.php';
include_once 'inc/tool.inc.php';
$link=connect();
$template['title']='找回密码';
$template['css']=array('style/public.css','style/register.css');
if(isset($_POST['submit'])){
	if(empty($_POST['name'])){
		skip('forget_ps.php','error','用户名不能为空');
	}
	if(empty($_POST['answer'])){
		skip('forget_ps.php','error','答案不能为空');
	}
	if($_POST['answer']!=2){
		skip('forget_ps.php','error','答案错误');
	}
	if(strtolower($_POST['vcode'])!=strtolower($_SESSION['vcode'])){
		skip('forget_ps.php', 'error','验证码输入错误！');
	}
	$query="select * from sfk_member where name='{$_POST['name']}'";
	execute($link, $query);
	if(mysqli_affected_rows($link)==0){
		skip('forget_ps.php','error','用户名不存在');
	}else{
		skip('index.php','ok','验证成功，请重新设置密码');
	}
}
?>
<?php include 'inc/header.inc.php'?>
<div id="register" class="auto">
		<h2>找回密码</h2>
		<form method="post">
			<label>请输入用户名：<input type="text" name="name"/><span></span></label>
			<label>1+1等于几？<input type="text" name="answer"/> <span></span></label>
			<label>验证码：<input name="vcode" type="text"/><span>*请输入下方验证码</span></label>
			<img class="vcode" src="show_code.php" />
			<div style="clear:both;"></div>
			<input class="btn" type="submit" name="submit" value="确定" />
		</form>
</div>
<?php include 'inc/footer.inc.php'?>