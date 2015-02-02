<?php
/**
 * FileName: main.inc.php
 * Discription: 管理所有需要包含的文件
 * ModifyHistory:
 * 1. 2015-02-02    19:30    Dreamshield
 * 创建源文件
 */

require_once('/var/www/project/DBData/WechatWall/wechatAccount.inc.php'); // 此项目相关的账户信息
require_once('/var/www/project/WechatWall/bsm/lib/wechat.class.php'); // 模拟登陆与用户信息爬取
require_once('/var/www/project/WechatWall/bsm/lib/httpRequest.class.php'); // http报文发送


?>