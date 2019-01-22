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
?>