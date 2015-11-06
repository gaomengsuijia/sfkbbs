<?php
include_once 'inc/config.inc.php';
include_once 'inc/mysql.inc.php';
include_once 'inc/tool.inc.php';

$link=connect();
$template['title']='子版块列表页';
$template['css']=array('style/public.css','style/list_son.css');

$query = "select * from sfk_content where module_id ={$_GET['id']}";
$result=execute($link, $query);

//var_dump($data_content);exit();
?>


<?php include 'inc/header.inc.php'?>
<div class = "list">	
	<div class = "list_name">火箭</div>
		<ul>
			<?php 
				while($data_content=mysqli_fetch_assoc($result)){?>
					<li class="one"><?php echo $data_content['title']?><span class="two"><?php echo $data_content['time']?></span></li>
			<?php } ?>
		</ul>
</div>
<?php include 'inc/footer.inc.php'?>