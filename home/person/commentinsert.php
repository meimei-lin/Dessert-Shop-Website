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
$user_id=$_SESSION['home_userid'];
$time=time();
$shop_id=$_POST['shop_id'];
$class_id=$_POST['class_id'];
$content=$_POST['content'];

$sql="insert into comment(user_id,context,shop_id,time) values('{$user_id}','{$content}','{$shop_id}','{$time}')";

if(mysqli_query($connection,$sql)){
    echo"<script>location='../shop.php?shop_id={$shop_id}&class_id={$class_id}'</script>";
}

?>