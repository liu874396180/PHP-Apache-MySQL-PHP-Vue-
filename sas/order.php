<?php
include '../config.php';

//获取前端传值-----------------------------------------------------------------------------------


//逻辑调用-----------------------------------------------------------------------------------
if( !empty($_GET['order']) && $_GET['order'] == "all") {
	getAllOrder ($conn);
}
if( !empty($_GET['id']) && $_GET['deleteOrder'] == "deleteOrder") {
	deleteOrder ($conn);
}

//逻辑编写函数-----------------------------------------------------------------------------------


//查询所有产品
function getAllOrder ($conn){
	$sql = "SELECT * FROM my_order";
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
	    echo "0 结果";
	}
}
 // 删除订单
 function deleteOrder ($conn){
    // mysqli_query($conn,"DELETE FROM car WHERE id='{$_GET['pid']}'");
    $sql = "DELETE FROM my_order WHERE id='{$_GET['id']}'";
    $result = $conn->query($sql);
	echo json_encode(array(
		"resultCode"=>200,
		"message"=>"删除成功",
		"data"=>[]
	),JSON_UNESCAPED_UNICODE);
    // $array = acrray();
	// if ($result->num_rows >= 0) {
	//     // 输出数据
	//     while($row = $result->fetch_assoc()) {
	//     	$array[] = $row;
	//     }
	//     echo json_encode($array);
	// } else {
	//     echo "0 结果";
	// }
}
//查询所有用户
function suer ($conn){
	$sql2 = "SELECT * FROM user";
	$result2 = $conn->query($sql2);
	$array2 = array();
	if ($result2->num_rows > 0) {
	    // 输出数据
	    while($row2 = $result2->fetch_assoc()) {
	    	$array2[] = $row2;
	    }
	    echo json_encode($array2);
	} else {
	    echo "0 结果";
	}
}
//添加产品
function add_products($conn){
    $sql = "INSERT INTO productlist (id,name,price,jianJie,img,p_class,p_gn,kucun)
    VALUES ('{$_GET['pid']}','{$_GET['name']}','{$_GET['price']}','{$_GET['jianJie']}','{$_GET['img']}','{$_GET['p_class']}','{$_GET['p_gn']}','{$_GET['kucun']}')";
        
    if ($conn->query($sql) === TRUE) {
        echo "添加成功";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }	
	
}
//删除产品
function deleteP ($conn){
    // mysqli_query($conn,"DELETE FROM car WHERE id='{$_GET['pid']}'");
    $sql = "DELETE FROM productlist WHERE id='{$_GET['pid']}'";
    $result = $conn->query($sql);
    echo "删除成功";
    // $array = acrray();
	// if ($result->num_rows >= 0) {
	//     // 输出数据
	//     while($row = $result->fetch_assoc()) {
	//     	$array[] = $row;
	//     }
	//     echo json_encode($array);
	// } else {
	//     echo "0 结果";
	// }
}
 // 删除用户
 function deleteUser ($conn){
    // mysqli_query($conn,"DELETE FROM car WHERE id='{$_GET['pid']}'");
    $sql = "DELETE FROM user WHERE userId='{$_GET['userId']}'";
    $result = $conn->query($sql);
    echo "删除成功";
    // $array = acrray();
	// if ($result->num_rows >= 0) {
	//     // 输出数据
	//     while($row = $result->fetch_assoc()) {
	//     	$array[] = $row;
	//     }
	//     echo json_encode($array);
	// } else {
	//     echo "0 结果";
	// }
}
$conn->close();
?>