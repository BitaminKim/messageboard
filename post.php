<?php 
include("db.php");
$username = $_POST["username"]; //��ȡusername 
$content = $_POST["contentmes"]; //��ȡcontent 
 
$sql="insert into message (username,content,lastdate) " . 
    "values ('$username','$content',NOW())"; 
 mysqli_query($con,$sql); 
  //�������һ��ʹ�� INSERT ָ��� ID 
$responseId=mysqli_insert_id($con); 
echo $responseId; 
?> 