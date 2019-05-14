<?php
include '../config.php';

//获取前端传值-----------------------------------------------------------------------------------



//逻辑调用-----------------------------------------------------------------------------------
if( !empty($_GET['search']) && $_GET['search'] == 'search'){
	search($conn);
}
if(!empty($_GET['add']) && $_GET['add'] == 'add'){
	add($conn);
}
if(!empty($_GET['depj']) && $_GET['depj'] == 'depj'){
	depj($conn);
}
//逻辑编写函数-----------------------------------------------------------------------------------


//查询所有
function search ($conn){
	$sql = "SELECT * FROM pingjia WHERE productId='{$_GET['productId']}'";
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

function add($conn){
	$sql = "INSERT INTO pingjia (userName, pingJiaText,pingJiaDate,productId,p_id)
	VALUES ('{$_GET['userName']}', '{$_GET['pingJiaText']}','{$_GET['pingJiaDate']}','{$_GET['productId']}','{$_GET['p_id']}')"; 
	if ($conn->query($sql) === TRUE) {
	    echo json_encode(array(
            "resultCode"=>200,
            "message"=>"评论成功",
            "data"=>[]
        ),JSON_UNESCAPED_UNICODE);

	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
 //删除
function depj ($conn){
    // mysqli_query($conn,"DELETE FROM car WHERE id='{$_GET['pid']}'");
    $sql = "DELETE FROM pingjia WHERE p_id='{$_GET['p_id']}'";
    $result = $conn->query($sql);
    echo json_encode(array(
		"resultCode"=>200,
		"message"=>"删除成功",
		"data"=>[]
	),JSON_UNESCAPED_UNICODE);
    
}
$conn->close();
?>