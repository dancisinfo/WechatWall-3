<?php
/**
 * FileName: msgDis.php
 * Discription: 微信墙前端用于显示用户消息(最新通过审核的5条消息)
 * ModifyHistory:
 * 1. 2015-02-08    16:53    Dreamshield
 * 创建源文件
 */
require_once('/var/www/project/WechatWall/bsm/inc/main.inc.php'); // 包含文件
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript">
		function flesh() {
			window.location.assign(location.href);
		}
	</script>
</head>
<body>

<?php
// 从数据库中读取通过审核的消息
$db = new mysqlDB($localhost, $userDB, $pwdDB, $database);
$query = "SELECT nickname, content, fakeid FROM userMsg WHERE audit = '1'";
$auditedMsg = $db->find($query);
$msgNum = count($auditedMsg);  // 共$msgNum条通过审核消息
$db->close();

// 最新通过审核的5跳消息
for ($i=1; $i <= 5; $i++) {
	$msg[] = $auditedMsg[$msgNum - $i];
}

// 分条显示用户消息
foreach ($msg as $value) {
	$output = "<table>";
	$output .= "<tr><td class = 'photo' rowspan= '2'><img src = '../images/photos/{$value['fakeid']}.jpeg'></td>";
	$output .= "<td class = 'nickname'>{$value['nickname']}:</td></tr>";
	$output .= "<tr><td class = 'content'>{$value['content']}</td></tr>";
	$output .= "</table>";
	echo $output;
}
// 内容在页面显示2s后刷新
sleep(5);
?>

<!--  刷新页面 -->
<script type="text/javascript">
	flesh();
</script>

</body>
</html>