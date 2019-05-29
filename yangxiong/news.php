<?php
require_once("pageclass.php");
require_once("db2.php");
require_once("ggong/list_display.php");
$page=1;
$pagesize=1;
if(!empty($_GET["page"])){
	$page=$_GET["page"]; 
}
$where="where 1=1";
$link="";
if(!empty($_GET["typeid"])){
	$where.=" and newstype={$_GET["typeid"]}";
	$link.="&typeid={$_GET["typeid"]}";
}
if(!empty($_GET["sea"])){
	$where.=" and ntitle like '%{$_GET["sea"]}%'";
	$link.="&sea={$_GET["sea"]}";
}

$objdb=new db();
$row=$objdb->getrow("select count(*) from news","row");
$count=$row[0];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<script type="text/javascript" src="js/jquery-3.2.0.min.js" ></script>
		<script type="text/javascript" src="js/popper.min.js" ></script>
		<script type="text/javascript" src="js/bootstrap.min.js" ></script>
	</head>
	<body>
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
			<img src="img/20160119132644303_400.jpg" width="40" />
			<ul class="navbar-nav">
				<li class="nav-item"><a class="nav-link active">Logn</a></li>
				<li class="nav-item"><a class="nav-link">active</a></li>
				<li class="nav-item"><a class="nav-link">link</a></li>
			</ul>
			<div style="position: absolute; right: 10px; color: white;"><a href="logn.html">登录</a>&nbsp;&nbsp;<a href="reg.html">注册</a></div> 
		</nav>
			<div class="row">
			<div class="col-md-2 mt-1">
				<ul class="nav flex-column">
					<li class='nav-item mb-1'><a class='btn btn-info' href="news.php" style='width:100%;margin-top: 2px;'>全部新闻</a></li>
					<?php
						$newstypesql="select id,tname from newstype";
						$arr=$objdb->getall($newstypesql,"array");
						foreach($arr as $k){
							echo "<li class='nav-item mb-1' style='width:100%'><a class='nav-linkc btn btn-info' href='news.php?typeid=".$k["id"]."&sea=".(isset($_GET["sea"]) ? $_GET["sea"] : "")."' style='width:100%'>";
							echo $k["tname"];
							echo "</a></li>";
						}
					?>
				</ul>
			</div>
			<div class="col-md-10 mt-1">
				<ol class="breadcrumb">
				  <li class="breadcrumb-item"><a href="index.php">首页</a></li>
				  <li class="breadcrumb-item"><a href="#">新闻中心</a></li>
				  <li class="breadcrumb-item active"><?php echo !empty($_GET["typeid"]) ? gettypename($_GET["typeid"]) : "全部新闻" ?></li>
				</ol>
				<form class="form-inline" action="news.php" method="get">
					<input type="hidden" name="typeid" value="<?php echo isset($_GET["typeid"]) ? $_GET["typeid"] : "" ?>" />
					<input type="text" class="form-control" name="sea" placeholder="search" value="<?php echo isset($_GET["sea"]) ? $_GET["sea"] : "" ?>" />
					<button class="btn btn-success" type="submit">search</button>
				</form>
					<table class="table">
						<?php
							$objp=new pageclass($page,$pagesize,$count,"news.php",$link);
							$sqls="select id,ntitle,ndes,createtime,isnew,ishot from news order by isnew asc,ishot asc,id desc {$objp->limit()}";
							$arr=$objdb->getall($sqls,"array");
							foreach($arr as $k){
								echo "<div class='media p-2' style='border-bottom: 1px dashed gray; width: 96%;'>
					    			  <img src='img/banana.jpg' width='10%' height='80px' />
									  <div class='media-body'>";
								echo "<h4><a href=detail.php?nid=".$k["id"].">".$k["ntitle"].($k["isnew"]==1 ? "<span class='badge badge-danger'>New</span>&nbsp;&nbsp;" : "").($k["ishot"]==1 ? "<span class='badge badge-warning'>hot</span>" : "")."</a></h4>";
								echo "<span>".mysubstr($k["ndes"],66,TRUE)."</span><br />";
								echo "<span>".$k["createtime"]."</span>";
								echo "</div></div>";
							}
						?>
					</table>
				</div>
					<ul class="nav pagination pagination-md col-md-3 container nav-pills">
						<?php
							echo $objp->display_list();
						?>
					</ul>
			</div>
		<footer class="jumbotron text-center" style="padding-top: 14px; padding-bottom: 10px;">
			<span>版权所有&copy;鲲鹏九班</span>
		</footer>
	</body>
</html>
