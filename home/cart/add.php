<?php
session_start();
error_reporting(E_ALL & ~(E_NOTICE | E_WARNING));//關提醒跟警告的
$id=$_GET['id'];

$_SESSION['shops'][$id]['num']++;
if($_SESSION['shops'][$id]['num']>$_SESSION['shops'][$id]['stock']){
    $_SESSION['shops'][$id]['num']=$_SESSION['shops'][$id]['stock'];
}
echo "<script>location='index.php'</script>";
?>