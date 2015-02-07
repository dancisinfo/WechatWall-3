<?php
/**
 * FileName: msgAudit.php
 * Discription: 用户消息审核结果入库
 * ModifyHistory:
 * 1. 2015-02-07    19:40    Dreamshield
 * 创建源文件
 */
require_once('/var/www/project/WechatWall/bsm/inc/main.inc.php');
session_start();
if (isset($_SESSION['userid'])) {
	$db = new mysqlDB($localhost, $userDB, $pwdDB, $database);
	$msgid = $_GET['msgid'];
	$op = $_POST['op'];
	if ('Y' == $op) { // 审核通过,将userMsg中audit键值update为1
		$audit = array('audit'=>1);
		$where = "msgid = '$msgid'";
		$db->update('userMsg', $audit, $where);
	}
	if ('N' == $op) { // 审核未通过,将消息从数据库中删除
		$where = "msgid = '$msgid'";
		$db->delete('userMsg', $where);
	}
	$db->close();
	header('Location:content.php');
} else {
	echo "<meta charset='utf-8'>";
	echo "您没有权限访问此页面,请同管理员联系!";
}