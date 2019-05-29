<?php
class uploadfile{
	private $maxfilesize=2000000;//2m
	private $flag_name=true;//是否使用新的命名
	private $allow_type=array();//允许上传的类型
	private $error;//错误编号
	private $msg;//错误信息
	private $savepath;//保存路径
	private $file;//文件
	private $file_type=array();//上传文件类型
	private $file_name;//上传的文件名
	private $file_size;//上传的文件大小
	private $file_tmpname;//上传临时的文件名
	private $file_ext;//上传文件的扩展名
	private $filepath;//需要上传到哪里的完整路径及文件名
	private $file_newname;//给上传的文件设置一个新名字
	
	function __construct($_flag,$_savepath="./upload/",$_allow_type=''){
		$this->flag_name=$_flag;
		$this->savepath=$_savepath;
		$this->allow_type=$this->get_allow_type($_allow_type);//array("jpg","gif","png"),"jpg,gjf,png"
	}
	
	public function get_allow_type($allowtype){
		if(is_array($allowtype)){
			$type=array();
			foreach($allowtype as $val){
				$type[]=$val;
			}
			return $type;//返回的是一个数组
		}
		else{
			$type=explode(",", $allowtype);
			return $type;
		}
	}
	
	public function upfile($file){
		$this->file_name=$file["name"];//文件名,如:a.jpg
		$this->file_size=$file["size"];//文件的大小
		$this->file_tmpname=$file["tmp_name"];//临时文件
		$this->error=$file["error"];
		$this->file_ext=$this->get_file_type($this->file_name);//文件类型，如:jpg,gif,png
		switch($this->error){
			case 0:
				$this->msg="";
				break;
			case 1:
				$this->msg="超出了php.ini配置文件的文件大小";
				break;
			case 2:
				$this->msg="超出了maxfilesize的大小";
				break;
			case 3:
				$this->msg="文件被部分上传";
				break;
			case 4:
				$this->msg="没有文件上传";
				break;
			case 5:
				$this->msg="文件大小为0";
				break;
			default:
				$this->msg="文件上传失败";
				break;
		}
		if($this->error==0 && is_uploaded_file($this->file_tmpname)){
			if(!in_array($this->file_ext,$this->allow_type)){
				$this->msg="不符合上传类型";
				return false;
			}
			
			if($this->file_size>$this->maxfilesize){
				$this->msg="文件过大";
				return false;
			}
			//./upload/image/a.jpg;
			$this->file_newname=$this->getnewname();
			$this->filepath=$this->savepath.$this->file_newname;//./upload/image/154545445212152544545.jpg
			if(move_uploaded_file( $this->file_tmpname, $this->filepath)){
				$this->msg="上传成功";
				return true;
			}
			else{
				$this->msg="上传失败";
				return false;
			}
		}
}
		private function getnewname(){
			$newname="";
			if($this->flag_name==true){
				$time=microtime();
				$arrtime=explode(" ", $time);
				$newname=$arrtime[1].($arrtime[0]*100000000).".".$this->file_ext;
			}
			else{
				$newname=$this->file_name;
			}
			return $newname;
		}
	
	
	
	private function get_file_type($filename){
		$result=pathinfo($filename,PATHINFO_EXTENSION);//获取文件名中的后缀名，如:filename="abc.jpg"  则result="jpg"
		return $result;
	}
	public function getmsg(){
		return $this->msg;
	}
	public function getfilepath(){
		return $this->filepath;
	}
}


//print_r(explode(",", "jpg,jif,png"));
//echo pathinfo("abc.jpg",PATHINFO_EXTENSION);
//echo "<br>";
//echo microtime();
?>