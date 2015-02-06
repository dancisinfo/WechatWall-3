<?php
/**
 * FileName: content.php
 * Discription: 显示用户消息详细信息
 * ModifyHistory:
 * 1. 2015-02-06    23:59    Dreamshield
 * 创建源文件
 */
session_start();
if (isset($_SESSION['userid'])) {
	$userid = $_SESSION['userid'];
	echo "消息内容";
} else {
	echo "<meta charset='utf-8'>";
	echo "您没有权限访问此页面,请同管理员联系!";
}

?>