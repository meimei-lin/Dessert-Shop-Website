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

$account=$_POST['account'];
$username=$_POST['username'];
$password=md5($_POST['password']);
$repassword=md5($_POST['confirm_pwd']);

if($password==$repassword){
    $sql="insert into user(account,username,password) values('{$account}','{$username}','{$password}')";
    if(mysqli_query($connection,$sql)){
        $_SESSION['home_username']=$username;
        $_SESSION['home_userid']=mysqli_insert_id($connection);
        echo "<script>location='person/index.php'</script>";
    }
    
}else{
    echo "<script>location='register.php'</script>";
}
?>