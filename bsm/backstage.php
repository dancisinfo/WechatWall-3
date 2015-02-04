<?php
/**
 * FileName: backstage.php
 * Discription: 后台管理入口文件
 * ModifyHistory:
 * 1. 2015-02-02    05:22    Dreamshield
 * 创建源文件
 */
require_once('./inc/main.inc.php');

echo "<meta charset='utf-8'>";
$wechat = new wechat($usernameWechat, $pwdWechat);
$userMsg = $wechat->getUserMsg(); // 获取消息管理页面的用户消息
$wechat->storeUserMsg($userMsg, $localhost, $usernameDB, $pwdDB, $database); // 将用户消息插入数据库


?>
