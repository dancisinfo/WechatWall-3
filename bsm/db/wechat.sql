-- 创建wechat数据库
CREATE DATABASE wechat;
SET NAMES utf8;
USE wechat;

-- 用户消息表
CREATE TABLE userMsg(
	msgid CHAR(9) NOT NULL PRIMARY KEY,
	fakeid CHAR(10) NOT NULL,
	nickname CHAR(64) NOT NULL,
	content VARCHAR(255),
	time INT UNSIGNED,
	audit TINYINT
) DEFAULT CHARSET utf8  COLLATE utf8_general_ci;

-- 管理员账号
CREATE TABLE admin(
	username CHAR(16) NOT NULL PRIMARY KEY,
	password CHAR(40) NOT NULL
) DEFAULT CHARSET utf8  COLLATE utf8_general_ci;

-- 用户授权
GRANT ALL ON wechat.*
to 'jerry'@'localhost';
FLUSH PRIVILEGES;