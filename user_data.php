<?php 
include_once 'inc/config.inc.php';
include_once 'inc/mysql.inc.php';
include_once 'inc/tool.inc.php';
include_once 'inc/upload.inc.php';
$link=connect();
if(!$member_id=is_login($link)){
	skip('login.php', 'error', '请登录之后再对自己的头像做设置!');
}
$query="select * from sfk_member where id={$member_id}";
$result_memebr=execute($link,$query);
$data_member=mysqli_fetch_assoc($result_memebr);
if(isset($_POST['submit'])){
	//验证用户名
	if(empty($_POST['name'])){
		skip('user_data.php', 'error', '用户名不得为空！');
	}
	if(mb_strlen($_POST['name'])>32){
		skip('user_data.php', 'error', '用户名长度不要超过32个字符！');
	}
	$_POST=escape($link,$_POST);
	$query="select * from sfk_member where name='{$_POST['name']}'";
	$result=execute($link, $query);
	if(mysqli_num_rows($result)){
		skip('user_data.php', 'error', '这个用户名已经被别人注册了！');
	}
	//var_dump($_POST['name']);exit();
	$save_path='uploads'.date('/Y/m/d/');//写上服务器上文件系统的路径，而不是url地址
	$upload=upload($save_path,'1M','photo');
	if($upload['return']){
		$query="update sfk_member set photo='{$upload['save_path']}',name='{$_POST['name']}' where id={$member_id}";
		execute($link, $query);
		if(mysqli_affected_rows($link)==1){
			setcookie('sfk[name]',$_POST['name']);
			skip("member.php?id={$member_id}",'ok','设置成功');
		}else{
			skip('user_data.php','error','设置失败，请重试');
		}
	}else{
		skip('user_data.php', 'error',$upload['error']);
	}
}
//SUB_URL.
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<style type="text/css">
body {
	font-size:12px;
	font-family:微软雅黑;
}
h2 {
	padding:0 0 10px 0;
	border-bottom: 1px solid #e3e3e3;
	color:#444;
}
.submit {
	background-color: #3b7dc3;
	color:#fff;
	padding:5px 22px;
	border-radius:2px;
	border:0px;
	cursor:pointer;
	font-size:14px;
}
#main {
	width:80%;
	margin:0 auto;
}
</style>
</head>
<body>
	<div id="main">
		<h2>个人资料修改</h2>
		<div>
			<h3>头像：</h3>
			<img src="<?php if($data_member['photo']!=''){echo SUB_URL.$data_member['photo'];}else{echo 'style/photo.jpg';}?>" />
			<br />
			最佳图片尺寸：180*180
		</div>
		<div>
			<form method="post">
			
			</form>
		</div>
		<div style="margin:15px 0 0 0;">
			<form method="post" enctype="multipart/form-data">
				<input style="cursor:pointer;" width="100" type="file" name="photo" /><br /><br />
				用户名修改：<input type="text" name="name" value="<?php echo $data_member['name']?>" /><span>  *用户名不得为空，并且长度不得超过32个字符，每月仅能修改一次</span><br /><br />
				<input class="submit" type="submit" name="submit" value="保存" />
			</form>
		</div>
	</div>
</body>
</html>