<?php
include '../config.php';

//获取前端传值-----------------------------------------------------------------------------------
if( !empty($_GET['g_title']) && !empty($_GET['g_detele'])) {
        //delete
        deletegg ($conn);
}

//逻辑调用-----------------------------------------------------------------------------------
if( !empty($_GET['ggallList'])) {
	ggList ($conn);
}
// 单个查询
if( !empty($_GET['checkone']) && !empty($_GET['g_title'])) {
	ggDetail ($conn);
}
if( !empty($_GET['g_title']) && !empty($_GET['g_detail']) && !empty($_GET['add']) && $_GET['add'] == "add") {
	addgg($conn);
};
if( !empty($_GET['change_gg']) && !empty($_GET['change_gg'])) {
	changegg($conn);
};
//逻辑编写函数-----------------------------------------------------------------------------------


//查询公告
function ggList ($conn){
	$sql = "SELECT * FROM gonggao";
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
//查询单个公告
function ggDetail ($conn){
	$sql = "SELECT * FROM gonggao WHERE g_title='{$_GET['g_title']}'";
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

//添加公告
function addgg($conn){
    $sql = "INSERT INTO gonggao (g_title,g_detail,g_id)
    VALUES ('{$_GET['g_title']}','{$_GET['g_detail']}','{$_GET['g_id']}')";
        
    if ($conn->query($sql) === TRUE) {
        echo json_encode(array(
			"resultCode"=>200,
			"message"=>"添加成功",
			"data"=>[]
		),JSON_UNESCAPED_UNICODE);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }	
	
}

 // 删除公告
 function deletegg ($conn){
    // mysqli_query($conn,"DELETE FROM car WHERE id='{$_GET['pid']}'");
    $sql = "DELETE FROM gonggao WHERE g_title='{$_GET['g_title']}'";
    $result = $conn->query($sql);
    if ($conn->query($sql) === TRUE) {
		echo json_encode(array(
			"resultCode"=>200,
			"message"=>"删除成功",
			"data"=>[]
		),JSON_UNESCAPED_UNICODE);
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
    
}
function changegg($conn){
	$sql2 = "UPDATE gonggao SET g_title = '{$_GET['g_title']}',g_detail = '{$_GET['g_detail']}' WHERE g_title = '{$_GET['g_old_title']}'";
	$result = $conn->query($sql2);
	echo json_encode(array(
		"resultCode"=>200,
		"message"=>"修改成功",
		"data"=>[]
	),JSON_UNESCAPED_UNICODE);
}
$conn->close();
?>