<?php 
include("db.php");
$username = $_POST["username"]; //获取username 
$content = $_POST["contentmes"]; //获取content 
 
$sql="insert into message (username,content,lastdate) " . 
    "values ('$username','$content',NOW())"; 
 mysqli_query($con,$sql); 
  //传回最后一次使用 INSERT 指令的 ID 
$responseId=mysqli_insert_id($con); 
echo $responseId; 
?> 