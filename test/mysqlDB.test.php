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
$db = new mysqlDB($localhost, $usernameDB, $pwdDB, $database);

// 数据查询测试
$query = "select author from books where isbn = '0-672-31967-3'";
$result = $db->find($query);
echo "<pre>";
print_r($result);
echo "</pre>";

// 数据插入测试
/*$bookinfo = array(
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
echo "</pre>";*/

// 数据更新测试
// $bookUpdate = array(
// 	"author"=>"Dreamshield",
// 	"title"=>"BALABALA",
// 	"price"=>50
// );
// $where = "isbn='0-104-11111-0'";
// $db->update('books', $bookUpdate, $where);
// $query = "select * from books";
// $result = $db->findAll($query);
// echo "<pre>";
// print_r($result);
// echo "</pre>";

// 数据删除测试
/*$where = "isbn='0-104-11111-0'";
$db->delete('books', $where);
$query = "select * from books";
$result = $db->findAll($query);
echo "<pre>";
print_r($result);
echo "</pre>";*/


?>