<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <!-- 添加聯繫方式頁面 -->
<head>
<meta charset="UTF-8">
<title>添加聯絡方式</title>
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
                    <form action="userinsert.php" method="post">
                    <table width="60%" border="4" align="center">
                    <tr>
                        <th align="center"><font size=5></font></th>
                        <th align="center"><font size=5></font></th>
                    </tr>
                    <tr>
                        <td align="center"><font size=5>姓名</font></td>
                        <td align="center"><input type="text" name="name" placeholder="姓名" style="font-size: 20px;"></td>
                        
                    </tr>
                    <tr>
                        <td align="center"><font size=5>地址</font></td>
                        <td align="center"><input type="text" name="addr" placeholder="地址" style="font-size: 20px;"></td>
                    </tr>
                    <tr>
                        <td align="center"><font size=5>電話</font></td>
                        <td align="center"><input type="tel" name="tel" placeholder="電話" style="font-size: 20px;"></td>
                    </tr>
                    <tr>
                        <td align="center"><font size=5>電子郵件</font></td>
                        <td align="center"><input type="email" name="email" placeholder="電子郵件" style="font-size: 20px;"></td>
                    </tr>
                    </table>
                    <td align="center"><input type="submit" name="useradd" value="添加" style="font-size:20px;margin-left:600px;margin-top: 30px;background-color:#FFBFFF;color:#454545;width:125px;height:50px;"></td>
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