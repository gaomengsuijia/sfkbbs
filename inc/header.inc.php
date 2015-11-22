<?php 
$query="select * from sfk_info where id=1";
$result_info=execute($link, $query);
$data_info=mysqli_fetch_assoc($result_info);
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8" />
<title><?php echo $template['title'] ?> - <?php echo $data_info['title']?></title>
<meta name="keywords" content="<?php echo $data_info['keywords']?>" />
<meta name="description" content="<?php echo $data_info['description']?>" />
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="js/index.js"></script>
<?php 
foreach ($template['css'] as $val){
	echo "<link rel='stylesheet' type='text/css' href='{$val}' />";
}
?>
</head>
<body>
	<div class="header_wrap">
		<div id="header" class="auto">
			<div class="logo">sifangku</div>
			<div class="nav">
				<a class="hover" href="index.php">首页</a>
			</div>
			<div class="serarch">
				<form action="search.php" method="get">
					<input class="keyword" type="text" name="keyword" value="<?php if(isset($_GET['keyword']))echo $_GET['keyword']?>" placeholder="搜索其实很简单" />
					<input class="submit" type="submit" value="" />
				</form>
			</div>
			<div class="login">
				<?php 
				if(isset($member_id) && $member_id){
$str=<<<A
					<a href="member.php?id={$member_id}" target="_blank">您好！{$_COOKIE['sfk']['name']}</a> <span style="color:#fff;">|</span> <a href="logout.php">退出</a>
A;
					echo $str;		
				}else{
$str=<<<A
					<a href="#" id="login">登录</a>&nbsp;
					<a href="register.php">注册</a>
A;
					echo $str;
				}
				?>
				
			</div>
		</div>
	</div>
	<div style="margin-top:55px;"></div>
<div id="screen"></div>
<div id="register">
	<h2>请登录<span class="close">X</span></h2>
	<form method="post" action="login.php">
		<label>用户名：<input type="text" name="name"  /><span></span></label>
		<label>密码：<input type="password" name="pw"  /> <span><a href="forget_ps.php" style="color:#333" target="_blank">忘记密码？</a></span></label>
		<label>验证码：<input name="vcode" type="text"  /><span>*请输入下方验证码</span></label>
		<img class="vcode" src="show_code.php" />
		<label>自动登录：
			<select style="width:236px;height:25px;" name="time">
				<option value="3600">1小时内</option>
				<option value="86400">1天内</option>
				<option value="259200">3天内</option>
				<option value="2592000">30天内</option>
			</select>
			<span>*公共电脑上请勿长期自动登录</span>
		</label>
		<div style="clear:both;"></div>
		<input class="btn" type="submit" name="submit" value="登录" />
	</form>
</div>
