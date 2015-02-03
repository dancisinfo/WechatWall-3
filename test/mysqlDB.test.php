<?php
/**
 * FileName: mysqlDB.test.php
 * Discription: Mysql数据库操作类测试文件
 * ModifyHistory:
 * 1. 2015-02-04    00:54    Dreamshield
 * 创建源文件
 */
require_once('/var/www/project/WechatWall/bsm/inc/main.inc.php'); // 包含文件

$db = new mysqlDB($localhost, $username_db, $password_db, $database);
$query = "select * from books";
$result = $db->findAll($query);
$bookinfo = array(
	"isbn"=>1111111111,
	"author"=>"zhpf",
	"titile"=>"fight",
	"price"=>100
);
$db->insert('books', $bookinfo);







?>