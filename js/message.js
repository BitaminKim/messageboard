
	var request; 
	var username; 
	var contentmes; 
	var lastdate=createDatetime();
	
	function createDatetime() {
		time=new Date();
		Y=time.getFullYear();
		M=time.getMonth()+1;
		D=time.getDate();
		H=time.getHours();
		min=time.getMinutes()>9?time.getMinutes().toString():'0' + time.getMinutes();;
		S=time.getSeconds()>9?time.getSeconds().toString():'0' + time.getSeconds();
		var date=Y+"-"+M+"-"+D+" "+H+":"+min+":"+S;
		return date;
	}

	function createXmlHttp() {
		if(window.XMLHttpRequest){
		  request = new XMLHttpRequest();//IE7\Firefox\Chrome\Opera\Safari...
		}else{
		  request = new ActiveXObject("microsoft.XMLHTTP");//IE5\IE6
		}
	}
	function successPost() {
		username = document.getElementById("username").value; 
		contentmes = document.getElementById("contentmes").value; 
		if (checkForm()) {   
			createXmlHttp();   //创建XMLHttpRequest对象
			request.onreadystatechange = function () {
			  if(request.readyState===4 && request.status===200){//响应正确，获取信息
				createNewPost(request.responseText);
			  }
			}    //设置回调函数
			request.open("POST", "post.php", true);    //发送POST请求 
			request.setRequestHeader("Content-type","application/x-www-form-urlencoded"); 
			request.send("username=" + encodeURI(username) + 
						 "&contentmes=" + encodeURI(contentmes)); 

		} 
	}
	function checkForm() { 
		if (username == "") { 
			alert("请填写用户名!"); 
			return false; 
		}else if (contentmes == "") { 
			alert("请填写内容"); 
			return false; 
		}else{
			return true; 
		}
	}
	function createNewPost(postId) { 
		var postPid=parseInt(postId.trim());//去掉数据库拿来的id的前面空格并且转换为整数类型
		document.getElementById("contentmes").value = ""; //清空输入栏
		document.getElementById("username").value = ""; 
		var postDiv = createDiv("post", "");    //创建回帖的外层div 
		postDiv.id = 'post'+postPid;           //给新div赋id值 
	 
		var postTitleDiv = createDiv("id", "<p>留言编号："+postPid+" 用户名："+username+" 留言时间："+lastdate+"</p>");  //创建标题div 
		var postContentDiv = createDiv("contentmes", "<pre>" + contentmes + "</pre>");    //创建内容div 
		postDiv.appendChild(postTitleDiv);                          //在外层div追加标题 
		postDiv.appendChild(postContentDiv);                        //在外层div追加内容 
		var addchild = document.getElementById('post'+(postPid-1)); //创建一个插入前一个id指针
		if(postPid>1){
			document.getElementById("content").insertBefore(postDiv,addchild);     //将外层div追加到主题div中 ，如果大于两记录就插入在前一id的记录
		}else{
			addchild = document.getElementById("pagecount");
			document.getElementById("content").insertBefore(postDiv,addchild);
		}
	}
	 
	//根据className和text创建新的div 
	function createDiv(className, text) { 
		var newDiv = document.createElement("div"); 
		newDiv.className = className; 
		newDiv.innerHTML = text; 
		return newDiv; 
	} 