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

$id=$_GET['id'];
$sql="select * from shop where id={$id}";
$rst=mysqli_query($connection,$sql);
$row=mysqli_fetch_assoc($rst);

if($row['stock']>0){
    //把商品放入購物車
    $_SESSION['shops'][$id]=$row;
    $_SESSION['shops'][$id]['num']=1;
    echo "<script>location='index.php'</script>";
}else{
    echo "<script>alert('非常抱歉QQ目前沒貨了!')</script>";
    echo "<script>location='../index.php'</script>";
}



?>