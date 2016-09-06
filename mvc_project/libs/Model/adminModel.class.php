<?php
class adminModel{	//从数据库存取数据
	
	public $_table ='admin';	//定义表名

	//取用户信息，通过用户名

	function findOne_by_username($username){
		$sql = 'select * from '.$this->_table.' where username="'.$username.'"';
		return DB::findOne($sql);
	}

	//核对用户密码 -->auth模型
}

?>