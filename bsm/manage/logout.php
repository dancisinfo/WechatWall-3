<?php
/**
 * FileName: logout.php
 * Discription: 退出管理
 * ModifyHistory:
 * 1. 2015-02-07    10:20    Dreamshield
 * 创建源文件
 */
session_start();
if (isset($_SESSION['userid'])) {
	$_SESSION = array(); // 注销会话变量
	session_destroy(); // 注销会话
	header('Location:index.php');
} else {
	echo "<meta charset='utf-8'>";
	echo "您没有权限访问此页面,请同管理员联系!";
}
