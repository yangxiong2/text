<?php
	class pageclass{
		private $page;//当前页
		private $pagesize;//显示条数
		private $pages;//总页数
		private $total;//总条数
		private $url;//地址
		private $limit;//分页条件
		public function __construct($_page=1,$_pagesize=2,$_total=1,$_url,$_links){
			$this->page=$_page;
			$this->pagesize=$_pagesize;
			$this->total=$_total;
			$this->pages=ceil($this->total/$this->pagesize);
			$this->url=$_url;
			$this->limit="limit ".($this->page-1)*$this->pagesize.",".$this->pagesize;
		    $this->links=$_links;	
		}
		
		public function limit(){
			return $this->limit;
		}
		
		private function getfirst(){
			$str="";
			if($this->page==1){
				$str="<li class='page-item'><a class='page-link'>首页</a></li>";
			}
			else{
				$str="<li class='page-item'><a class='page-link' href=".$this->url."?page=1.$this->links.>首页</a></li>";
			}
			return $str;
		}
		
		private function getprev(){
			$str="";
			if($this->page==1){
				$str="<li class='page-item'><a class='page-link'>上一页</a></li>";
			}
			else{
				
				$str="<li class='page-item'><a class='page-link' href=".$this->url."?page=".($this->page-1).$this->links.">上一页</a></li>";
			}
			return $str;
		}
		
		private function getnext(){
			$str="";
			if($this->page==$this->pages){
				$str="<li class='page-item'><a class='page-link'>下一页</a></li>";
			}
			else{
				
				$str="<li class='page-item'><a class='page-link' href=".$this->url."?page=".($this->page+1).$this->links.">下一页</a></li>";
			}
			return $str;
		}
		private function getend(){
			$str="";
			if($this->page==$this->pages){
				$str="<li class='page-item'><a class='page-link'>末页</a></li>";
			}
			else{
				
				$str="<li class='page-item'><a class='page-link' href=".$this->url."?page=".$this->pages.$this->links.">末页</a></li>";
			}
return $str;
		}
		
		public function display_list(){
			$str="";
			$str.=$this->getfirst();
			$str.=$this->getprev();
			$str.=$this->getnext();
			$str.=$this->getend();
			return $str;
		}
	}
//$obj=new pageclass(1,2,3,"");
//echo $obj->display_list();
?>