<?php
/**
 * FileName: admin.php
 * Discription: 管理员登陆界面
 * ModifyHistory:
 * 1. 2015-02-06    22:39    Dreamshield
 * 创建源文件
 */
require_once('/var/www/project/WechatWall/bsm/inc/main.inc.php'); // 包含文件
session_start();
// 验证用户
if (isset($_POST['username']) && isset($_POST['password'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$db = new mysqlDB($localhost, $userDB, $pwdDB, $database);
	$query = "SELECT * FROM admin WHERE username = '$username' AND password = sha1('$password')";
	$result = $db->find($query);
	$db->close();
	if (NULL != $result) { // 验证成功跳转至消息管理页面
		$_SESSION['userid'] = $username;
		header('Location:index.php');
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>微信墙消息管理系统</title>
		<link href="css/admin_style.css" rel='stylesheet' type='text/css'/>
	</head>
	<body>
		<!--start-login-form-->
		<div class="login">
			<h1>微信墙消息管理系统</h1>
			<form method="post" name="login" action="admin.php">
				<input type="text" name="username" placeholder="请输入账号" required/>
				<input type="Password" name="password" placeholder="请输入密码" required/>
				<?php
					if(isset($username)) {
						echo "<p>用户名或密码错误!请重试!<p>";
					}
				?>
		 		<div class="submit">
					<input type="submit" value="登陆" >
				</div>
			</form>
		</div>
		<!--//End-login-form-->

	<!--start-copyright-->
	<div class="copyright">
		<p>Copyright &copy;2015-2016&nbsp;<a href="http://dreamshield.net" target="_blank">Dreamshield</a> </p>
	</div>
	<!--//end-copyright-->
	</body>
</html>


