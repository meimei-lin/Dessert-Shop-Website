<!DOCTYPE html>
<html lang="en">
    <!-- 登入介面 -->
<head>
<meta charset="UTF-8">
<title>登入</title>
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
    .floorFooter2{
        height: 500px;
        background:#fff0f5;
        padding-left: 5px;
        padding-bottom: 5px;
    }
    table {
        width: 60%;
        border: 3px solid;
        margin: 0 auto; /* 將表格置中 */
        padding: 10px;
    }
    .header{
        height: 80px;
        background: #87ceeb;
    }

    .headerTitle{
        color:#FFBFFF;
        font-size: 50px;
        font-weight:bold;
        display: inline-block;
        margin-left: 550px;
        
    }
   

</style>

<body BGCOLOR=#FFFFD4>
    <div class="main">
    <div class="header">
    <a class="headerTitle">
        <span>後臺管理系統</span>
    </a>
    </div>
        <div class="nav"></div>
        <div class="content">
            <div class="floor">
            <div class="floorHeader">
            <div class="left">
                <span  style="color:#696969;font-weight:bold;"><font size=5>管理員登入畫面</span>
            </div>
            </div>
                <div class="floorFooter2">
                <img src="../home/public/img/management.png" width="200px" style="display: block; margin: 0 auto;">
                <form action="check.php" method="post">
                <table width="60%"  border=5px>
                    <tr>
                        <th align="center"><font size=5></font></th>
                        <th align="center"><font size=5></font></th>
                    </tr>
                    <tr>
                        <td align="center"><font size=5>帳號:</font></td>
                        <td align="center"><input type="text" name="account" placeholder="輸入帳號" style="font-size:20px;width:300px;height:50px"></td>
                        
                    </tr>
                    <tr>
                        <td align="center"><font size=5>密碼:</font></td>
                        <td align="center"><input type="text" name="password" placeholder="輸入密碼" style="font-size:20px;width:300px;height:50px"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="login" value="登入" style="font-size:20px;margin-left:350px;background-color:#FFBFFF;color:#454545;width:125px;height:50px;"></td>
                    </tr>
                </table>
               
                </form>
                   
            </div>
            </div>
            <div class="nav"></div>
            <?php
                include '../home/footer.php';
            ?>
        </div>
    </div>