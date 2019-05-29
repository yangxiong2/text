<?php
//require_once("mysql.php");//连接数据库
//	include("mysql.php");
//	if(isset($_POST['submit']))
//	{
//		$uname=$_POST['uname'];
//		$pwd=md5($_POST['pwd']);
//		$sex=$_POST['sex'];
//		$tel=$_POST['tel'];
//		$filesname='';
//		$arr=$_FILES["file"];//接收图片上传
//		//print_r($arr);
//		if(($arr["type"]=="image/gif" || $arr["type"]=="image/png" || $arr["type"]=="image/jpg" || $arr["type"]=="image/jpeg") && $arr["size"]<102400000)
//		{
//			$filesname="./upload/image/".date("YmdHis").$arr["name"];
//			if(file_exists($filesname))
//			{
//				echo "已存在";
//			}
//			else
//			{
//				$filesname=iconv("utf-8","gb2312", $filesname);//把图片名为中文的utf-8编码转换成gb2312中文编码
//				move_uploaded_file($arr["tmp_name"], $filesname);//第一个这个图片从哪里上传，第二个上传到哪里去
//			}
//		}
//		else
//		{
//			echo "<script>alert('图片上传不成功')</script>";
//		}
//		
//		$cd=$_POST['cd'];
//		$email=$_POST['email'];
//		
//	
//		$sql="insert into user(uname,pwd,sex,tel,file,cd,email) values('{$uname}','{$pwd}',$sex,'{$tel}','{$filesname}','{$cd}','{$email}')";
//		$reg=mysql_query($sql);
//		if(!$reg)
//		{
//			echo "<script> alert('注册失败');window.location.href='register.php';</script>";
//		}
//		else
//		{
//			echo "<script> alert('注册成功');window.location.href='logn.html';</script>";
//		}
//		
//	}


include("db2.php");
require_once("ggong/uploadfile.php");
	if(isset($_POST['submit']))
	{
		$uname=$_POST['uname'];
		$upwd=md5($_POST['upwd']);
		$usex=$_POST['usex'];
		$utel=$_POST['utel'];
		$arr=$_FILES["ufile"];//接收图片上传
		$objflie=new uploadfile(TRUE,"./upload/image/","jpg,gif,png");
		$objflie->upfile($arr);
		echo $objflie->getmsg();
		$filename=$objflie->getfilepath();
		
		
//		$filename='';
//		//print_r($arr);
//		if(($arr["type"]=="image/gif" || $arr["type"]=="image/png" || $arr["type"]=="image/jpg" || $arr["type"]=="image/jpeg") && $arr["size"]<102400000)
//		{
//			$filename="./upload/image/".date("YmdHis").$arr["name"];
//			if(file_exists($filename))
//			{
//				echo "已存在";
//			}
//			else
//			{
//				$filename=iconv("utf-8","gb2312", $filename);//把图片名为中文的utf-8编码转换成gb2312中文编码
//				move_uploaded_file($arr["tmp_name"], $filename);//第一个这个图片从哪里上传，第二个上传到哪里去
//			}
//		}
//		else
//		{
//			echo "<script>alert('图片上传不成功')</script>";
//		}
		
		$ucid=$_POST['ucid'];
		$uemail=$_POST['uemail'];
		
		$db=new db();
		$arr=array("uname"=>$uname,"upwd"=>$upwd,"usex"=>$usex,"utel"=>$utel,"ufile"=>$filename,"ucid"=>$ucid,"uemail"=>$uemail);
		$result=$db->insert("user", $arr);
		//$sql="insert into user(uname,pwd,sex,tel,file,ucid,email) values('{$uname}','{$pwd}',$sex,'{$tel}','{$filesname}','{$ucid}','{$email}')";
	//	$reg=mysql_query($sql);
		if(!$result)
		{
			echo "<script> alert('注册失败');window.location.href='register.php';</script>";
		}
		else
		{
			echo "<script> alert('注册成功');window.location.href='logn.html';</script>";
		}
		
	}
?>