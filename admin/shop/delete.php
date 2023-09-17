<?php
session_start();
if(!$_SESSION['admin_userid']){
    echo "<script>location='../login.php'</script>";
    exit;
}
?>
<?php
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
$img=$_GET['img'];
$file="../../public/uploads/{$img}";
$sql="delete from shop where id={$id}";

if(mysqli_query($connection,$sql)){
    //刪圖片
    unlink($file);
    echo'<script>location="index.php"</script>';
}
?>