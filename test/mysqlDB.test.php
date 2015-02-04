<?php
/**
 * FileName: mysqlDB.test.php
 * Discription: Mysql数据库操作类测试文件
 * ModifyHistory:
 * 1. 2015-02-04    00:54    Dreamshield
 * 创建源文件
 */
require_once('/var/www/project/WechatWall/bsm/inc/main.inc.php'); // 包含文件

echo "<meta charset='utf-8'>";
$db = new mysqlDB($localhost, $username_db, $password_db, $database);
// 数据库查询测试
$query = "select * from books";
$result = $db->findAll($query);
echo "<pre>";
print_r($result);
echo "</pre>";
// 数据库插入测试
$bookinfo = array(
	"isbn"=>"0-104-11111-0",
	"author"=>"zhpf",
	"title"=>"hahahaahha",
	"price"=>100.2
);
$db->insert('books', $bookinfo);
$query = "select * from books";
$result = $db->findAll($query);
echo "<pre>";
print_r($result);
echo "</pre>";






?>