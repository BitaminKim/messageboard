<?php  
include('db.php');  
$page = $_POST["pageNum"];
  
$result = mysqli_query($con,"select * from massage");  
$total = mysqli_num_rows($result);//总记录数  
  
$pageSize = 8; //每页显示数  
$totalPage = ceil($total/$pageSize); //总页数  
  
$startPage = $page*$pageSize;  
$arr['total'] = $total;  
$arr['pageSize'] = $pageSize;  
$arr['totalPage'] = $totalPage;  
$query = mysqli_query("select * from 'message' order by id desc limit $startPage,$pageSize");  
while($row=mysqli_fetch_array($query)){  
$arr['content'][] = array(  
'id' => $row['id'],  
'username' => $row['username'],  
'content' => $row['content'],
'lastdate' => $row['lastdate'],
);  
}  
//print_r($arr);  
echo json_encode($arr);  
?>   