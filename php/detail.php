<?php
include '../config.php';

//获取前端传值-----------------------------------------------------------------------------------
//if( !empty($_GET['searchall']) ) $searchall = $_GET['searchall']; // 首页全部查询
if( !empty($_GET['pid']) ) $userName = $_GET['pid'];


//逻辑调用-----------------------------------------------------------------------------------
if(  !empty($_GET['getdata']) && $_GET['getdata'] == 'pro_detail' ) {
	products ($conn);
};

// 添加购物车
if( !empty($_GET['pid']) && !empty($_GET['userId']) && empty($_GET['my_address']) ) {
	addCar($conn);
};
// 添加订单
if( !empty($_GET['pid']) && !empty($_GET['userId']) && !empty($_GET['my_address']) ) {
	addOrder($conn);
};

// 增加积分
if( !empty($_GET['userId']) && !empty($_GET['addJifen']) ) {
	addJifen($conn);
};
// 增加销量
if( !empty($_GET['productId']) && !empty($_GET['addsales']) ) {
	addSales($conn);
};
// 获取已填收货地址
if( !empty($_GET['userId']) && !empty($_GET['getAddressdata']) && $_GET['getAddressdata']=="getAddressdata") {
	gatAddressData($conn);
};
// 删除地址
if( !empty($_GET['userAddress']) && !empty($_GET['userId']) && !empty($_GET['deletAddress']) && $_GET['deletAddress']==  "deletAddress"){
    //delete
    deletAddress ($conn);
}
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

//添加购物车 ----禁止重复添加
// function addCar($conn){
// 	 $sql = "SELECT * FROM car WHERE id='{$_GET['pid']}' AND userId = '{$_GET['userId']}'";
// 	 $result = $conn->query($sql);
// 	 $row = mysqli_fetch_assoc($result);
// 	 if($row == TRUE){
// 	 	echo json_encode(array(
//          "resultCode"=>"00",
//          "message"=>"重复添加",
//          "data"=>[]
//      ),JSON_UNESCAPED_UNICODE);

// 	 	return false;
// 	 }else{
// 		$sql = "INSERT INTO car (userId, id,name,price,jianJie,img,p_class,p_color,p_version)
// 		VALUES ('{$_GET['userId']}', '{$_GET['pid']}','{$_GET['name']}','{$_GET['price']}','{$_GET['jianJie']}','{$_GET['img']}','{$_GET['p_class']}','{$_GET['p_color']}','{$_GET['p_version']}')";
		   
