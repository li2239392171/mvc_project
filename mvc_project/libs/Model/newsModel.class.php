<?php
class newsModel{
	public $_table = 'news'; 


	function count(){
		$sql = 'select count(*) from '.$this->_table;
		return DB::findResult($sql,0,0);
	}

	public function getnewsinfo($id){
		if(empty($id)){
			return array();
		}
		else{
			$id = intval($id);	//防止sql注入，如果是字符串就转换为0
			$sql = 'select * from '.$this->_table.' where id= '.$id;
			return DB::findOne($sql);		
		}
	}

	function newssubmit($data){
		extract($data);   //extract()该函数使用数组键名作为变量名，使用数组键值作为变量值
		if(empty($title)||empty($content)){
			return 0;
		}
		$title = addslashes($title);   //特殊字符转换，防止sql注入
		$content = addslashes($content);
		$author = addslashes($author);
		$from = addslashes($from);
		$data = array(
				'title'=>$title,
				'content'=>$content,
				'author'=>$author,
				'from'=>$from,
				'dateline'=>time()
		);
		if($_POST['id']!=''){
			DB::update($this->_table, $data, 'id='.$id);
			return 2;	//只输出特定数字
		}
		else{
			DB::insert($this->_table, $data);
			return 1;
		}
	}

	function findAll_orderby_dateline(){
		$sql = 'select * from '.$this->_table.' order by dateline desc';
		return DB::findAll($sql);
	}

	function del_by_id($id){
		return DB::del($this->_table, 'id='.$id);
	}


	//-----------前台模块-----------------
	function get_news_list(){
		$data = $this->findAll_orderby_dateline();
		foreach($data as $k=>$news){
			$data[$k]['content'] = mb_substr(strip_tags($data[$k]['content']),0,200);   //先去html标签，再截取内容
			$data[$k]['dateline'] = date('Y-m-d H:i:s', $data[$k]['dateline']);
		}
		return $data;
	}
}

?>