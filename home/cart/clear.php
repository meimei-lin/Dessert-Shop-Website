<?php
session_start();
error_reporting(E_ALL & ~(E_NOTICE | E_WARNING));//關提醒跟警告的

$_SESSION['shops']=array();
echo "<script>location='index.php'</script>";
?>