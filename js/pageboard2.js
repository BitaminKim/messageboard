
define(["jquery"],function ($) {

	
	var nowPage = 1; //当前页码  
	var total,pageSize,totalPage;  
	function getData(page){
		$.ajax({
			type: 'POST',
			url: 'pagepost.php',
			data: {'pageNum':page-1},
			dataTYpe:'json',
			beforeSend:function(){
				$("#content div").append("<p id='loding'>loding......</p>");
			},
			success:function(json){
				$("#content div").empty();
				total = json.total;//总留言
				pageSize = json.pageSize;//每页显示的留言数
				nowPage = page;//当前的页面
				totalPage = json.totalPage;//总页数
				var div ="";
				var content = json.content;
				$.each(content,function(index,array){//遍历json数据列表
					div += "<div class='post' id='"+array['id']+"'><div class='id'><p align='left'>留言编号："+array['id']+" 用户名："+array['username']+" 留言时间： "+array['lastdate']+"</p></div><div class='contentmes' align='left'><pre>"+array['content']+"</pre></div></div>";
				});
				$("#content div").append(div);  
			},  
			complete:function(){ //生成分页条  
			getPageBar();  
			},  
			error:function(){  
			alert("数据加载失败");  
			}  
		});  
	}

	function getPageBar(){
		if(nowPage>totalPage){
			nowPage = totalPage
		}
		if(nowPage < 1){
			nowPage = 1;
		}
		pageStr="<span>共"+total+"条</span><span>"+nowPage+"/"+totalPage+"</span>";
		
		if(nowPage == 1){
			pageStr += "<ul><li>首页</li><li>上一页</li>";
		}else{
			pageStr += "<ul><li><a href='javascript:void(0)' rel='1'>首页</a></li><li><a href='javascript:void(0)' rel='"+(nowPage-1)+"'>上一页</a></li>";
		}

		if(nowPage >=totalPage){
			pageStr += "<li>下一页</li><li>尾页</li><ul>";
		}else{
			pageStr += "<li><a href='javascript:void(0)' rel='"+(parseInt(nowPage)+1)+"'>下一页</a></li><li><a href='javascript:void(0)' rel='"+totalPage+"'>尾页</a></li><ul>";
		}
		$("#pagecount").html(pageStr); 
	}
	
	$(document).ready(function(){
		getData(1);  
		$("#pagecount li a").live("click",function(){  
			var rel = $(this).attr("rel");  
				if(rel){  
					getData(rel);  
				}  
		});  
	});

});