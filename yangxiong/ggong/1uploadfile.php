<?php
class uploadfile{
	private $maxfilesize=2000000;//2M
	private $flag_name=TRUE;//是否使用新得命名
	private $allow_type=array();//上传类型
	private $error;
	private $msg;
	private $savepath;
	private $file;
	private $file_type=array();//上传文件类型
	private $file_name;//上传文件名
	private $file_size;//上传的文件大小
	private $file_tmpname;//上传临时文件名
	private $file_ext;//上传文件的扩展名
	private $filepath;//需要上传到哪里的完整路径及文件名
	private $file_newname;//给
	
	function __construct($_flage,$_savepath="./upload/",$_allow_type=''){
		$this->flag_name=$_flage;
		$this->savepath=$_savepath;
		$this->allow_type=$this->get_allow_type($_allow_type);//array("jpeg","gif","png");,"jpag,gif,png";
	}
	
	private function  get_allow_type($alowtype){
		if(is_array($alowtype)){
			$type=array();
			foreach($alowtype as $val){
				$type[]=$val;
			}
			return $type;//返回一个数组
		}
	    else{
	    	$type=explode(",", $alowtype);
			return $type;
	    }
	}
	public function  upfile($file){
		$this->file_name=$file["name"];//文件名,如a.jpg
		$this->file_size=$file["size"];
		$this->file_tmpname=$file["tmp_name"];//临时文件
		$this->error=$file["error"];
		$this->file_type="";//文件的类型,如jpg,gif,png
		$this->file_ext=$this->get_file_type($this->file_name);//文件的类型，如:jpg,gif,png
		switch($this->error){
			case 0:
				$this->msg="";
				break;
			case 1:
				$this->msg="超出了php.ini配置文件中的文件大小";
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
        	if(!in_array($this->file_ext, $this->allow_type)){
        		$this->msg="不符合上传类型";
				return FALSE;
        	}
			if($this->file_size>$this->maxfilesize){
				$this->msg="文件过大";
				return FALSE;
			}
			//./upload/image/a.jpg;
			$this->file_newname=$this->getnewname();
			$this->filepath=$this->savepath.$this->file_newname;//./puload/image/34454544454445445.jpg
			if(move_uploaded_file($this->file_tmpname,$this->filepath)){
				$this->msg="上传成功";
				return TRUE;
			}
			else{
				$this->msg="上传失败";
				return FALSE;
			}
        }
	}
    public function getnewname(){
    	$newname="";
		if($this->flag_name==TRUE){
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
		$result=pathinfo($filename,PATHINFO_EXTENSION);//获取文件名中的后缀名
	}
	public function getmsg(){
		return $this->msg;
	}
	public function gefilepath(){
		return $this->filepath;
	}
}
//print_r(explode(",", "jpg,gif,png"));
//echo "<br>";
//echo pathinfo("abc.jpg",PATHINFO_EXTENSION);//PATHINFO_EXTENSION:获取文件名中的后缀名
//echo "<br>";
//echo microtime();
?>