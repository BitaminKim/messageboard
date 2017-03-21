<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>留言板</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css">
		#container{width:100%}
        #left {width:50%;float: left;}
        #content {width:45%;float: left;}
	</style>
</head>
<body background="img/back-ground.jpg">
  <form class="form-horizontal">
    <fieldset>
	<div id="container">
      <div id="legend" class="">
        <legend id="board" class="board" align="center">留言板</legend>
      </div>
	  <div id="left">
		<img src="img/backblock.png"  hspace="90px" align="center"/>
		<br>
		<br>

		<div class="control-group">
		  <!-- Text input-->
		  <label class="control-label" for="input01">用户名:</label>
		  <div class="controls">
			<input type="text" name="username" id="username" class="username" placeholder="这里输入您的用户名">
		  </div>
		</div>

		<div class="control-group">
		  <!-- Textarea -->
		  <label class="control-label">内容:</label>
		  <div class="controls">
			<div class="textarea">
			  <textarea type="text" name="contentmes" id="contentmes" class="contentmes" style="margin: 0px; width: 490px; height: 150px;"> </textarea>
			</div>
		  </div>
		</div>
		<div class="control-group">
		  <!-- Button -->
		  <label class="control-label"></label>
		  <div class="controls">
			<button class="btn btn-success" id="buttoncss" type="button" onclick="successPost()">提交</button>
		  </div>
		</div>
	  </div>


	  <div id="content">
		  <input type='hidden' id='current_page' />
		  <input type='hidden' id='show_per_page' />
		  <?php 
			include("db.php");
			$sql = "select * from `message` order by id desc"; 
			$query = mysqli_query($con,$sql);
			while($row=mysqli_fetch_array($query)){
		  ?> 
		  <div class="post" id="post<?php echo $row['id'];?>"> 
			<div class="id"><p align="left">留言编号：<?php echo $row['id'];?> 用户名：<?php echo $row['username'];?> 留言时间： <?php echo $row['lastdate'];?></p></div>
			<div class="contentmes" align="left"><pre><?php echo $row['content'];?></pre></div> 
		  </div> 
		  <?php 
			}
		  ?> 



		  <div id='page_navigation'></div><br>

	  </div>
	</div>
	</fieldset>
  </form>
  <script data-main="js/main" src="js/require.js"></script>
</body>
</html>
