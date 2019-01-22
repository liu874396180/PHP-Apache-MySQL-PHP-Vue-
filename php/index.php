<?php
include '../config.php';

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
	    echo json_encode(array(
            "resultCode"=>200,
            "message"=>"查询成功",
            "data"=>$array
        ),JSON_UNESCAPED_UNICODE);
	} else {
	    echo json_encode(array(
            "resultCode"=>200,
            "message"=>"无数据",
            "data"=>[]
        ),JSON_UNESCAPED_UNICODE);
	}
}
//登录
function login($conn){
	$sql = "SELECT * FROM user WHERE userName='{$_GET['userName']}' AND password='{$_GET['userPassword']}'";
	$result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result);
	if (!$row){
		echo json_encode(array(
            "resultCode"=>'0000',
            "message"=>"帐号或密码有误",
            "data"=>[]
        ),JSON_UNESCAPED_UNICODE);
	}else{
		echo json_encode(array(
            "resultCode"=>'200',
            "message"=>"登录成功",
            "data"=>$row
        ),JSON_UNESCAPED_UNICODE);
	}
}
//注册
function registered($conn){

	$sql = "SELECT * FROM user WHERE userName='{$_GET['userName']}'";
	$query = $conn->query($sql); 
	$row = mysqli_fetch_assoc($query);
	//echo $query?1:0; //php 无法输出布尔值
	 if($row){
	 	echo json_encode(array(
	        "resultCode"=>'0001',
	        "message"=>"此用户已存在",
	        "data"=>[]
	    ),JSON_UNESCAPED_UNICODE);
	 	return false;
	}
	$sql = "INSERT INTO user (userName, password,userId)
	VALUES ('{$_GET['userName']}', '{$_GET['userPassword']}','{$_GET['uuid']}')"; 
	if ($conn->query($sql) === TRUE) {
	    echo json_encode(array(
            "resultCode"=>200,
            "message"=>"注册成功！",
            "data"=>[]
        ),JSON_UNESCAPED_UNICODE);

	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

 
$conn->close();
?>