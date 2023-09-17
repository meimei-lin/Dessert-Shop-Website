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
$id=$_POST['id'];
$name=$_POST['name'];
$addr=$_POST['addr'];
$tel=$_POST['tel'];
$email=$_POST['email'];
$sql="update touch set name='{$name}',addr='{$addr}',tel='{$tel}',email='{$email}' where id={$id}";

if(mysqli_query($connection,$sql)){
    echo'<script>location="userlist.php"</script>';
}
?>