<?php
  require_once("ggong/mysql.php");
  require_once("ggong/list_display.php");
  if(isset($_GET["nid"])){
  	$nid=$_GET["nid"];
	$sql="select * from news where id={$nid}";
	$result=mysql_query($sql);
	$rows=mysql_fetch_row($result);
	$typeid=$rows[7];
//	print_r($row);
  }else{
  	//echo "<script>alert('传参错误');location.href='index.php';</script>";
  }
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
			<img src="img/49.jpg" width="40" />
			<ul class="navbar-nav">
				<li class="nav-item"><a class="nav-link active">Logn</a></li>
				<li class="nav-item"><a class="nav-link">active</a></li>
				<li class="nav-item"><a class="nav-link">link</a></li>
			</ul>
			<div style="position: absolute; right: 10px; color: white;"><a href="logn.html">登录</a>&nbsp;&nbsp;<a href="reg.html">注册</a></div> 
		</nav>
		<div class="row">
			<div class="col-md-2">
		
				<ul class="nav flex-column mt-1">
							<li class='nav-item mb-1'><a class='btn btn-info' href="news.php" style='width:100%;margin-top: 2px;'>全部新闻</a></li>
							<?php
								$newstypesql="select id,tname from newstype";
									$renewstype=mysql_query($newstypesql);
									while($row=mysql_fetch_array($renewstype)){
									echo "<li class='nav-item mb-1' style='width:100%'><a class='nav-linkc btn btn-info' href='news.php?typeid=".$row["id"]."&sea=".(isset($_GET["sea"]) ? $_GET["sea"] : "")."' style='width:100%'>";
									echo $row["tname"];
									echo "</a></li>";
								}
							?>
						</ul>
				</div>
				<div  class="col-md-10">
			<ol class="breadcrumb mt-1">
				  <li class="breadcrumb-item"><a href="index.php">首页</a></li>
				  <li class="breadcrumb-item"><a href="news.php">新闻中心</a></li>
				  <li class="breadcrumb-item active"><?php echo ($typeid=="" ? "全部新闻" : gettypename($typeid)) ?></li>
			</ol>
			<div class="container">
				<h3 style="text-align: center;">
					<?php echo $rows[1]; ?>
				</h3>
				<p>作者：<?php echo $rows[3]; ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rows[8]; ?></p>
				<hr />
				<p>
					<?php echo $rows[4]; ?>
				</p>
				<p>[返回]</p>
			</div>
			</div>
			</div>
		<footer class="jumbotron text-center" style="padding-top: 14px; padding-bottom: 10px;">
			<span>版权所有&copy;鲲鹏九班</span>
		</footer>
	</body>
</html>
