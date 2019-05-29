<?php
header("content-type:text/html;charset=utf8");
require_once("ggong/mysql.php");
$page=$_POST["page"];
$pagesize=$_POST["pagesize"];
$start=($page-1)*$pagesize;
$sql="select id,tname from newstype limit {$start},{$pagesize}";
$result=mysql_query($sql);
$arrlist=array();
while($row=mysql_fetch_assoc($result)){
	$arrlist[$row["id"]]["tid"]=$row["id"];
	$arrlist[$row["id"]]["tname"]=$row["tname"];
}
$data_json=json_encode($arrlist);
exit($data_json);
//echo "<pre>";
//print_r($arrlist);
?>