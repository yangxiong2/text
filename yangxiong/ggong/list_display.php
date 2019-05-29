<?php
require_once("str.php");
function checknews($tid,$num){
		$sql="select id,ntitle,isnew,ishot from news where newstype={$tid} order by isnew asc,ishot asc,id desc limit 0,{$num}";	
		$result=mysql_query($sql);
		$str="";
		while($row=mysql_fetch_array($result)){
			$str.="<li><a href=detail.php?nid=".$row["id"].">".mysubstr($row[1],38,TRUE);
			if($row[2]==1){
				$str.="<span class='badge badge-danger'>New</span>&nbsp;";
			}
			if($row[3]==1){
				$str.="<span class='badge badge-warning'>Hot</span>";
			}
			$str.="</a></li>";
		}		
		echo $str;
	}
function gettypename($tid){
	$typesql="select tname from newstype where id={$tid}";
	$re=mysql_query($typesql);
	$row=mysql_fetch_row($re);
	return $row[0];
}
?>