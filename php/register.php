<?php

	header("Content_type:text/html;charset=utf-8");

	$usermin=$_POST['usermin'];
	$usernames=$_POST['usernames'];
	$userbirthday=$_POST['userbirthday'];
	$userphone=$_POST['userphone'];
	$useremail=$_POST['useremail'];
	$userpass=$_POST['userpass'];

	//连接数据库
	$conn=mysql_connect('localhost','root','root');

	if(!$conn){
		echo "数据库连接失败";
	}else{
		mysql_select_db('mydb2019',$conn);
		$sqlstr = "select * from user where useremail='$useremail'";
		$result = mysql_query($sqlstr,$conn);
		if(mysql_num_rows($result)>0){
			echo "0";
		}else{
			$sql="insert into user(usermin,usernames,userbirthday,userphone,useremail,userpass)values('$usermin','$usernames','$userbirthday','$userphone','$useremail','$userpass')";
			$result2=mysql_query($sql,$conn);
			mysql_close($conn);
	 		if($result2==1){
		  		echo "1";
		  	}else{
		  		echo "0";
		  	}
		}	
	}


?>