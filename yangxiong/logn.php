<?php
//header("content-type:text/html;charset=utf8");
//include("mysql.php");
//session_start();
//	if(isset($_POST['submit'])){
//		$uname=$_POST["uname"];
//		$pwd=md5($_POST["pwd"]);
//		$ucode=$_POST["ucode"];
//		if($ucode==$_SESSION['authcode']){
//			$sql="select id from user where uname='{$uname}' and pwd='{$pwd}'";
//			$result=mysql_query($sql);
//			$row=mysql_fetch_row($result);
//			if($row){
//				$_SESSION["uname"]=$uname;
//				$_SESSION["uid"]=$row[0];
//              echo "<script> alert('登录成功');window.location.href='indexs.html';</script>";
//			}else{
//				echo "<script> alert('用户名或密码错误');history.go(-1);</script>";
//			}
//		}else{
//			echo "<script>alert('验证码不对');history.go(-1);</script>";
//		}
//	}
//	else{
//		echo "<script> alert('登录失败');history.go(-1);</script>";
//	}

header("content-type:text/html;charset=utf8");
include("mysql.php");
include("db2.php");
	if(isset($_POST['submit'])){
		$uname=$_POST["uname"];
		$pwd=md5($_POST["pwd"]);
		$ucode=$_POST["ucode"];
		if($ucode==$_SESSION['authcode']){
			setcookie("uname",$uname,time()+120);
			$sql="select id from user where uname='{$uname}' and pwd='{$pwd}'";
			$obj=new db();
			$row=$obj->getrow($sql,"row");
			if($row){
				$_SESSION["uname"]=$uname;
				
				$_SESSION["uid"]=$row[0];
                echo "<script> alert('登录成功');window.location.href='index.html';</script>";
			}else{
				echo "<script> alert('用户名或密码错误');history.go(-1);</script>";
			}
		}else{
			echo "<script>alert('验证码不对');history.go(-1);</script>";
		}
	}
	else{
		echo "<script> alert('登录失败');history.go(-1);</script>";
	}
?>