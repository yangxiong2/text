<?php
class db {
	public function __construct() {
		$dbcon = @mysql_connect("localhost", "root", "root");
		mysql_select_db("guowu", $dbcon);
		mysql_query("set names utf8");
	}

	private function query($sql) {
		$query = mysql_query($sql);
		return $query;
	}

	//获取一条记录
	/*
	 * $query2=mysql_query($sql);
	 * return mysql_fetch_array($query2);
	 */
	public function getrow($sql, $type = "row") {
		$query2 = $this -> query($sql);
		if (!in_array($type, array("array", "assoc", "row"))) {
			die("参数错误，只能是array,assoc,row作为参数来获取记录");
		}
		$funfetch = "mysql_fetch_" . $type;
		//mysql_fetch_row
		return $funfetch($query2);
	}

	public function getall($sql, $type = "assoc") {
		$query2 = $this -> query($sql);
		if (!in_array($type, array("array", "assoc"))) {
			die("参数错误，只能是array,assoc作为参数来获取记录");
		}
		$funfetch = "mysql_fetch_" . $type;
		$list = array();
		while ($rows = $funfetch($query2)) {
			$list[] = $rows;
		}
		return $list;
	}

	public function insertdata($sql) {
		$query2 = $this -> query($sql);
		if ($query2)
			return 1;
		else
			return 0;
	}

	//insert into newstype(tname,tdes) values('{}','{}');
	/*
	 * $data array("tname"=>"IT新闻","tdes"=>"软件行业新闻");
	 */

	public function insert($table, $data) {
		$str_key = "";
		//字段名
		$str_value = "";
		//字段对应的值
		foreach ($data as $key => $val) {
			$str_key .= $key . ",";
			$str_value .= "'$val',";
		}
		//else{
		//	die("data参数有误");
		//}
		//$str_key=tname,tdes,
		//$str_value='IT新闻','软件行业新闻',
		$str_key = trim($str_key, ',');
		//清除字符串两边的逗号,
		$str_value = trim($str_value, ',');
		$insql = "insert into {$table} ({$str_key}) values({$str_value})";
		$result = $this -> query($insql);
		return mysql_insert_id();
		//返回插入数据的自动增长id
	}

	//update newstype set tname='sdf',tdes='ddd' where is=1
	public function update($table, $data, $where) {
		$str_value = "";
		//字段对应的值
		foreach ($data as $key => $val) {
			$str_value .= $key . "=" . "'$val',";
		}
		//$str_value:  aaa='ab',bbb='bc',
		$str_value = trim($str_value, ',');
		//清除字符串两边的逗号,
		$upsql = "update {$table} set {$str_value} where id={$where}";
		//		echo $upsql;
		$result = $this -> query($upsql);
		return mysql_affected_rows();
		//返回所影响的行数
	}

	//单条件删除单个数据
	public function delone($table, $where) {
		$str = "";
		foreach ($where as $key => $val) {
			$str .= $key . "=" . $val;
		}
		$sql = "delete from {$table} where {$str}";
		$result = $this -> query($sql);
		return mysql_affected_rows();
	}

	//批量删除数据
	/*
	 * delete from news where id=1
	 * delete from news where id in(1,2,3)
	 */
	public function delall($table, $where) {
		$str = "";
		foreach ($where as $key => $val) {
			if (is_array($val)) {
				$str .= $key . " in(" . implode(',', $val) . ")";//$where=array("id"=>1)
			} else {
				$str .= $key . "=" . $val;//当个删除
			}
		}
		$sql = "delete from {$table} where {$str}";
		$result = $this -> query($sql);
		return mysql_affected_rows();
	}

	function __destruct() {
		mysql_close();
	}

}
//insert into newstype(tname,tdes)values('a','a'),('b','b');//批量插入
//$objdb=new db();
//$arr=$objdb->getall("select * from role");
//echo "<pre>";
////print_r($arr);
//$str="<table>";
//foreach($arr as $k){
//	$str.="<tr>";
//	$str.="<td>".$k["id"]."</td>";
//	$str.="<td>".$k["rname"]."</td>";
//	$str.="<td>".$k["createtime"]."</td>";
//	$str.="</tr>";
//}
//$str.="</table>";
//echo $str;
//$into=$objdb->insert("newstype",array("tname"=>"IT新闻","tdes"=>"软件行业新闻"));
//echo $into;
//$update=$objdb->update("newstype",array("tname"=>"国际新闻","tdes"=>"软件行业新闻"),2);
//echo $update;
//$del=$objdb->delone("newstype",2);
//echo $del;

//$arr=[1,2,3];
//$str="in (".implode(',', $arr).")";
//echo $str;
?>