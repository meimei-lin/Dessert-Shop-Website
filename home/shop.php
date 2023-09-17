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
$id=$_GET['shop_id'];
$sqlShop="select * from shop where id={$id}";
$rstShop=mysqli_query($connection,$sqlShop);
$rowShop=mysqli_fetch_assoc($rstShop);

$class_id=$_GET['class_id'];
$sqlClass="select * from class where id={$class_id}";
$rstClass=mysqli_query($connection,$sqlClass);
$rowClass=mysqli_fetch_assoc($rstClass);
?>
<!DOCTYPE html>
<html lang="en">
    <!-- 甜點詳情頁面 -->
<head>
<meta charset="UTF-8">
<title><?php echo $rowShop['name']?></title>
</head>
<style type="text/css">
    .parent{
        margin-left: 50px;
        margin-top: 10px;
    }
    .name{
        position: absolute;
        margin-left: 350px;
        bottom: 540px;
        color:#404040;
        font-size: larger;
    }
    .detail{
        position: absolute;
        margin-left: 350px;
        bottom: 430px;
        color:#CA82FF;
        font-size: 20px;
    }
    .nav2{
        width: 800px;
        height: 5px;
        background: #9E9E9E;
        position: absolute;
        margin-left: 350px;
        bottom: 400px;
    }
    .price{
        position: absolute;
        margin-left: 350px;
        bottom: 350px;
        color:#404040;
        font-size: 25px;
        font-weight:bold;
    }
    .addcart{
        position: absolute;
        margin-left: 500px;
        bottom: 300px;
    }
    .style{
        height: 50px;
        background-color:#fff0f5;
        border-radius: 30px;
        border-bottom: solid #CA82FF;
    }
    .user{
        margin-left: 10px;
    }
    .text{
        margin-left: 30px;

    }
    .content{
        height: 450px;
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
                        <span><?php echo $rowClass['name']?>&raquo;<?php echo $rowShop['name']?></span>
                    </div>
                </div>
	                <div class="parent" style="left: 20px;">
		            <img src="../public/uploads/thumb_<?php echo $rowShop['img']?>">
                    </div>

                    <div class="name">
                    <h1><?php echo $rowShop['name']?></h1>
                    </div>

                    <div class="detail">
                        <h3>成分:<?php echo $rowShop['detail']?></h3>
                        <h3>庫存還剩:<?php echo $rowShop['stock']?>個</h3>
                    </div>
                    <div class="nav2"></div>
                    <div class="price">
                        <h2>NT <?php echo $rowShop['price']?></h2>
                    </div>
                    <div class="addcart">
                        <a href="cart/insert.php?id=<?php echo $rowShop['id']?>">
                        <img src="public/img//add_cart.jpg" style="width:200px;height:80px" alt="">
                        </a>
                    </div> 
	        </div>
        </div> 
          
           
        
        <div class="floor">
            <div class="floorHeader">
                <div class="left">
                    <span>評論專區</span>
                </div>
            </div>
            <?php
                $sqlComment="select comment.*,user.username from comment,user where comment.user_id=user.id and comment.shop_id={$id}";
                $rstComment=mysqli_query($connection,$sqlComment);
                while($rowComment=mysqli_fetch_assoc($rstComment)){
             ?>     
             
             <div class="style">
                <div class="user">
                    <h2><?php echo $rowComment['username']?>:</h2>
                </div>
                <div class="text">
                    <h3><?php echo $rowComment['context']?></h3>
                </div>
            </div>
              <?php
                }
            ?>
           
            
         </div>           
    <?php
        include 'footer.php';
    ?>
    </div>
</body>
</html>

