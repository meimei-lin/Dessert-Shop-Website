<?php
session_start();
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

//會員檢查
$user_account=$_POST['account'];
$user_password=md5($_POST['password']);

$sql="select * from user where account='{$user_account}' and password='{$user_password}'";
$rst=mysqli_query($connection,$sql);

$row=mysqli_fetch_assoc($rst);
if($row){
    $user_name=$row['username'];
    $_SESSION['home_username']=$user_name;
    $_SESSION['home_userid']=$row['id'];

    echo "<script>location='person/index.php'</script>";
}else{
    echo "<script>alert('帳號或密碼有誤!!!')</script>";
    echo "<script>location='login.php'</script>";
}

?>