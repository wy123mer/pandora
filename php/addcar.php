<?php
	//添加到购物车
	header("Content-Type:text/html;charset=utf-8");
	//1、接受客户端的数据（用户输入的数据）
	$goodsid=$_GET['goodsid'];
	$useremail=$_GET['useremail'];
    $goodsname= $_GET['goodsname'];
    $beiyong2= $_GET['beiyong2'];
    $goodsbaoshi= $_GET['goodsbaoshi'];
    $goodsprice= $_GET['goodsprice'];
    $beiyong3= $_GET['beiyong3'];
    $goodsimg= $_GET['goodsimg'];
    $goodscolor= $_GET['goodscolor'];
    $goodscount= $_GET['goodscount'];
	
	//2、数据保存在数据库中
	//1）、建立连接（搭桥）
	$conn = mysql_connect("localhost","root","root");
	
	//2）、选择数据库（找目的地）
	if(!mysql_select_db("mydb2019",$conn)){
		die("数据库选择失败".mysql_error());
	};
	
	//3）、传输数据（过桥）
	$sqlstr="select * from goodscar where useremail='".$useremail."' and goodsname='".$goodsname."'";
	$result = mysql_query($sqlstr,$conn);
	//3.1)先查找该商品是否在购物车中存在
	if(mysql_num_rows($result)>0){
		//如果存在，则使用update语句
		$sqlstr = "update goodscar set goodscount=goodscount+".$goodscount." where useremail='".$useremail."'and goodsname='".$goodsname."'";
	}else{
		//如果不存在，则使用insert语句	
		$sqlstr = "insert into goodscar values('".$goodsid."','".$useremail."','".$goodsname."','".$beiyong2."','".$goodsbaoshi."','".$goodsprice."','".$beiyong3."','".$goodsimg."','".$goodscolor."','".$goodscount."')";	
	}
	
	$result=mysql_query($sqlstr,$conn);	
	//4）、关闭连接（拆桥）
	mysql_close($conn);
	
	if(!$result){
		die("添加失败".mysql_error());
	}	
	
	//3、给客户端返回（响应） 1：表示添加成功 0：表示添加失败
	if($result>0){
		echo 1;	
	}else{
		echo 0;
	}
?>