<?php
include '../config.php';

//获取前端传值-----------------------------------------------------------------------------------
//if( !empty($_GET['searchall']) ) $searchall = $_GET['searchall']; // 首页全部查询
if( !empty($_GET['userName']) ) $userName = $_GET['userName'];
if( !empty($_GET['userPassword']) ) $userPassword = $_GET['userPassword'];
if( !empty($_GET['registered']) ) $registered = $_GET['registered'];


//逻辑调用-----------------------------------------------------------------------------------
// 查询全部
if(!empty($_GET['searchall']) && $_GET['searchall'] == 'searchall'){
	searchall($conn);
}
// 排序--升序
if(!empty($_GET['orderBy']) && $_GET['paixu'] == 'paixu' && empty($_GET['jiangxu'])){
	orderBy($conn);
}
// 排序降序
if(!empty($_GET['orderBy']) && $_GET['paixu'] == 'paixu' && !empty($_GET['jiangxu'])){
	orderBy2($conn);
}
// 搜索
if(!empty($_GET['searchVal']) && $_GET['searchName'] == 'searchName'){
	searchName($conn);
}
if(!empty($_GET['userName']) && !empty($_GET['userPassword']) && empty($_GET['registered'])){
//	登录
login($conn);
}
///// 超级管理
if(!empty($_GET['userId']) && !empty($_GET['searchSuper']) && $_GET['searchSuper'] == "searchSuper"){
	//	sas 超级管理
superInfo($conn);
}
if(!empty($_GET['userId']) && !empty($_GET['setSuper']) && $_GET['setSuper'] == "setSuper"){
	//	sas 超级管理
	superSet($conn);
}

