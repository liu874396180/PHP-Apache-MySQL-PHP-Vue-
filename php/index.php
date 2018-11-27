<?php
	// 设置返回json格式数据
header('content-type:application/json;charset=utf8');
$servername = "localhost";   //服务名称 本地
$username = "root";          //用户名称root
$password = "";				// 原始数据库密码是空
$dbname = "test";
// 创建连接
$conn = new mysqli($servername, $username, $password,$dbname);
mysqli_query($conn,'set names utf8');//解决数据库中有汉字时显示在前台出现乱码问题
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
//echo "连接成功";

//获取前端传值-----------------------------------------------------------------------------------
//if( !empty($_GET['searchall']) ) $searchall = $_GET['searchall']; // 首页全部查询
if( !empty($_GET['userName']) ) $userName = $_GET['userName'];
if( !empty($_GET['userPassword']) ) $userPassword = $_GET['userPassword'];
if( !empty($_GET['registered']) ) $registered = $_GET['registered'];


//逻辑调用-----------------------------------------------------------------------------------
if(!empty($_GET['searchall']) && $_GET['searchall'] == 'searchall'){
	searchall($conn);
}

if(!empty($_GET['userName']) && !empty($_GET['userPassword']) && empty($_GET['registered'])){
//	登录
login($conn);
}
if(!empty($_GET['userName']) && !empty($_GET['userPassword']) && !empty($_GET['registered'])){
//	注册
registered($conn);
}



//逻辑编写函数-----------------------------------------------------------------------------------


//查询所有
function searchall ($conn){
	$sql = "SELECT * FROM productlist";
	$result = $conn->query($sql);
	$array = array();
	if ($result->num_rows > 0) {
	    // 输出数据
	    while($row = $result->fetch_assoc()) {
	    	$array[] = $row;
	    }
	    echo json_encode($array);
	} else {
	    echo "0 结果";
	}
}
//登录
function login($conn){
	$sql = "SELECT * FROM user WHERE userName='{$_GET['userName']}' AND password='{$_GET['userPassword']}'";
	$result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result);
//	if ($row < 1){
//		echo "000";
//	}else{
//		echo json_encode($row);
//	}
echo json_encode($row);
}
//注册
function registered($conn){
//	if(){
//		
//	}
	$sql = "INSERT INTO user (userName, password,userId)
	VALUES ('{$_GET['userName']}', '{$_GET['userPassword']}','{$_GET['uuid']}')";
	   
	if ($conn->query($sql) === TRUE) {
	    echo "注册成功";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

 
$conn->close();
?>