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
?>
<!DOCTYPE html>
<html lang="en">
    <!-- 購物車頁面 -->
<head>
<meta charset="UTF-8">
<title>購物車</title>
</head>
<style type="text/css">
    .cartNum{
        background: #c0c0c0;
        color: #fff;
        border-radius: 5px;
        padding: 0px 15px;
        width: 50px;
        height: 50px;
        font-size: 30px;
    }

    .cartNum:hover{
        box-shadow: 1px 1px 1px 1px #ccc;
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
                <span  style="color:#696969;font-weight:bold;"><font size=5>我的購物車</span>
            </div>
        </div>
        
        <?php
            $total=0;
            if(!$_SESSION['shops']){
                echo "購物車空空的，快來下訂單吧!!! <a href='../index.php'>點我購物</a>";
            }else{
                ?>
            <table width="100%" border="1" align="center" style="color:#CA82FF;">
            <tr>
            <th><font size=5>名稱</font></th>
            <th><font size=5>圖片</font></th>
            <th><font size=5>單價</font></th>
            <th><font size=5>庫存</font></th>
            <th><font size=5>數量</font></th>
            <th><font size=5>金額</font></th>
            <th><font size=5>刪除訂單</font></th>
        </tr>
             <?php   
             foreach($_SESSION['shops'] as $shop){
                $total+=$shop['price']*$shop['num'];
           
                ?>
        <tr>
            <td align="center"><font size=5><?php echo $shop['name']?></font></td>
            <td align="center">
                <img src="../../public/uploads/thumb_<?php echo $shop['img']?>" width="100px">
            </td>
            <td align="center"><font size=5><?php echo $shop['price']?>元</font></td>
            <td align="center"><font size=5><?php echo $shop['stock']?>個</font></td>
            <td align="center"><font size=5>
                <a href="sub.php?id=<?php echo $shop['id']?>" class='cartNum'>-</a>
                <span><?php echo $shop['num']?></span>
                <a href="add.php?id=<?php echo $shop['id']?>" class='cartNum'>+</a>
            </font></td>
            <td align="center"><font size=5><?php echo $shop['price']*$shop['num']?>元</font></td>
            <td align="center">
                <a href="delete.php?id=<?php echo $shop['id']?>" style="font-size=20px;background:#CA82FF;color:#000;">刪除</a>
            </td>
            
        </tr>
        <?php
            }
        ?>
       <tr>
        
        <td></td>
        <td></td>
        <td></td>
        <td align="center">
            <a href="../index.php" style="background:#fff;color:red;font-weight:bold;">繼續購物</a>
        </td>
        <td align="center"><a href="clear.php" style="background:#fff; color:red;font-weight:bold;">清空購物車</a></td>
        <td align="center">總金額:</td>
        <td align="center"><?php echo $total?>元</td>
       </tr>
        </table>
        <?php
            }
        ?>
    </div>

    <div class="floor">
        <div class="floorHeader">
            <div class="left">
                <span  style="color:#696969; font-weight:bold;" ><font size=5 >我的聯絡方式</span>
            </div>
            </div>
            <?php
                if($_SESSION['home_userid']){
                    ?>
                    <form action="commit.php" method="post">
                    <table width="100%" border="1" align="center" style="color:#808080;">
                    <tr>
                        <th><font size=5>選擇</font></th>
                        <th><font size=5>姓名</font></th>
                        <th><font size=5>地址</font></th>
                        <th><font size=5>電話</font></th>
                        <th><font size=5>電子郵件</font></th>
                    </tr>

                    <?php
                        $user_id=$_SESSION['home_userid'];
                        $sql="select * from touch where user_id={$user_id}";
                        $rst=mysqli_query($connection,$sql);
                        $i=0;
                        while($row=mysqli_fetch_assoc($rst)){
                            if($i==0){
                                ?>
                            <tr>
                            <td align="center">
                                <input type="radio" checked name="touch_id" value=<?php echo $row['id']?>>
                            </td>
                            <td  align="center"><?php echo $row['name']?></td>
                            <td  align="center"><?php echo $row['addr']?></td>
                            <td  align="center"><?php echo $row['tel']?></td>
                            <td  align="center"><?php echo $row['email']?></td>
                            </tr>
                        <?php
                            }else{
                        ?>
                            <tr>
                            <td align="center">
                                <input type="radio" name="touch_id" value=<?php echo $row['id']?>>
                            </td>
                            <td  align="center"><?php echo $row['name']?></td>
                            <td  align="center"><?php echo $row['addr']?></td>
                            <td  align="center"><?php echo $row['tel']?></td>
                            <td  align="center"><?php echo $row['email']?></td>
                            </tr>
                        <?php
                            }
                            $i++;
                        }
                        ?>
                    </table>
              <?php  }else{
                    echo "尚未登入，請先登入,<a href='../login.php'>點我登入</a>";
                }
            ?>
            
    </div>
    <div class="floor">
       
        <table widtd="100%">
        <tr>
            <th></th>
        </tr>
        <tr>
            <td><input type="submit" name="commit" value="確認結帳" style="margin-left:550px;font-size:20px;background-color:#FFBFFF;color:#454545;width:300px;height:50px;"></td>
        </tr>   
        </table>
        </form> 
       
          
    </div>
    <div class="floor">
        <?php
            include '../footer.php';
        ?>
    </div>
        
    </div>
    </div>
</body>