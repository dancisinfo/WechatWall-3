<?php
/**
 * FileName: content.php
 * Discription: 显示用户消息详细信息
 * ModifyHistory:
 * 1. 2015-02-06    23:59    Dreamshield
 * 创建源文件
 */
require_once('/var/www/project/WechatWall/bsm/inc/main.inc.php'); // 包含文件
session_start();
if (isset($_SESSION['userid'])) {
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<link rel="stylesheet" type="text/css" href="css/content_style.css">
</head>
<body>
<?php
	$userid = $_SESSION['userid'];
	if (isset($_GET['menu']) && ('audited' == $_GET['menu'])) {
		$db = new mysqlDB($localhost, $userDB, $pwdDB, $database);
		$query = "SELECT msgid, nickname, fakeid, time, content FROM userMsg WHERE audit = '1'";
		$auditedMsg = $db->find($query);
		$db->close();
		if (NULL != $auditedMsg) {
			$table = "<table><tr>";
			$table .= "<th>消息ID</th><th>昵称</th><th>FakeID</th><th>时间</th><th>内容</th></tr>";
			foreach ($auditedMsg as $msg) {
				$table .= "<tr>";
				foreach ($msg as $value) {
					$table .="<td>$value</td>";
				}
				$table .= "</tr>";
			}
			$table .= "</table>";
			echo $table;
		} else {
			echo "<meta charset='utf-8'>";
			echo "没有消息!";
		}
	} else {
		// 将爬取的最新用户消息写入数据库
		$wechat = new wechat($userWechat, $pwdWechat);
		$wechat->msgGetAndStore($localhost, $userDB, $pwdDB, $database);
		// 从wechat数据库中读取还没有处理的消息,准备上墙
		$db = new mysqlDB($localhost, $userDB, $pwdDB, $database);
		$query = "SELECT msgid, nickname, fakeid, time, content FROM userMsg WHERE audit = '0'";
		$newMsg = $db->find($query);
		$db->close();
		if (NULL != $newMsg) {
			$table = "<table><tr>";
			$table .= "<th>消息ID</th><th>昵称</th><th>FakeID</th><th>时间</th><th>内容</th><th>上墙</th></tr>";
			foreach ($newMsg as $msg) {
				$table .= "<tr>";
				foreach ($msg as $value) {
					$table .="<td>$value</td>";
				}
				// 这里对应表格里 上墙,操作
				$table .= "<td><form method='post' action='msgAudit.php?msgid=".$msg['msgid']."'>";
				$table .= "<div id='select'>";
				$table .= "<input type='radio' name='op' value='Y' checked>&nbsp;Y<br>";
				$table .= "<input type='radio' name='op' value='N'>N";
				$table .= "</div><div id='submit'>";
				$table .= "<input type='Submit' name='sub' value='执行'>";
				$table .="</div></form></td>";
				$table .= "</tr>";
			}
			$table .= "</table>";
			echo $table;
		} else {
			echo "<meta charset='utf-8'>";
			echo "没有新消息!";
		}
	}
?>
</body>
</html>
<?php
} else {
	echo "<meta charset='utf-8'>";
	echo "您没有权限访问此页面,请同管理员联系!";
}
?>