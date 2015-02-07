<?php
/**
 * FileName: menu.php
 * Discription: 消息管理页面菜单
 * ModifyHistory:
 * 1. 2015-02-06    23:59    Dreamshield
 * 创建源文件
 */
session_start();
if (isset($_SESSION['userid'])) {
	$userid = $_SESSION['userid'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<link rel="stylesheet" type="text/css" href="css/menu_style.css">
</head>
<body>
	<h1>菜单栏</h1>
		<table>
			<tr><td><a href="content.php?menu=new" target="content">新消息</a></td></tr>
			<tr><td><a href="content.php?menu=audited" target="content">审核通过</a></td></tr>
	</form>
</body>
</html>
<?php
} else {
	echo "<meta charset='utf-8'>";
	echo "您没有权限访问此页面,请同管理员联系!";
}

?>