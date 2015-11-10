<?php
include_once '../inc/config.inc.php';
include_once '../inc/mysql.inc.php';
include_once '../inc/tool.inc.php';
include_once '../inc/page.inc.php';
$link=connect();
include_once 'inc/is_manage_login.inc.php';//验证管理员是否登录
$template['title']='前台用户列表页';
$template['css']=array('style/public.css','../style/public.css');
?>
<?php include 'inc/header.inc.php'?>
<div id="main">
	<div class="title">用户列表</div>
	<form method="post">
	<table class="list">
		<tr>
			<th>用户id</th>	 	 	
			<th>用户名</th>
			<th>注册时间</th>
			<th>编辑</th>
		</tr>
		<?php 
		//$query="select ssm.id,ssm.sort,ssm.module_name,sfm.module_name father_module_name,ssm.member_id from sfk_son_module ssm,sfk_father_module sfm where ssm.father_module_id=sfm.id order by sfm.id";
		
		$query_count="select count(*) from sfk_member";
		$count=num($link, $query_count);
		$page=page($count, 5,$num_btn=10,$page='page');
	
		$query="select * from sfk_member ORDER BY register_time desc {$page['limit']}";
		//var_dump($page['limit']);exit();
		$result=execute($link,$query);
		while ($data=mysqli_fetch_assoc($result)){
			$url=urlencode("user_delete.php?id={$data['id']}");
			$return_url=urlencode($_SERVER['REQUEST_URI']);
			$message="你真的要删除用户 {$data['name']} 吗？";
			$delete_url="confirm.php?url={$url}&return_url={$return_url}&message={$message}";
$html=<<<A
			<tr>
				<td>{$data['id']}</td>
				<td>{$data['name']}</td>
				<td>{$data['register_time']}</td>
				<td><a href="{$delete_url}">删除</a></td>
			</tr>
A;
			echo $html;
			//echo "<span style = 'color:red;font-weight:bold'>{$data['name']}</span>";
		}
		?>
		
	</table>
	</form>
	<div class="pages">
		<?php 
			echo $page['html'];
		?>
	</div>
</div>
<?php include 'inc/footer.inc.php'?>


