<?php
include '../config.php';

//获取前端传值-----------------------------------------------------------------------------------
//if( !empty($_GET['searchall']) ) $searchall = $_GET['searchall']; // 首页全部查询
if( !empty($_GET['pid']) && !empty($_GET['del'])){
    //delete
    deleteP ($conn);
}


//逻辑调用-----------------------------------------------------------------------------------

if(!empty($_GET['userId']) && empty($_GET['del']) ) {
	products_car ($conn);
};
//逻辑编写函数-----------------------------------------------------------------------------------


//查询所有
function products_car ($conn){
	$sql = "SELECT * FROM my_order WHERE userId='{$_GET['userId']}'";
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
            "message"=>"查询成功",
            "data"=>$array
        ),JSON_UNESCAPED_UNICODE);
	}
}

//删除
function deleteP ($conn){
    // mysqli_query($conn,"DELETE FROM car WHERE id='{$_GET['pid']}'");
    $sql = "DELETE FROM my_order WHERE id='{$_GET['pid']}'";
    $result = $conn->query($sql);
    echo json_encode(array(
		"resultCode"=>200,
		"message"=>"删除成功",
		"data"=>[]
	),JSON_UNESCAPED_UNICODE);
    
}

 
$conn->close();
?>