<?php
require_once("ggong/mysql.php");
$sql="select count(*) from newstype";
$result=mysql_query($sql);
$row=mysql_fetch_row($result);
echo $row[0];
?>