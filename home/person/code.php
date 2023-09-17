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

$sql="select indent.price,indent.num,indent.shop_id,shop.name,shop.img,shop.class_id from indent,shop where indent.shop_id=shop.id and indent.code='{$code}'";
$rst=mysqli_query($connection,$sql);

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
        height: 1000px;
        background: #f0ffff;
        float: left;
    }
    .floorFooter2Right{
        width: 1250px;
        height: 1000px;
        background: #f0ffff;
        float: right;
    }
    .floorFooter2{
        height: 1000px;
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
        font-size: 20px;
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
                <table width="100%" border="1">
                <tr>
                    <th>甜點名稱</th>
                    <th>圖片</th>
                    <th>價錢</th>
                    <th>數量</th>
                    <th>總價錢</th>
                    <th>留言板</th>
                </tr>
            <?php
            $totalmoney=0;
            while($row=mysqli_fetch_assoc($rst)){
                echo"<tr>";
                echo"<td>{$row['name']}</td>";
                echo"<td><img src='../../public/uploads/thumb_{$row['img']}' width='100px'></td>";
                echo"<td>"."NT ".$row['price']."</td>";
                echo"<td>{$row['num']}</td>";
                $total=$row['price']*$row['num'];
                echo"<td>".$total."元"."</td>";
                echo "<td><a href='comment.php?shop_id={$row['shop_id']}&class_id={$row['class_id']}' style='font-weight:bold;font-size:25px;'>留言板</a></td>";
                echo"</tr>";
                $totalmoney+=$total;
            }
           
            echo"<tr>";
            echo "<td style='color:blue;font-weight:bold;font-size: 30px;'>合計:" . $totalmoney . "</td>";
            echo"</tr>";
           
            ?>
                </table>
            </div>
        </div>
        <div class="nav"></div>
        <div class="floor">
        <?php
            include '../footer.php';
        ?>
        </div>
            </div>
           
        </div>
    </div>
    
</body>
</html>
