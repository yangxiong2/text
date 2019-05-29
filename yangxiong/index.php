<?php 
	require_once("ggong/mysql.php");
	require_once("ggong/list_display.php");
	
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<script type="text/javascript" src="js/popper.min.js" ></script>
		<script type="text/javascript" src="js/jquery-3.2.0.min.js" ></script>
		<script type="text/javascript" src="js/bootstrap.min.js" ></script>
	</head>
	<!--<style>
		.list-unstyled{
			width: 90%;
			overflow: hidden;
			text-overflow: ellipsis;
			white-space: nowrap;
		}
	</style>-->
	<body>
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
			<img src="img/20160119130645353_400.jpg" width="40" />
			<ul class="navbar-nav">
				<li class="nav-item"><a class="nav-link active">Logn</a></li>
				<li class="nav-item"><a class="nav-link">active</a></li>
				<li class="nav-item"><a class="nav-link">link</a></li>
			</ul>
			<div style="position: absolute; right: 10px; color: white;"><a href="logn.html">登录</a>&nbsp;&nbsp;<a href="register.html">注册</a></div> 
		</nav>
		
		<div class="row">
			<div class="col-md-8 mb-1 mt-1">
				<div id="demo" class="carousel slide" data-ride = "carousel" data-interval="2000">
					<!--slide过度效果-->	
						<!--指示符-->
						<ul class="carousel-indicators">
							<li data-target="#dome" data-slide-to="0" class="active"></li>
							<li data-target="#dome" data-slide-to="1"></li>
							<li data-target="#dome" data-slide-to="2"></li>
							<li data-target="#dome" data-slide-to="3"></li>
							<li data-target="#dome" data-slide-to="4"></li>
						</ul>
						
						<!--插入轮播图-->
						<div class="carousel-inner ml-1">
							<div class="carousel-item active">
								<img src="img/2017102713412215.png" width="100%"style="height: 23rem;"  />
								<div class="carousel-caption">
									<h3>邵阳美景</h3>
								</div>
							</div>
							<div class="carousel-item">
								<img src="img/20171029174828851.png" width="100%" style="height: 23rem;" />
								<div class="carousel-caption">
									<h3>洞口美景</h3>
								</div>
							</div>
							<div class="carousel-item">
								<img src="img/20160119130645353_400.jpg" width="100%"style="height: 23rem;" />
								<div class="carousel-caption">
									<h3>武冈美景</h3>
								</div>
							</div>
							<div class="carousel-item">
								<img src="img/20171029174828851.png" width="100%"style="height: 23rem;" />
								<div class="carousel-caption">
									<h3>邵东美景</h3>
								</div>
							</div>
							<div class="carousel-item">
								<img src="img/bg.jpg" width="100%"style="height: 23rem;"  />
								<div class="carousel-caption">
									<h3>绥宁美景</h3>
								</div>
							</div>
						</div>
						
						<!--左右切换按钮-->
						<a class="carousel-control-prev" href="#demo" data-slide = "prev">
						<span class="carousel-control-prev-icon"></span>
					</a>
					<a class="carousel-control-next" href="#demo" data-slide = "next">
						<span class="carousel-control-next-icon"></span>
					</a>
					</div>
			</div>
			<div class="col-md-4">
					<ul class="nav nav-tabs">
						<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab1">国际新闻</a></li>
						<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab2">邵阳新闻</a></li>
						<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab3">娱乐新闻</a></li>
					</ul>
					<div class="tab-content">
						<div  class="tab-pane active" id="tab1">
							<ul class="list-unstyled">
								<?php
									checknews(1, 5);
								?>
							</ul>
						</div>
						<div  class="tab-pane fade" id="tab2">
							<ul class="list-unstyled">
								<?php
									checknews(3, 5);
								?>
							</ul>
						</div>
						<div  class="tab-pane fade" id="tab3">
							<ul class="list-unstyled">
								<?php
									checknews(18, 5);
								?>
							</ul>
						</div>
					</div>		
				
				</div>	
			</div>
			<div class="row">
				<div class="col-sm-8 text-center">
					<h1>产品中心PRODUCTS</h1>
					<p>我们的产品,他们的故事Our work,their stories</p>
				</div>
				
				<div class="col-sm-4">
					<h1><a href="chanpin.html">More+</a></h1>
				</div>
			</div>
		
		<div class="row container-fluid">
		<div class="col-sm-6 col-md-3">
	        <div class="thumbnail">
	            <a href="spxiangxi.html"><img src="img/20160119132644303_400.jpg" width="260px" height="180px"
	                 alt="通用的占位符缩略图"></a>
	            <div class="caption">
	                <h3>缩略图标签</h3>
	                <p>一些示例文本。一些示例文本。</p>
	                <p>
	                    <a href="gowuche.html" class="btn btn-primary" role="button">
	                        添加购物车
	                    </a>
	                    <a href="gowuche.html" class="btn btn-danger" role="button">
	                        购买
	                    </a>
	                </p>
	            </div>
	        </div>
		</div>
		
		<div class="col-sm-6 col-md-3">
	        <div class="thumbnail">
	            <a href="spxiangxi.html"><img src="img/20160119132644303_400.jpg" width="260px" height="180px"
	                 alt="通用的占位符缩略图"></a>
	            <div class="caption">
	                <h3>缩略图标签</h3>
	                <p>一些示例文本。一些示例文本。</p>
	                <p>
	                    <a href="gowuche.html" class="btn btn-primary" role="button">
	                        添加购物车
	                    </a>
	                    <a href="gowuche.html" class="btn btn-danger" role="button">
	                        购买
	                    </a>
	                </p>
	            </div>
	        </div>
		</div>
		
		<div class="col-sm-6 col-md-3">
	        <div class="thumbnail">
	            <a href="spxiangxi.html"><img src="img/20160119132644303_400.jpg" width="260px" height="180px"
	                 alt="通用的占位符缩略图"></a>
	            <div class="caption">
	                <h3>缩略图标签</h3>
	                <p>一些示例文本。一些示例文本。</p>
	                <p>
	                    <a href="gowuche.html" class="btn btn-primary" role="button">
	                        添加购物车
	                    </a>
	                    <a href="gowuche.html" class="btn btn-danger" role="button">
	                        购买
	                    </a>
	                </p>
	            </div>
	        </div>
		</div>
		
		<div class="col-sm-6 col-md-3">
	        <div class="thumbnail">
	             <a href="spxiangxi.html"><img src="img/20160119132644303_400.jpg" width="260px" height="180px"
	                 alt="通用的占位符缩略图"></a>
	            <div class="caption">
	                <h3>缩略图标签</h3>
	                <p>一些示例文本。一些示例文本。</p>
	                <p>
	                    <a href="gowuche.html" class="btn btn-primary" role="button">
	                        添加购物车
	                    </a>
	                    <a href="gowuche.html" class="btn btn-danger" role="button">
	                        购买
	                    </a>
	                </p>
	            </div>
	        </div>
		</div>
		
		<div class="col-sm-6 col-md-3">
	        <div class="thumbnail">
	            <a href="spxiangxi.html"><img src="img/20160119132644303_400.jpg" width="260px" height="180px"
	                 alt="通用的占位符缩略图"></a>
	            <div class="caption">
	                <h3>缩略图标签</h3>
	                <p>一些示例文本。一些示例文本。</p>
	                <p>
	                    <a href="gowuche.html" class="btn btn-primary" role="button">
	                        添加购物车
	                    </a>
	                    <a href="gowuche.html" class="btn btn-danger" role="button">
	                        购买
	                    </a>
	                </p>
	            </div>
	        </div>
		</div>
		
		<div class="col-sm-6 col-md-3">
	        <div class="thumbnail">
	            <a href="spxiangxi.html"><img src="img/20160119132644303_400.jpg" width="260px" height="180px"
	                 alt="通用的占位符缩略图"></a>
	            <div class="caption">
	                <h3>缩略图标签</h3>
	                <p>一些示例文本。一些示例文本。</p>
	                <p>
	                    <a href="gowuche.html" class="btn btn-primary" role="button">
	                        添加购物车
	                    </a>
	                    <a href="gowuche.html" class="btn btn-danger" role="button">
	                        购买
	                    </a>
	                </p>
	            </div>
	        </div>
		</div>
		
		<div class="col-sm-6 col-md-3">
	        <div class="thumbnail">
	             <a href="spxiangxi.html"><img src="img/20160119132644303_400.jpg" width="260px" height="180px"
	                 alt="通用的占位符缩略图"></a>
	            <div class="caption">
	                <h3>缩略图标签</h3>
	                <p>一些示例文本。一些示例文本。</p>
	                <p>
	                    <a href="gowuche.html" class="btn btn-primary" role="button">
	                        添加购物车
	                    </a>
	                    <a href="gowuche.html" class="btn btn-danger" role="button">
	                        购买
	                    </a>
	                </p>
	            </div>
	        </div>
		</div>
		
		<div class="col-sm-6 col-md-3">
	        <div class="thumbnail">
	            <a href="spxiangxi.html"><img src="img/20160119132644303_400.jpg" width="260px" height="180px"
	                 alt="通用的占位符缩略图"></a>
	            <div class="caption">
	                <h3>缩略图标签</h3>
	                <p>一些示例文本。一些示例文本。</p>
	                <p>
	                    <a href="gowuche.html" class="btn btn-primary" role="button">
	                        添加购物车
	                    </a>
	                    <a href="gowuche.html" class="btn btn-danger" role="button">
	                        购买
	                    </a>
	                </p>
	            </div>
	        </div>
		</div>
		</div>
			<div class="row">
				<div class="col-sm-8 text-center">
					<h1>新闻中心News</h1>
					<p>我们的产品,他们的故事Our work,their stories</p>
				</div>
				
				<div class="col-sm-4">
					<h1><a href="news.php">More+</a></h1>
				</div>
			</div>
			
		<div class="row">
			<div class="col-sm-5">
				<img src="img/news.png" style="float: right;" height="90%" />
			</div>
			
			<div class="col-sm-7 md-1">
				<div class="container-fluid">
					<?php
						$newssql="select id,ntitle,ndes from news order by isnew asc,ishot asc,id desc limit 0,4";
						$result=mysql_query($newssql);
						while($row=mysql_fetch_array($result)){
							echo "<div class='media p-3' style='border-bottom: 1px dashed gray; width: 60%;'>
					    <img src='img/20160119132644303_400.jpg' width='15%' class='rounded-circle'>
						<div class='media-body'>";
						echo "<h4 title=".$row["ntitle"]." >".mysubstr($row["ntitle"],24,TRUE)."</h4>";
						echo "<p>";
						echo mysubstr($row["ndes"],48,TRUE)."</p></div></div>";
						}
					?>
				</div>
			</div>
		</div>
		<footer class="jumbotron text-center" style="padding-top: 14px; padding-bottom: 10px;">
			<span>版权所有:&copy;鲲鹏九班</span>
		</footer>
		
	</body>
</html>
