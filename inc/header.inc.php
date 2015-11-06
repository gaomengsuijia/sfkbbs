<?php 

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8" />
<title><?php echo $template['title'] ?></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
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
				<a class="hover" href = "index.php">首页</a>
			</div>
			<div class="serarch">
				<form>
					<input class="keyword" type="text" name="keyword" placeholder="搜索其实很简单" />
					<input class="submit" type="submit" name="submit" value="" />
				</form>
			</div>
			<div class="login">
				<?php 
				if(is_login($link)){
$str=<<<A
					<a>您好！{$_COOKIE['sfk']['name']}</a>  <a href = "inc/logout.php">注销</a>
A;
					echo $str;		
				}else{
$str=<<<A
					<a href = "login.php" target = "_blank">登录</a>&nbsp;
					<a href = "register.php" target = "_blank">注册</a>
A;
					echo $str;
				}
				?>
				
			</div>
		</div>
	</div>
	<div style="margin-top:55px;"></div>
