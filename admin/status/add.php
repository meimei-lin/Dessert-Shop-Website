<?php
session_start();
if(!$_SESSION['admin_userid']){
    echo "<script>location='../login.php'</script>";
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>index</title>
</head>
    <body BGCOLOR=#FFFFD4>
    <style type="text/css">
        .hid{
            display:none;
        }
 
        .head{
            width:150px;
            font-size:25px;
            font-weight:bold;
            font-style:italic;
            margin-top:15px;
            border-radius:5px;
            text-align: center;
            color:wheat;
            background-color:#808080;
        }
        .head:hover{
            color: #b0c4de;
        }
        .floorFooter2{
            height: 500px;
            background:#fff0f5;
            padding-left: 5px;
            padding-bottom: 5px;
        }
        .floorFooter2Left{
            width: 150px;
            height: 500px;
            background: #f0ffff;
            float: left;
        }
        *{
            font-family: 微軟雅黑;
        }
        .floorFooter2{
            height: 500px;
            background:#fff0f5;
            padding-left: 5px;
            padding-bottom: 5px;
        }
        .floor{
            margin-top: 10px;
        }
        .floorFooter2Right{
            width: 1500px;
            height: 500px;
            background: #f0ffff;
            float: right;
        }
        .header{
            height: 80px;
            background: #87ceeb;
        }

        .headerTitle{
            color:#FFBFFF;
            font-size: 50px;
            font-weight:bold;
            margin-left: 650px;
            
        }
        table{
            width: 100%;
            border: 4px solid;
            margin: 0 auto; /* 將表格置中 */
            font-size: 20px;
            margin-top: 20px;
        }
        .floorHeader{
            height:50px;
            background: #b0c4de;
        }
        .floorHeader .left{
            font-size: 25px;
            font-style: italic;
            color: #000;
            font-weight: bold;
            margin-left: 30px;
        }
        .content{
            width:150px;
            font-size:20px;
            font-weight:bold;
            font-style: oblique;
            margin-top: 10px;
            color:black;
            text-align: center;
            background-color:#dcdcdc;
        }
    </style>
<div class="header">
    <a class="headerTitle">
        <span> 後臺管理員系統</span>
    </a>
</div>
<div class="floor">
<div class="floorHeader">
    <div class="left">
        <span>添加訂單狀態</span>
    </div>
</div>
<div class="floorFooter2">
<div class="floorFooter2Left">
<div class="item">
<div class="head" onclick="showMenu('i1')">會員管理</div>
        <div id="i1" class="content hid" >
            <p><a href='../user/index.php' target="right">查看會員</a></p>
            <p><a href='../user/add.php' target="right">添加會員</a></p>
        </div>
</div>
<div class="item">
    <div class="head" onclick="showMenu('i2')">分類管理</div>
    <div id="i2" class="content hid">
        <p><a href='index.php' target="right">查看分類</a></p>
        <p><a href='add.php' target="right">添加分類</a></p>
    </div>
</div>
<div class="item">
    <div class="head" onclick="showMenu('i3')">商品管理</div>
    <div id="i3" class="content hid">
        <p><a href='../shop/index.php' target="right">查看商品</a></p>
        <p><a href='../shop/add.php' target="right">添加商品</a></p>
    </div>
</div>

<div class="item">
    <div class="head" onclick="showMenu('i4')">留言板管理</div>
    <div id="i4" class="content hid">
        <p><a href='../comment/index.php' target="right">查看留言</a></p>
    </div>
</div>
<div class="item">
    <div class="head" onclick="showMenu('i5')">訂單狀態</div>
    <div id="i5" class="content hid">
        <p><a href='index.php' target="right">查看狀態</a></p>
        <p><a href='add.php' target="right">添加狀態</a></p>
    </div>
</div>

<div class="item">
    <div class="head" onclick="showMenu('i6')">訂單管理</div>
    <div id="i6" class="content hid">
        <p><a href='../indent/index.php' target="right">查看訂單</a></p>
    </div>
</div>
<div class="item">
    <div class="head" onclick="showMenu('i7')">後臺管理</div>
    <div id="i7" class="content hid">
        <p><a href='../logout.php' target="_top">登出後臺系統</a></p>
        <p><a href='../../home/index.php' target="_top">回到首頁</a></p>
    </div>
</div>
</div>
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

?>

<div class="floorFooter2Right">
<form action="insert.php" method='post'>
<table width="60%"  border=5px>
                    <tr>
                        <th align="center"><font size=5></font></th>
                    </tr>
                    <tr>
                        <td align="center"><font size=5>訂單狀態:</font></td>
                        <td align="center"><input type="text" name="name" style="font-size:20px;width:300px;height:50px"></td>
                        
                    </tr>
                </table>
               <input type="submit" name="add_class" value="添加狀態" style="font-size:20px;position:absolute;left:1000px;bottom:460px;background-color:#FFBFFF;color:#454545;width:200px;height:50px;">
</form>
</div> 
</div>
</div>
<script>
    function showMenu(nid){
        var header = document.getElementById(nid);
        var item_list = header.parentElement.parentElement.children;
 
        for(var i=0;i<7;i++){
            var item = item_list[i];
            item.children[1].classList.add("hid");
        }
 
        document.getElementById(nid).classList.remove("hid");
    }
</script>
</body>
</html>