
<?php
	header("Content-type: text/html; charset=utf-8");
	$con  = mysqli_connect('localhost','root','root');
	if($con){
		echo "连接成功";
	}else{
		echo "连接失败";
	}//连接数据库,连接失败会返回false
		if(mysqli_select_db($con,'message_board')){//如果有数据库就直接使用创建表格插入数据，如果没有就创建数据库
			$sql = "CREATE TABLE message (
					`id` int(11) NOT NULL AUTO_INCREMENT,
					`username` varchar(25) NOT NULL,
					`content` tinytext NOT NULL,
					`lastdate` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
					PRIMARY KEY (`id`)
					)";
			if(mysqli_query($con,$sql)){
					$sql1 = "INSERT INTO message (username, content, lastdate) VALUES ('abc', '123', NOW()),
					('abc', '123', NOW()),
					('kim', '123', NOW()),
					('kim', '123', NOW()),
					('ping', '123', NOW()),
					('east', '123', NOW()),
					('bitamin', '123', NOW()),
					('kimBitamin', '123', NOW())";
					mysqli_query($con,$sql1);
			}
			
		}else{
			mysqli_query($con,"CREATE DATABASE message_board");
			mysqli_select_db($con,'message_board');
			$sql = "CREATE TABLE message (
					`id` int(11) NOT NULL AUTO_INCREMENT,
					`username` varchar(25) NOT NULL,
					`content` tinytext NOT NULL,
					`lastdate` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
					PRIMARY KEY (`id`)
					)";
			if(mysqli_query($con,$sql)){
					$sql1 = "INSERT INTO message (username, content, lastdate) VALUES ('abc', '123', NOW()),
					('abc', '123', NOW()),
					('kim', '123', NOW()),
					('kim', '123', NOW()),
					('ping', '123', NOW()),
					('east', '123', NOW()),
					('bitamin', '123', NOW()),
					('kimBitamin', '123', NOW())";
					mysqli_query($con,$sql1);
			}
		}
	mysqli_query($con,'set names utf-8');
	
	//mysqli_query($con,'insert into message(username) values("kimBitamin")');
	$query = mysqli_query($con,'select * from message');
	while($row=mysqli_fetch_row($query)){
		print_r($row);
	}
	mysqli_close($con);
?>