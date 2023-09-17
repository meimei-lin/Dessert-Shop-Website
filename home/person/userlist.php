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

$user_id=$_SESSION['home_userid'];
$sql="select * from touch where user_id={$user_id}";
$rst=mysqli_query($connection,$sql);
?>

<!DOCTYPE html>
<html lang="en">
    <!-- 查看聯繫方式頁面 -->
<head>
<meta charset="UTF-8">
<title>我的聯絡方式</title>
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
                <table width="100%" border="1" align="center" style="color:#000000;">
                    <tr>
                        <th><font size=5>姓名</font></th>
                        <th><font size=5>地址</font></th>
                        <th><font size=5>電話</font></th>
                        <th><font size=5>電子郵件</font></th>
                        <th><font size=5>修改</font></th>
                        <th><font size=5>刪除</font></th>
                     </tr>
                    <?php
                        while($row=mysqli_fetch_assoc($rst)){
                    ?>
                        <tr>
                        <td align="center"><font size=5><?php echo $row['name']?></font></td>
                        <td align="center"><font size=5><?php echo $row['addr']?></font></td>
                        <td align="center"><font size=5><?php echo $row['tel']?></font></td>
                        <td align="center"><font size=5><?php echo $row['email']?></font></td>
                        <td align="center"><a href='useredit.php?id=<?php echo $row['id']?>' style="font-size:20px;background-color:#FFBFFF;color:#454545;width:100px;height:25px;">修改</a></td>
                        <td align="center"><a href='userdel.php?id=<?php echo $row['id']?>' style="font-size:20px;background-color:#FFBFFF;color:#454545;width:100px;height:25px;">刪除</a></td>
                        
                        </tr>
                    <?php
                        }
                     ?>
                   
                </table>
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