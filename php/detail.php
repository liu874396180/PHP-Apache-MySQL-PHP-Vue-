<?php
include '../config.php';

//获取前端传值-----------------------------------------------------------------------------------
//if( !empty($_GET['searchall']) ) $searchall = $_GET['searchall']; // 首页全部查询
if( !empty($_GET['pid']) ) $userName = $_GET['pid'];


//逻辑调用-----------------------------------------------------------------------------------
if(  !empty($_GET['getdata']) && $_GET['getdata'] == 'pro_detail' ) {
	products ($conn);
};


if( !empty($_GET['pid']) && !empty($_GET['userId']) && empty($_GET['my_address']) ) {
	addCar($conn);
};

if( !empty($_GET['pid']) && !empty($_GET['userId']) && !empty($_GET['my_address']) ) {
	addOrder($conn);
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
	    echo json_encode(array(
            "resultCode"=>200,
            "message"=>"查询成功",
            "data"=>$array
        ),JSON_UNESCAPED_UNICODE);
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
	 $sql = "SELECT * FROM car WHERE id='{$_GET['pid']}' AND userId = '{$_GET['userId']}'";
	 $result = $conn->query($sql);
	 $row = mysqli_fetch_assoc($result);
	 if($row == TRUE){
	// if($conn->query($sql) == TRUE){
	 	echo json_encode(array(
         "resultCode"=>"00",
         "message"=>"重复添加",
         "data"=>[]
     ),JSON_UNESCAPED_UNICODE);

	 	return false;
	 }else{
		$sql = "INSERT INTO car (userId, id,name,price,jianJie,img)
		VALUES ('{$_GET['userId']}', '{$_GET['pid']}','{$_GET['name']}','{$_GET['price']}','{$_GET['jianJie']}','{$_GET['img']}')";
		   
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
}

//添加订单
function addOrder($conn){
	$sql = "SELECT * FROM my_order WHERE id='{$_GET['pid']}' AND userId = '{$_GET['userId']}'";
	$result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result);
	if($row == TRUE){
		echo json_encode(array(
			"resultCode"=>"00",
			"message"=>"重复下单",
			"data"=>[]
		),JSON_UNESCAPED_UNICODE);
		return false;
	}else{
		$sql = "INSERT INTO my_order (userId,id,p_name,price,jianJie,my_address,img)
		VALUES ('{$_GET['userId']}','{$_GET['pid']}','{$_GET['p_name']}','{$_GET['price']}','{$_GET['jianJie']}','{$_GET['my_address']}','{$_GET['img']}')";
			
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
}
 
$conn->close();
?>