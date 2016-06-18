
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>留言板</title>
<link href="http://cdn.bootcss.com/twitter-bootstrap/2.0.4/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
		#container{width:100%}
        #left {height:344px;width:500px;float: left;}
        #content {float: right;}
</style>
</head>
<body background="\rem-background.jpg">
<?php
/*
 * Created on 2016年6月16日
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
?>
  <form class="form-horizontal">
    <fieldset>
	<div id="container">
      <div id="legend" class="">
        <legend class="" align="center">留言板</legend>
      </div>
	  <div id="left">
		<img src="\rem-img.jpg"  hspace="120px" alt="雷姆" width="500px"; height="344px" align="center"/>
		<br>
		<br>
		<br>
		<br>

		<div class="control-group">

			  <!-- Text input-->
			  <label class="control-label" for="input01">用户名:</label>
			  <div class="controls">
				<input type="text" placeholder="这里输入您的用户名" class="input-xlarge">
			  </div>
		</div>

		<div class="control-group">

			  <!-- Textarea -->
			  <label class="control-label">内容:</label>
			  <div class="controls">
				<div class="textarea">
					  <textarea type="text" class="Massage-board" style="margin: 0px; width: 450px; height: 150px;"> </textarea>
				</div>
			  </div>
		</div>

		<div class="control-group">
			  <label class="control-label"></label>

			  <!-- Button -->
			  <div class="controls">
				<button class="btn btn-success" style="width: 460px; height: 30px">提交</button>
			  </div>
		</div>

	  </div>
	  <div id="content">
		<img src="\rem-img.jpg"  hspace="120px" alt="雷姆" width="500px"; height="344px" align="center"/>
		<br>
		<br>
		<br>
		<br>

		<div class="control-group">

			  <!-- Text input-->
			  <label class="control-label" for="input01">用户名:</label>
			  <div class="controls">
				<input type="text" placeholder="这里输入您的用户名" class="input-xlarge">
			  </div>
		</div>

		<div class="control-group">

			  <!-- Textarea -->
			  <label class="control-label">内容:</label>
			  <div class="controls">
				<div class="textarea">
					  <textarea type="text" class="Massage-board" style="margin: 0px; width: 450px; height: 150px;"> </textarea>
				</div>
			  </div>
		</div>

		<div class="control-group">
			  <label class="control-label"></label>

			  <!-- Button -->
			  <div class="controls">
				<button class="btn btn-success" style="width: 460px; height: 30px">提交</button>
			  </div>
		</div>


	  </div>
	</div>
	</fieldset>
  </form>
</body>