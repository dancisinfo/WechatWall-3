<?php
/**
 * FileName: index.php
 * Discription: 消息管理系统页面
 * ModifyHistory:
 * 1. 2015-02-06    23:59    Dreamshield
 * 创建源文件
 */
session_start();
if (isset($_SESSION['userid'])) {
?>
<!DOCTYPE HTML>
<html>
	<header>
		<title>微信墙消息管理系统</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/index_style.css">
	</header>
	<frameset rows="15%, *">
		<frame name="top" src="top.php" noresize="1" border=5></frame>
		<frameset cols="20%, *">
			<frame name="menu" src="menu.php" noresize="1"></frame>
			<frame name="content" src="content.php" noresize="1"></frame>
		</frameset>
	</frameset>
</html>
<?php
} else {
	echo "<meta charset=utf-8>";
	echo "您没有权限访问此页面,请同管理员联系!";
}
?>
