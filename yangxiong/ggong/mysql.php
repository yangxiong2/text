<?php
$conns=@mysql_connect("localhost","root","root") or die("链接错误");
mysql_query("set names utf8");
mysql_select_db("guowu",$conns);
?><?php

?>