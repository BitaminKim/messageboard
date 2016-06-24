<?php 

include_once('db.php'); //连接数据库，略过，具体请下载源码查看 
 
$page = intval($_POST['pageNum']); //当前页 
 
$result = mysqli_query($con,"select id from message"); 
$total = mysqli_num_rows($con,$result);//总记录数 
$pageSize = 6; //每页显示数 
$totalPage = ceil($total/$pageSize); //总页数 
 
$startPage = $page*$pageSize; //开始记录 
//构造数组 
$arr['total'] = $total; 
$arr['pageSize'] = $pageSize; 
$arr['totalPage'] = $totalPage; 
$query = mysqli_query($con,"select id,username,content from message order by id desc limit  
$startPage,$pageSize"); //查询分页数据 
while($row=mysqli_fetch_array($query)){ 
     $arr['list'][] = array( 
         'id' => $row['id'], 
        'username' => $row['username'], 
        'content' => $row['content'], 
     ); 
} 
echo json_encode($arr); //输出JSON数据 

?>