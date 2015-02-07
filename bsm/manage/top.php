<?php
/**
 * FileName: top.php
 * Discription: 显示消息管理页标题与管理员登陆信息
 * ModifyHistory:
 * 1. 2015-02-06    23:59    Dreamshield
 * 创建源文件
 */
session_start();
if (isset($_SESSION['userid'])) {
	$userid = $_SESSION['userid'];
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>微信墙消息管理系统</title>
	<meta charset='utf-8'>
	<link rel="stylesheet" type="text/css" href="css/top_style.css">
</head>
<body>
	<!-- 显示网页标题 -->
	<div>
		<h1>微信墙消息管理系统</h1>
	</div>
	<!-- 显示登陆用户 -->
	<div class="userdisp">
		<table>
			<tr><td><?php echo "欢迎 ".$userid ?></td></tr>
			<tr><td><a href="logout.php" target= "_parent">退出</a></td></tr>
		</table>
	</div>
</body>
</html>
<?php
} else {
	echo "<meta charset='utf-8'>";
	echo "您没有权限访问此页面,请同管理员联系!";
}









?>