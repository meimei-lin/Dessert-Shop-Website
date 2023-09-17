<?php
session_start();
error_reporting(E_ALL & ~(E_NOTICE | E_WARNING));//關提醒跟警告的
// 資料庫連線設定
$host = 'localhost';
$username = 'root';
$password = '123456';
$database = 'dessertshop';

// 建立資料庫連線
$connection =mysqli_connect($host, $username, $password, $database);
// 檢查連線是否成功
if ($connection->connect_error) {
    die("連線失敗：" . $connection->connect_error);
}

$code=time().mt_rand();
$user_id=$_SESSION['home_userid'];
$time=time();
$touch_id=$_POST['touch_id'];

foreach($_SESSION['shops'] as $shop){
    $sql="insert into indent(code,user_id,time,touch_id,shop_id,price,num) values('{$code}','{$user_id}','{$time}','{$touch_id}','{$shop['id']}','{$shop['price']}','{$shop['num']}')";
    mysqli_query($connection,$sql);

    //減庫存
    $st=$shop['stock']-$shop['num'];
    $sqlStock="update shop set stock='{$st}' where id={$shop['id']}";
    mysqli_query($connection,$sqlStock);
}

//清空購物車
$_SESSION['shops']=array();


echo "<script>alert('結帳完成，訂單號為:{$code}')</script>";
echo "<script>location='../person/orderlist.php'</script>";
?>