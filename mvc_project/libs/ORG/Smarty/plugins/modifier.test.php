<?php
	function smarty_modifier_test($time,$format){
		return date($format,$time);
	}
?>