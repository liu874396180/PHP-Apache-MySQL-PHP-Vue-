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
if( !empty($_GET['pid']) ) $userName = $_GET['pid'];


//逻辑调用-----------------------------------------------------------------------------------
products ($conn);

if( !empty($_GET['pid']) && !empty($_GET['userId']) ) {
	addCar($conn);
};
//逻辑编写函数-----------------------------------------------------------------------------------


//查询所有
function products ($conn){
	$sql = "SELECT * FROM productlist WHERE id='{$_GET['pid']}'";
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

//添加购物车
function addCar($conn){
	// $sql="SELECT * FROM car WHERE id='{$_GET['pid']}'";
	//$sql="SELECT * FROM car WHERE id=555";
	//$rst = mysql_query($sql);
	// $row = mysql_num_rows($sql);
	// $arr = mysql_fetch_assoc($sql);
	//echo $rst ;
	// if($rst == false){
	// 	// echo "添加成功";
	// 	$sql = "INSERT INTO car (userId, id,name,price,jianJie,img)
	// 	VALUES ('{$_GET['userId']}', '{$_GET['pid']}','{$_GET['name']}','{$_GET['price']}','{$_GET['jianJie']}','{$_GET['img']}')";  
	// 	if ($conn->query($sql) === TRUE) {
	// 	    echo "添加成功";
	// 	} else {
	// 	    echo "Error: " . $sql . "<br>" . $conn->error;
	// 	}
	// }else{
	// 	echo "购物车已存在";
	// }



	// $sql = "SELECT * FROM car WHERE id='{$_GET['pid']}'";
	// $result = $conn->query($sql);
	// $row = mysqli_fetch_assoc($result);
	// if($conn->query($sql) == TRUE){
	// 	echo "重复添加";

	// 	return false;
	// }else{
	// 	echo "添加成功";
		$sql = "INSERT INTO car (userId, id,name,price,jianJie,img)
		VALUES ('{$_GET['userId']}', '{$_GET['pid']}','{$_GET['name']}','{$_GET['price']}','{$_GET['jianJie']}','{$_GET['img']}')";
		   
		if ($conn->query($sql) === TRUE) {
		    echo "添加成功";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	// }
	
	
}

 
$conn->close();
?>