<?php
	class dbpdo{
		private $pdo=null;	//PDO对象
		private $checkSQL_type = 0; //默认为0不开启,1为开启
		
		
		public function __construct(){
			//新建对象时执行
			try{
				$this->pdo = new PDO("mysql:host=localhost;dbname=guowu;charset=utf8","root","root");
			}catch(PDOException $e){
				die("你是狗吧,写个PDO对象也能写错".$e->getMessage());
			}
		}
		
		
		/* 四大基本操作    增 删 改 查    绝世神通,你值得拥有√ */
		public function insert($table,$array){
			$field="";$value="";	//field是字段,value是对应的值
			$num=0;$wh="";
			foreach($array as $zd=>$val){
				$field.="{$zd},";		
				if($this->checkSQL_type == 1){
					$value.="{$val},";	//拼加起来
				}	
				$num++;$wh.="?,";	//拼加起来 
			}
			$field=trim($field,",");$value=trim($value,",");$wh=trim($wh,",");	//清除一下逗号
			if($this->checkSQL_type == 1){
				$sql = "insert into {$table}({$field})values({$wh})";
				$this->check_SQl($sql,$value);
			}else{
				$sql = "insert into {$table}({$field})values({$value})";
				$res = $this->pdo->query($sql);		//发送SQL语句
				return $this->pdo->lastInsertId();	//返回最后插入的行的ID
			}
		}
		public function delete($table,$where){
			$sql = "delete from {$table} {$where}";
			$this->pdo->query($sql);
		}
		public function update($table,$array,$where){
			$update_field="";//用于拼加字段的变量
			$num = 0;$value="";//用于防SQL注入的参数
			foreach($array as $fd=>$val){
				//foreach 循环拼加 $fd是数组下标,$val是数组值
				if($this->check_type == 1){
					$update_field .= "{$fd}=?,";
					$value.=$val.",";
				}else{
					$update_field .= "{$fd}='{$val}',";
				}
				$num+=1;
			}
			$update_field = trim($update_field,",");$value=trim($value,",");
			
			$sql="update {$table} set {$update_field}";
			$this->pdo->query($sql);
						
		}
		public function select($table,$field = "*",$where = "",$ms = "one"){
			$sql = "select {$field} from {$table} {$where}";
			if($ms == "one"){
				$res = $this->pdo->query($sql);
				return $res->fetch();
			}elseif($ms == "all"){
				$res = $this->pdo->query($sql);
				return $res->fetchall();
			}
		}
		
		
		
		//究极超级操作
		//开启究极检查功能,为了防止坏人使用SQL注ru
		public function start_checkSQL(){
			$this->checkSQL_type = 1;
		}
		//关闭究极检查功能,你人没了!!!!
		public function close_checkSQL(){
			$this->checkSQL_type = 0;
		}
		//究极检查功能
		private function check_SQl($sql,$value){
			$obj = $this->pdo->prepare($sql);
			$value = explode(",", $value);
			for($i = 0;$i < sizeof($value);$i++){
				$obj->bindparam(($i+1),$value[$i],PDO::PARAM_STR,1);
			}
			echo $obj->execute();
		}
		public function __destruct(){
			$pdo = null;
		}
	}
?>