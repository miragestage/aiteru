-- ********************************************
-- **** koyokan/�c�a�쐬�X�N���v�g
-- ********************************************

USE mysql;

--charset utf8;


-- �f�[�^�x�[�X�쐬
DROP DATABASE IF EXISTS aiteru;
CREATE DATABASE aiteru;
-- CHARACTER SET = utf8;

-- ���[�U�[�쐬
GRANT ALL PRIVILEGES ON *.* TO koyo_root@localhost IDENTIFIED BY 'aiteru';
FLUSH PRIVILEGES;

-- ���[�U�[�m�F
-- SELECT Host, User, Select_priv, Insert_priv,Update_priv, Delete_priv FROM user order by user, host;