// 		if ($conn->query($sql) === TRUE) {
// 		    echo json_encode(array(
// 	            "resultCode"=>200,
// 	            "message"=>"添加成功",
// 	            "data"=>[]
// 	        ),JSON_UNESCAPED_UNICODE);
// 		} else {
// 		    echo "Error: " . $sql . "<br>" . $conn->error;
// 		}
// 	 }
// }
//添加购物车 ----可以重复添加。数量累积
function addCar($conn){
	$sql = "SELECT * FROM car WHERE id='{$_GET['pid']}' AND userId = '{$_GET['userId']}'";
	 $result = $conn->query($sql);
	 $row = mysqli_fetch_assoc($result);
	 if($row == TRUE){
		$sql2 = "SELECT * FROM car WHERE id='{$_GET['pid']}' AND userId = '{$_GET['userId']}'";
		$result2 = $conn->query($sql2);
		$row2 = mysqli_fetch_assoc($result2);
		$old_num = array_values($row2)[9]; //查询原有数量
		$new_num = $old_num + 1; //每次增加1
		$sql3 = "UPDATE car SET p_num=$new_num WHERE id='{$_GET['pid']}' AND userId = '{$_GET['userId']}'";
		$result = $conn->query($sql3);
		echo json_encode(array(
			"resultCode"=>200,
			"message"=>"数量增加成功",
			"data"=>[]
		),JSON_UNESCAPED_UNICODE);
	 	return false;
	 }else{
		$sql4 = "INSERT INTO car (userId, id,name,price,jianJie,img,p_class,p_color,p_version,p_num)
		VALUES ('{$_GET['userId']}', '{$_GET['pid']}','{$_GET['name']}','{$_GET['price']}','{$_GET['jianJie']}','{$_GET['img']}','{$_GET['p_class']}','{$_GET['p_color']}','{$_GET['p_version']}',1)";
		if ($conn->query($sql4) === TRUE) {
			echo json_encode(array(
				"resultCode"=>200,
				"message"=>"添加成功",
				"data"=>[]
			),JSON_UNESCAPED_UNICODE);
		} else {
			echo "Error: " . $sql4 . "<br>" . $conn->error;
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
		$psql = "SELECT * FROM productlist WHERE id='{$_GET['pid']}'";
		$presult = $conn->query($psql);
		$prow = mysqli_fetch_assoc($presult);
		$pold_kucun = array_values($prow)[8]; //查询原有kc
		$pnew_kucun =  --$pold_kucun; //每次-1
		$psql2 = "UPDATE productlist SET kucun=$pnew_kucun WHERE id='{$_GET['pid']}'";
		$presult2 = $conn->query($psql2);
		$sql = "INSERT INTO my_order (userId,id,p_name,price,jianJie,my_address,img,p_class,user_name,user_mobile,p_color,p_version,orderDate,orderCode,shifu,userName)
		VALUES ('{$_GET['userId']}','{$_GET['pid']}','{$_GET['p_name']}','{$_GET['price']}','{$_GET['jianJie']}','{$_GET['my_address']}','{$_GET['img']}','{$_GET['p_class']}','{$_GET['user_name']}','{$_GET['user_mobile']}','{$_GET['p_color']}','{$_GET['p_version']}','{$_GET['orderDate']}','{$_GET['orderCode']}','{$_GET['shifu']}','{$_GET['userName']}')";
			
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
//增加积分

function addJifen($conn){
	$sql = "SELECT * FROM user WHERE userId = '{$_GET['userId']}'";
	$result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result);
	$old_jifen = array_values($row)[4]; //查询原有积分
	$new_jifen = $old_jifen + 10; //每次增加10分
	$sql2 = "UPDATE user SET jifen=$new_jifen WHERE userId = '{$_GET['userId']}'";
	$result = $conn->query($sql2);
	echo json_encode(array(
		"resultCode"=>200,
		"message"=>"积分增加成功",
		"data"=>$new_jifen
	),JSON_UNESCAPED_UNICODE);
}
//增加销量

function addSales($conn){
	$sql = "SELECT * FROM productlist WHERE id='{$_GET['productId']}'";
	$result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result);
	$old_sales = array_values($row)[6]; //查询原有积分
	$new_sales = $old_sales + 1; //每次增加10分
	$sql2 = "UPDATE productlist SET sales=$new_sales WHERE id = '{$_GET['productId']}'";
	$result = $conn->query($sql2);
	echo json_encode(array(
		"resultCode"=>200,
		"message"=>"销量增加成功",
		"data"=>$new_sales
	),JSON_UNESCAPED_UNICODE);
}
// 获取收货地址
function gatAddressData($conn){
	$sql = "SELECT * FROM useraddress WHERE userId='{$_GET['userId']}'";
	$result = $conn->query($sql);
	$array = array();
	if ($result->num_rows > 0) {
	    // 输出数据
	    while($row = $result->fetch_assoc()) {
	    	$array[] = $row;
	    }
	    echo json_encode(array(
            "resultCode"=>200,
            "message"=>"查询地址成功",
            "data"=>$array
        ),JSON_UNESCAPED_UNICODE);
	} else {
	    echo json_encode(array(
            "resultCode"=>200,
            "message"=>"查询地址成功",
            "data"=>[]
        ),JSON_UNESCAPED_UNICODE);
	}
}
// 删除地址
//删除
function deletAddress ($conn){
    $sql = "DELETE FROM useraddress WHERE userAddress='{$_GET['userAddress']}'";
    $result = $conn->query($sql);
    echo json_encode(array(
		"resultCode"=>200,
		"message"=>"删除成功",
		"data"=>[]
	),JSON_UNESCAPED_UNICODE);
    
}

$conn->close();
?>