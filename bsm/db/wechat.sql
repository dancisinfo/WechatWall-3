-- 创建wechat数据库
CREATE DATABASE wechat;
USE wechat;
CREATE TABLE userMsg
(
	msgid CHAR(9) NOT NULL PRIMARY KEY,
	fackid CHAR(10) NOT NULL,
	nickname CHAR(64) NOT NULL,
	msg VARCHAR(255),
	time INT UNSIGNED,
	audit TINYINT
);

-- 用户授权
GRANT ALL ON wechat.*
to 'jerry'@'localhost' IDENTIFIED BY 'fei12345';
FLUSH PRIVILEGES;