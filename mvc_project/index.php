<?php
	header("Content-type:text/html; charset=utf-8");
	//require_once('function.php');
	//session_start();
	//date_default_timezone_set('Asia/Shanghai');
	date_default_timezone_set('PRC');
	require_once('config.php');
	require_once('framework/pc.php');	//引入框架
	PC::run($config);

?>