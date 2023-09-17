<?php
session_start();
if(!$_SESSION['admin_userid']){
    echo "<script>location='../login.php'</script>";
    exit;
}
?>
<?php
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

$code=$_POST['code'];
$status_id=$_POST['status_id'];

$sql="update indent set status_id='{$status_id}' where code='{$code}'";
if(mysqli_query($connection,$sql)){
            echo '<script>location="index.php"</script>';
}
 

?>