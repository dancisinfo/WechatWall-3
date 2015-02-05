<?php
/**
 * FileName: mysqlDB.class.php
 * Discription: Mysql数据库操作类
 * ModifyHistory:
 * 1. 2015-02-03    20:43    Dreamshield
 * 创建源文件
 */
class mysqlDB{
	private $db;

	/**
	 * [__construct: 建立数据库连接]
	 * @param [string] $localhost   主机名
	 * @param [string] $username 用户名
	 * @param [string] $password  密码
	 * @param [string] $database   连接的数据库名
	 */
	public function __construct($localhost, $username, $password, $database) {
		$this->db = new mysqli($localhost, $username, $password, $database);
		if ($this->db->connect_errno) {
			die('数据库链接错误:' . $this->db->connect_errno);
		}
		$this->db->query('set names utf8');
	}

	/**
	 * [insert: 向数据库中插入数据]
	 * @param  [string] $table  数据插入的表名
	 * @param  [array]  $arr     插入的键值对
	 * @return  [int]      $rows   影响的行数
	 * INSERT INTO table_name (column1, column2,...) VALUES (value1, value2,....)
	 * <扩展:一次性插入多条数据>
	 */
	public function insert($table, $arr) {
		foreach ($arr as $key => $value) {
			if (!get_magic_quotes_gpc()) { // 判断是否开启magic_quotes
				$value = addslashes($value); // 添加反斜杠,提高安全性
			}
			$arrKey[] = $key;
			$arrValue[] = "'".$value."'";
		}
		$keys = implode(",", $arrKey);
		$values = implode(",", $arrValue);
		$query = "INSERT INTO ".$table." (".$keys.") VALUES (".$values.")";
		$result = $this->db->query($query);
		if ($result) {
			return $this->db->affected_rows; // 返回插入的行数
		} else {
			die("插入数据失败");
		}
	}

	/**
	 * [find: 查询指定条件的所有数据]
	 * @param  [string] $query             需要执行的sql语句
	 * @return  [array]  $searchResult  查询结果
	 */
	public function find($query) {
		$result = $this->db->query($query);
		if (!$result) {
			die("查询数据失败");
		} else {
			$numRows = $result->num_rows;
			if ($numRows > 0) {
				for ($i = 0; $i < $numRows; $i++) { // 将查询结果存入数组
				$tmpResult[] = $result->fetch_assoc();
				}
				if (get_magic_quotes_gpc()) {
					foreach ($tmpResult as $key => $value) { // 去掉数据存入数据库时添加的反斜杠
						$searchResult[$key] = stripslashes($value);
					}
				} else {
					$searchResult = $tmpResult;
				}
				$result->free();
				return $searchResult;
			} else {
				$result->free();
				return NULL;
			}
		}
	}

	/**
	 * [update: 更新数据库]
	 * @param  [string] $table  需要更新的表名
	 * @param  [array]  $arr      键值对
	 * @param  [string] $where 更新条件
	 * @return  [无返回值]
	 * UPDATE table_name SET column1='value1',column2='value2' WHERE  some_column= 'some_value'
	 * <扩展:一次性更新多条数据>
	 */
	public function update($table, $arr, $where) {
		foreach ($arr as $key => $value) {
			if (!get_magic_quotes_gpc()) {
				$value = addslashes($value);
			}
			$arrKeyAndValue[] = $key."='".$value."'";
		}
		$keyAndvalues = implode(",", $arrKeyAndValue);
		$query =  "UPDATE ".$table." SET ".$keyAndvalues." WHERE ".$where;
		$result = $this->db->query($query);
		if (!$result) {
			die("数据更新失败");
		}
	}

	/**
	 * [delete: 删除数据库表中的单行数据]
	 * @param  [string] $table   表名
	 * @param  [string] $where 删除条件
	 * @return  [无返回值]
	 * DELETE FROM table_name WHERE some_colunm='some_value'
	 * <扩展:一次性删除多条数据>
	 */
	public function delete($table, $where) {
		$query = "delete from ".$table." where ".$where;
		$result = $this->db->query($query);
		if (!$result) {
			die("数据删除失败");
		}
	}
}
?>
