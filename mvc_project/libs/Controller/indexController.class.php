<?php
	class indexController{
		function showabout()
		{
			$data = M('about')->aboutinfo();
			VIEW::assign(array('about'=>$data));
		}
		//防止过多读取数据库，将一些小部件存在文本文件或缓存里

		function index(){
			$newsobj = M('news');
			$data = $newsobj->get_news_list();
			$this->showabout();
			VIEW::assign(array('data'=>$data));
			VIEW::display('index/index.html');
		}

		function newsshow(){
			$newsobj = M('news');
			$data = $newsobj->getnewsinfo(intval($_GET['id']));
			$this->showabout();
			VIEW::assign(array('data'=>$data));
			VIEW::display('index/show.html');
		}
	}
	
?>