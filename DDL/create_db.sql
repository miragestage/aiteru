-- ********************************************
-- **** koyokan/ＤＢ作成スクリプト
-- ********************************************

USE mysql;

--charset utf8;


-- データベース作成
DROP DATABASE IF EXISTS aiteru;
CREATE DATABASE aiteru;
-- CHARACTER SET = utf8;

-- ユーザー作成
GRANT ALL PRIVILEGES ON *.* TO koyo_root@localhost IDENTIFIED BY 'aiteru';
FLUSH PRIVILEGES;

-- ユーザー確認
-- SELECT Host, User, Select_priv, Insert_priv,Update_priv, Delete_priv FROM user order by user, host;


