<?php
return array(
	'APP_DEBUG'=> true, // 开启调试模式
	'URL_MODEL'=> 2,
	'URL_HTML_SUFFIX'=> '.do',
	'DB_TYPE'=> 'mysql', // 数据库类型
	'DB_HOST'=> 'localhost', // 数据库服务器地址
	'DB_NAME'=>'ldc', // 数据库名称
	'DB_USER'=>'root', // 数据库用户名
	'DB_PWD'=>'', // 数据库密码
	'DB_PORT'=>'3306', // 数据库端口
	'DB_PREFIX'=>'ldc_', // 数据表前缀

	'SESSION_AUTH_KEY'=>'SessionAuthUser',
	'URL_CASE_INSENSITIVE'=>true,
	
	'COOKIE_USER_NAME'=>"AuthName",
	'COOKIE_USER_ID'=>"AuthID"
);
?>