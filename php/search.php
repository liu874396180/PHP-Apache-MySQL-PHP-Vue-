<?php
include '../config.php';

//获取前端传值-----------------------------------------------------------------------------------



//逻辑调用-----------------------------------------------------------------------------------
if(!empty($_GET['p_class']) && $_GET['search'] == 'search'){
	search($conn);
}


//逻辑编写函数-----------------------------------------------------------------------------------


//查询所有
function search ($conn){
	$sql = "SELECT * FROM productlist WHERE p_class='{$_GET['p_class']}'";
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


 
$conn->close();
?>