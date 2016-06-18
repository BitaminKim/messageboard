
define(["jquery","message"],function ($,message) {
	var nowPage = 1; //当前页码  
	var total,pageSize,totalPage; 
	function getData(page) {  
			createXmlHttp()
			request.onreadystatechange = function () {
			  if(request.readyState===4 && request.status===200){//响应正确，获取信息
				success(request.responseText);
			  }
			}    //设置回调函数
			request.open("POST", "pagepost.php", true);    //发送POST请求 
			request.setRequestHeader("Content-type","application/json"); 
			request.send("pageNum=" + encodeURI(page-1)); 

	}
	function createXmlHttp() {
		if(window.XMLHttpRequest){
		  request = new XMLHttpRequest();//IE7\Firefox\Chrome\Opera\Safari...
		}else{
		  request = new ActiveXObject("microsoft.XMLHTTP");//IE5\IE6
		}
	}
	function success(json){
		total = json.total;//总留言
		pageSize = json.pageSize;//每页显示的留言数
		nowPage = json.page;//当前的页面
		totalPage = json.totalPage;//总页数
		var div ="";
		var content = json.content;
		$.each(content,function(index,array){
			div = message.createDiv("post", "<div class='id'><p align='left'>留言编号："+array['id']+" 用户名："+array['username']+" 留言时间： "+array['lastdate']+"</p></div><div class='contentmes' align='left'><pre>"+array['content']+"</pre></div>"); 
		});
		$("#content div").append(div);
		document.getElementById("content").insertBefore(div);
		getPageBar(); 
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