<?php
error_reporting(E_ALL & ~(E_NOTICE | E_WARNING));//關提醒跟警告的
session_start();
if(!$_SESSION['admin_userid']){
    echo "<script>location='login.php'</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
    <!-- 後臺管理系統 -->
<head>
<meta charset="UTF-8">
<title>管理員專區</title>
</head>

<?php
    include'left.php';
?>