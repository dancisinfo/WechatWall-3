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
	echo "菜单页面";
} else {
	echo "<meta charset='utf-8'>";
	echo "您没有权限访问此页面,请同管理员联系!";
}

?>