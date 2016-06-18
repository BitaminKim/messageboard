
<?php
	header("Content-type: text/html; charset=utf-8");
	$con  = mysqli_connect('localhost','root','root') or die ("MySQL连接错误");
	if(mysqli_select_db($con,'message_board')){//如果有数据库就直接使用创建数据表，如果没有就创建数据库再创建数据表
		$sql = "CREATE TABLE IF NOT EXISTS message (
				`id` int(11) NOT NULL AUTO_INCREMENT,
				`username` varchar(25) NOT NULL,
				`content` text NOT NULL,
				`lastdate` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
				PRIMARY KEY (`id`)
				)";
		mysqli_query($con,$sql);//如果表存在就不再创建
	}else{
		mysqli_query($con,"CREATE DATABASE message_board");
		mysqli_select_db($con,'message_board');
		$sql = "CREATE TABLE message (
				`id` int(11) NOT NULL AUTO_INCREMENT,
				`username` varchar(25) NOT NULL,
				`content` text NOT NULL,
				`lastdate` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
				PRIMARY KEY (`id`)
				)";
		mysqli_query($con,$sql);
	}
	mysqli_query($con,'set names utf-8');
	//mysqli_close($con);
?>