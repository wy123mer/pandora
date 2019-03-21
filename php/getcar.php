<?php
	header("Content-Type:text/html;charset=utf-8");
	$useremail   = $_GET['useremail'];
	
	//2、数据保存在数据	库中
	//1）、建立连接（搭桥）
	$conn = mysql_connect("localhost","root","root");
	
	//2）、选择数据库（找目的地）
	if(!mysql_select_db("mydb2019",$conn)){
		die("数据库选择失败".mysql_error());
	};
	
	//3）、传输数据（过桥）
	$sqlstr = "select * from goodscar where useremail = '".$useremail."'";
	// echo $sqlstr;
	$result = mysql_query($sqlstr,$conn);//执行查询的sql语句后，有返回值，返回的是查询结果
		
	if(!$result){
		die("SQL语句执行失败".mysql_error());
	}
			
	//查询列数
	 $query_cols = mysql_num_fields($result);
	 //echo "列数：".$query_cols;
	//查询行数
    $query_num =mysql_num_rows($result);
    //echo "行数：".$query_num;
	
	$str="[";
	
	$query_row = mysql_fetch_array($result);//游标下移,拿出结果集中的某一行，返回值是拿到的行；
	while($query_row){
		$str = $str.'{
		"goodsid":"'.$query_row[0].'",
		"useremail":"'.$query_row[1].'",	
		"goodsname":"'.$query_row[2].'",
		"beiyong5":"'.$query_row[3].'",
		"goodsbaoshi":"'.$query_row[4].'",
		"goodsprice":"'.$query_row[5].'",
		"beiyong3":"'.$query_row[6].'",
		"goodsimg":"'.$query_row[7].'",
		"goodscolor":"'.$query_row[8].'",
		"goodscount":"'.$query_row[9].'"
		}';	
		
		
		$query_row = mysql_fetch_array($result);
		if($query_row){
			$str = $str.",";
		}
	}
	$str = $str."]";
	//4、关闭数据库
	mysql_close($conn);
	
	//3、给客户端返回商品的json数组！
	echo $str;
?>