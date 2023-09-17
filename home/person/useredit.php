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
$id=$_GET['id'];
$sql="select * from touch where id={$id}";
$rst=mysqli_query($connection,$sql);
$row=mysqli_fetch_assoc($rst);
?>
<!DOCTYPE html>
<html lang="en">
    <!-- 修改聯繫方式頁面 -->
<head>
<meta charset="UTF-8">
<title>修改聯絡方式</title>
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
    .floorFooter2Right ul{
        text-align: center;
        list-style: none;
        padding: 10px;
    }
    table {
        width: 60%;
        border: 4px solid;
        margin: 0 auto; /* 將表格置中 */
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
                    <form action="userupdate.php" method="post">
                    <table width="60%" border="4" align="center">
                    <tr>
                        <th align="center"><font size=5></font></th>
                        <th align="center"><font size=5></font></th>
                    </tr>
                    <tr>
                        <td align="center"><font size=5>姓名</font></td>
                        <td align="center"><input type="text" name="name" value='<?php echo $row['name']?>' style="font-size: 20px;"></td>
                        
                    </tr>
                    <tr>
                        <td align="center"><font size=5>地址</font></td>
                        <td align="center"><input type="text" name="addr"  value='<?php echo $row['addr']?>' style="font-size: 20px;"></td>
                    </tr>
                    <tr>
                        <td align="center"><font size=5>電話</font></td>
                        <td align="center"><input type="tel" name="tel"  value='<?php echo $row['tel']?>' style="font-size: 20px;"></td>
                    </tr>
                    <tr>
                        <td align="center"><font size=5>電子郵件</font></td>
                        <td align="center"><input type="email" name="email"  value='<?php echo $row['email']?>' style="font-size: 20px;"></td>
                    </tr>
                    </table>
                    <input type="hidden" name="id" value='<?php echo $row['id']?>'>
                    <td align="center"><input type="submit" name="useradd" value="修改聯絡方式" style="font-size:20px;margin-left:600px;margin-top: 30px;background-color:#FFBFFF;color:#454545;width:130px;height:50px;"></td>
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