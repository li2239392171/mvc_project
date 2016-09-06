<?php
	function C($name, $method){
		require_once('/libs/Controller/'.$name.'Controller.class.php');
		//$testController = new testController();
		//$testController->show();
		eval('$obj = new '.$name.'Controller(); $obj->'.$method.'();');

		/*
			eval()函数调用简单但不安全
			eval('$obj = new '.$name.'Controller(); $obj->'.$method.'();');
			可用下面代码代替:
			$controller = $name.'Controller';
			$obj = new $controller();
			$obj->$method();
		*/
	}	

	//C('test','show');


	function M($name){
		require_once('/libs/Model/'.$name.'Model.class.php');
		eval('$obj = new '.$name.'Model();');
		return $obj; 
	}


	function V($name){
		require_once('./libs/View/'.$name.'View.class.php');
		$testView = new testView();
		eval('$obj = new '.$name.'View();');
		return $obj;
	}

	function daddslashes($str){
		return (!get_magic_quotes_gpc())?addslashes($str):$str; //判断魔法符号是否打开，避免二次转义
	}

		//Smarty实例
	function ORG($path,$name,$params=array()){
		require_once('libs/ORG/'.$path.$name.'.class.php');
		$obj = new $name();
		if(!empty($params)){
			foreach($params as $key=>$value){
				$obj->$key = $value;
			}
		}
		return $obj;
	}

?>