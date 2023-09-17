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

$code=$_GET['code'];

$sql="select indent.price,indent.num,indent.shop_id,shop.name,shop.img from indent,shop where indent.shop_id=shop.id and indent.code='{$code}'";
$rst=mysqli_query($connection,$sql);
$row=mysqli_fetch_assoc($rst);
?>
<!DOCTYPE html>
<html lang="en">
    <!-- 查看訂單編號方式頁面 -->
<head>
<meta charset="UTF-8">
<title>訂單編號頁面</title>
</head>
<style type="text/css">
    *{
        padding: 0px;
        margin: 0px;
        font-family: 微軟雅黑;
    }

    a{
        text-decoration: none;
    }

    .main{
        width: 1440px;
        margin:0 auto;
    }
    .floor{
        margin-top: 10px;
    }
    .floorFooter2Left{
        width: 150px;
        height: 500px;
        background: #f0ffff;
        float: left;
    }
    .floorFooter2Right{
        width: 1250px;
        height: 500px;
        background: #f0ffff;
        float: right;
    }
    .floorFooter2{
        height: 500px;
        background:#fff0f5;
        padding-left: 5px;
        padding-bottom: 5px;
    }
    .floorFooter2Left ul{
        list-style: none;
        padding: 10px;
    }
    .floorFooter2Left ul li a{
        padding: 5px;
        color: #696969;
        font-weight:bold;
    }
    .floorFooter2Left ul li a:hover{
        color: #00bfff;
        font-weight:bold;
    }
    .floorFooter2Left ul li{
        line-height: 30px;
    }
    table{
        width: 80%;
        border: 4px solid;
        margin: 0 auto; /* 將表格置中 */
        font-size: 30px;
        margin-top: 20px;
    }
</style>
<body BGCOLOR=#FFFFD4>
    <div class="main">
        <?php
            include 'header.php';
        ?>
        <div class="nav"></div>
        <div class="content">
            <div class="floor">
                <div class="floorHeader">
                    <div class="left">
                        <span><a href='' style="color:#696969;font-weight:bold;font-size:25px;">會員中心</a></span>
                    </div>
                </div>
                <div class="floorFooter2">
                <div class="floorFooter2Left">
                    
                    <ul>
                        <li><a href="userlist.php" style="font-size:20px;">查看聯繫方式</a></font></li>
                        <li><a href="useradd.php" style="font-size:20px;">添加聯絡方式</a></font></li>
                        <li><a href="orderlist.php" style="font-size:20px;">查看我的訂單</a></font></li>
                    </ul>
                </div>
                <div class="floorFooter2Right">
                    <form action="commentinsert.php" method="post">
                <table width="100%" border="1">
                <tr>
                    <th>您覺得這款甜點如何?</th>
                    <th></th>
                </tr>
                <tr>
                <td align="center"><textarea name="content" style="font-size:20px;"></textarea></td>
                </tr>
                <input type="hidden" name="shop_id" value=<?php echo $_GET['shop_id']?>>
                <input type="hidden" name="class_id" value=<?php echo $_GET['class_id']?>>
                <td align="center"><input type="submit" name="send" value="確認送出" style="font-size:20px;margin-left:10px;margin-top: 30px;background-color:#FFBFFF;color:#454545;width:125px;height:50px;"></td>
                </table>
                </form>
                </div>
                </div>
                
            </div>
            <div class="nav"></div>
            <?php
                include '../footer.php';
            ?>
        </div>
    </div>
    
</body>
</html>