if(!empty($_GET['userName']) && !empty($_GET['userPassword']) && !empty($_GET['registered'])){
//	注册
registered($conn);
}
// 修改用户名
if(!empty($_GET['userName']) && !empty($_GET['userId']) && !empty($_GET['changeName']) && $_GET['changeName'] == "changeName"){
	
changeName($conn);
}
// 修改用户名
if(!empty($_GET['password']) && !empty($_GET['userId']) && !empty($_GET['changePassword']) && $_GET['changePassword'] == "changePassword"){
	
	changePassword($conn);
}
// 新增收货地址
if(!empty($_GET['userAddress']) && !empty($_GET['userPhone']) && !empty($_GET['getUserName']) && !empty($_GET['userId']) && !empty($_GET['addUserAddress']) && $_GET['addUserAddress'] == "addUserAddress"){
	
	addUserAddress($conn);
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
// 排序--升序
function orderBy ($conn){
	$arg = $_GET['orderBy'];
	$sql = "SELECT * FROM productlist ORDER BY $arg";
	$result = $conn->query($sql);
	$array = array();
	if ($result->num_rows > 0) {
	    // 输出数据
	    while($row = $result->fetch_assoc()) {
	    	$array[] = $row;
	    }
	    echo json_encode(array(
            "resultCode"=>200,
            "message"=>"价格排序成功",
            "data"=>$array
        ),JSON_UNESCAPED_UNICODE);
	} else {
	    echo json_encode(array(
            "resultCode"=>200,
            "message"=>"价格排序失败",
            "data"=>[]
        ),JSON_UNESCAPED_UNICODE);
	}
}
// 排序--降序
function orderBy2 ($conn){
	$arg = $_GET['orderBy'];
	$sql = "SELECT * FROM productlist ORDER BY $arg DESC";
	$result = $conn->query($sql);
	$array = array();
	if ($result->num_rows > 0) {
	    // 输出数据
	    while($row = $result->fetch_assoc()) {
	    	$array[] = $row;
	    }
	    echo json_encode(array(
            "resultCode"=>200,
            "message"=>"价格排序成功",
            "data"=>$array
        ),JSON_UNESCAPED_UNICODE);
	} else {
	    echo json_encode(array(
            "resultCode"=>200,
            "message"=>"价格排序失败",
            "data"=>[]
        ),JSON_UNESCAPED_UNICODE);
	}
}
// 搜索
function searchName ($conn){
	$sql = "SELECT * FROM productlist WHERE name like '%".$_GET['searchVal']."%'";
	$result = $conn->query($sql);
	$array = array();
	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	    	$array[] = $row;
	    }
	    echo json_encode(array(
            "resultCode"=>200,
            "message"=>"搜索成功",
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
//修改用户名
function changeName($conn){

	$sql = "SELECT * FROM user WHERE userName ='{$_GET['userName']}'";
	$query = $conn->query($sql); 
	$row = mysqli_fetch_assoc($query);
	//echo $query?1:0; //php 无法输出布尔值
	 if($row){
	 	echo json_encode(array(
	        "resultCode"=>'0001',
	        "message"=>"此用户名已存在",
	        "data"=>[]
	    ),JSON_UNESCAPED_UNICODE);
	 	return false;
	}
	$sql2 = "UPDATE user SET userName='{$_GET['userName']}' WHERE userId = '{$_GET['userId']}'"; 
	if ($conn->query($sql2) === TRUE) {
	    echo json_encode(array(
            "resultCode"=>200,
            "message"=>"修改用户名成功！",
            "data"=>[]
        ),JSON_UNESCAPED_UNICODE);

	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
//修改密码
function changePassword($conn){
	$sql2 = "UPDATE user SET password='{$_GET['password']}' WHERE userId = '{$_GET['userId']}'"; 
	if ($conn->query($sql2) === TRUE) {
	    echo json_encode(array(
            "resultCode"=>200,
            "message"=>"修改用户名成功！",
            "data"=>[]
        ),JSON_UNESCAPED_UNICODE);

	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
//新增收货地址
function addUserAddress($conn){
	if($_GET['type'] == "change"){
		$sql2 = "UPDATE useraddress SET userAddress='{$_GET['userAddress']}' , getUserName='{$_GET['getUserName']}' , userPhone='{$_GET['userPhone']}' WHERE dataid='{$_GET['dataid']}'"; 
		$query = $conn->query($sql2); 
		if ($conn->query($sql2) === TRUE) {
			echo json_encode(array(
				"resultCode"=>200,
				"message"=>"修改地址成功！",
				"data"=>[]
			),JSON_UNESCAPED_UNICODE);

		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		return false;
	}
	$sql = "SELECT * FROM useraddress WHERE userAddress='{$_GET['userAddress']}' AND  getUserName='{$_GET['getUserName']}' AND  userPhone='{$_GET['userPhone']}' ";
	$query = $conn->query($sql); 
	$row = mysqli_fetch_assoc($query);
	//echo $query?1:0; //php 无法输出布尔值
	 if($row){
	 	echo json_encode(array(
	        "resultCode"=>'0001',
	        "message"=>"此地址已存在",
	        "data"=>[]
	    ),JSON_UNESCAPED_UNICODE);
	 	return false;
	}
	$sql = "INSERT INTO useraddress (userAddress,getUserName,userPhone,userId,dataid)
	VALUES ('{$_GET['userAddress']}','{$_GET['getUserName']}','{$_GET['userPhone']}','{$_GET['userId']}','{$_GET['dataid']}')"; 
	if ($conn->query($sql) === TRUE) {
	    echo json_encode(array(
            "resultCode"=>200,
            "message"=>"新增成功！",
            "data"=>[]
        ),JSON_UNESCAPED_UNICODE);

	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
function superInfo($conn){
	$sql = "SELECT * FROM user WHERE userId='admin'";
	$result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result);
	if (!$row){
		echo json_encode(array(
            "resultCode"=>'0000',
            "message"=>"查询成功",
            "data"=>$row
        ),JSON_UNESCAPED_UNICODE);
	}else{
		echo json_encode(array(
            "resultCode"=>'200',
            "message"=>"查询成功",
            "data"=>$row
        ),JSON_UNESCAPED_UNICODE);
	}
}
function superSet($conn){
	$sql2 = "UPDATE user SET userName='{$_GET['userName']}', password='{$_GET['password']}' WHERE userId = 'admin'"; 
	if ($conn->query($sql2) === TRUE) {
	    echo json_encode(array(
            "resultCode"=>200,
            "message"=>"修改成功！",
            "data"=>[]
        ),JSON_UNESCAPED_UNICODE);

	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
$conn->close();
?>