<?php
include("mysql.php");
if(isset($_POST["uname"])){
	$uname=$_POST["uname"];
	$sql="select id from user where uname='{$uname}'";
	$result=mysql_query($sql);
	$row=mysql_fetch_row($result);
	if($row){
		echo "1";//ok代表返回存在值
	}
	else{
		echo "0";
	}
}
else{
	echo "3";//当请求正确，参数没有接收到情况下
}
//function chexkname($username){
//	$sql="select id from user where uname='{$username}'";
//	$result=mysql_query($sql);
//	$row=mysql_fetch_row($result);
//	if($row){
//		echo "1";//ok代表返回存在值
//	}
//	else{
//		echo "0";
//	}
//}
?>