
//添加cookie
//功能：添加cookie
//参数：
//键
//值
//有效期（单位是天）

function addCookie(key,value,dayCount) {
	//1、定义日期
	var d = new Date();
	d.setDate(d.getDate()+dayCount);
	//2、保存cookie
	document.cookie = key+"="+escape(value)+";expires="+d.toGMTString();
}

//获取cookie
//参数：
//键
//返回值：键对应的值

function getCookie(key){//username=baobao; userpass=123456

	//1、获取所有的cookie
	var str = unescape(document.cookie);

	//2、用“; ”分割成数组
	var arr = str.split("; ");//["username=baobao","userpass=123456"];

	//3、循环查找
	for(var i in arr){
		if(arr[i].indexOf(key+"=")==0){
			return arr[i].split("=")[1];
		}
	}

	return null;
}

//删除cookie; cookie没法直接删除，但是可以设置失效时间为过去。
//参数：
//键

function removeCookie(key){
	/*
	//1、定义日期
	var d = new Date();
	d.setDate(d.getDate()-1);
	//2、保存cookie
	document.cookie = key+"=byebye;expires="+d.toGMTString();
	*/
	addCookie(key,"byebye",-1);
}

// function changeCookie(key,value,dayCount) {
// 	addCookie(key,value,dayCount);
// }