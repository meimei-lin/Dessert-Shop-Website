<?php
session_start();
?>

<HTML>
<HEAD>
<TITLE>註冊畫面</TITLE>
</HEAD>
<BODY>
<P></P>
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
        height: 650px;
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
</style>
<form action="reginsert.php" method = "post" > 
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
                <span  style="color:#696969;font-weight:bold;"><font size=5>註冊畫面</span>
            </div>
            </div>

            <div class="floorFooter2">
            <img src="./public/img/svg.png" width="200px" style="display: block; margin: 0 auto;">
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
                        <td align="center"><font size=5>姓名:</font></td>
                        <td align="center"><input type="text" name="username" placeholder="輸入姓名" style="font-size:20px;width:300px;height:50px"></td>
                    </tr>
                    <tr>
                        <td align="center"><font size=5>密碼:</font></td>
                        <td align="center"><input type="password" name="password" placeholder="輸入密碼" style="font-size:20px;width:300px;height:50px"></td>
                    </tr>
                    <tr>
                        <td align="center"><font size=5>確認密碼:</font></td>
                        <td align="center"><input type="password" name="confirm_pwd" placeholder="輸入確認密碼" style="font-size:20px;width:300px;height:50px"></td> 
                    </tr>
                    <tr>
                        <td><input type = "submit" value = "確認註冊" name="submit" style="font-size:20px;margin-left:350px;background:#CA82FF;width:200px;height:50px;"></td>
                    </tr>
                </table>
                
                </div>
            </div>

            <?php
                include 'footer.php';
                ?>
        </div>
</div>
</form>
</body>
