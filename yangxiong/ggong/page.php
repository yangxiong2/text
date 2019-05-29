<?php
/*
 * 分页的公共页面
 */
 require_once("mysql.php");
 function countsizes($tablename){
 	$result=mysql_query("select count(id) from {$tablename}");
	$row=mysql_fetch_row($result);
	return $row[0];//返回表中记录条数
 }
 
// countsizes("user");
// countsizes("news");
function countsizes2($tablename,$where){
 	$result=mysql_query("select count(*) from {$tablename} {$where}");
	$row=mysql_fetch_row($result);
	if($row){
		return $row[0];
	}
	else{
		return 1;
	}
 }


/*
 * 显示上一页下一页列表
 * <li class="page-item nav-item"><a class="page-link nav-link" data-toggle="pill">首页</a></li>
 */
function pagelistnum($page=1,$pages=1,$url=""){
	$pagestr="";
	if($page==1){
		$pagestr.="<li class='page-item'><a class='page-link'>首页</a></li>";
	}
	else{
		$pagestr.="<li class='page-item'><a class='page-link' href=".$url."?page=1>首页</a></li>";
	}
	
//	if($page==1){
//		$pagestr.="<li class='page-item'><a class='page-link'>上一页</a></li>";
//	}
//	else{
//		$pagestr.="<li class='page-item'><a class='page-link' href=".$url."?page=".($page-1).">上一页</a></li>";
//	}
//	if($page==$pages){
//		$pagestr.="<li class='page-item'><a class='page-link'>下一页</a></li>";
//	}
//	else{
//		$pagestr.="<li class='page-item'><a class='page-link' href=".$url."?page=".($page+1).">下一页</a></li>";
//	}

		for($i=$page-2;$i<=$page+2;$i++){
			if($i>0 && $i<=$pages)
			if($i==$page){
				$pagestr.="<li class='page-item'><a class='page-link'>".$i."</a></li>";
			}
			else{
				$pagestr.="<li class='page-item'><a class='page-link' href=".$url."?page=".$i.">".$i."</a></li>";
			}
		}

	if($page==$pages){
		$pagestr.="<li class='page-item'><a class='page-link'>末页</a></li>";
	}
	else{
		$pagestr.="<li class='page-item'><a class='page-link' href=".$url."?page=".$pages.">末页</a></li>";
	}
	return $pagestr;
}

function pagelist2($page=1,$pages=1,$url="",$link){
	$pagestr="";
	if($page==1){
		$pagestr.="<li class='page-item'><a class='page-link'>首页</a></li>";
	}
	else{
		$pagestr.="<li class='page-item'><a class='page-link' href=".$url."?page=1".$link.">首页</a></li>";
	}
	
	if($page==1){
		$pagestr.="<li class='page-item'><a class='page-link'>上一页</a></li>";
	}
	else{
		$pagestr.="<li class='page-item'><a class='page-link' href=".$url."?page=".($page-1).$link.">上一页</a></li>";
	}
	if($page==$pages){
		$pagestr.="<li class='page-item'><a class='page-link'>下一页</a></li>";
	}
	else{
		$pagestr.="<li class='page-item'><a class='page-link' href=".$url."?page=".($page+1).$link.">下一页</a></li>";
	}
	if($page==$pages){
		$pagestr.="<li class='page-item'><a class='page-link'>末页</a></li>";
	}
	else{
		$pagestr.="<li class='page-item'><a class='page-link' href=".$url."?page=".$pages.$link.">末页</a></li>";
	}
	return $pagestr;
}
?>