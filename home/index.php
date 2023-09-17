<?php
session_start();
?>
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

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>index</title>
        <style type="text/css">
    .shop{
        height: 250px;
        width: 250px;
        float: left;
        margin-left: 80px;
        margin-top: 5px;
        border: 5px solid #fffaf0;
        border-radius: 10px;
    }

    .shopInfo{
        padding-left: 5px;
        padding-right: 5px;
        margin-top: 5px;
    }

    .shopPrice{

        float: right;
        color:#ABABAB;
        font-size:20px;
        font-weight:bold;
    }

    .shopName{
        color:#404040;
        font-size:20px;
        font-weight:bold;
    }
    .kind{
        font-size: 30px;
        margin-left: 650px;
        color: #CA82FF;
        font-weight:bold;
    }

    .floorHeaderRight{
        float: right;
        margin-top: 5px;
        margin-right: 10px;
    }
    .floorHeaderRight a{
        color: #404040;
        font-size: 20px;
        font-weight: bold;
        background: #87ceeb;
        
    }
    </style>
</head>
<body BGCOLOR=#FFFFD4>
    <div class="main">
        <?php
            include 'header.php';
        ?>
        <div class="nav"></div>
        <div class="ads">
            <img src="public/img/head1.jpg" style="position: absolute; width:1440px;height:500px;" alt="">
        </div>
        <div class="nav"></div>
        <div class="content">
            <?php
                $sqlClass="select * from class";
                $rstClass=mysqli_query($connection,$sqlClass);
                while($rowClass=mysqli_fetch_assoc($rstClass)){
            ?>
            <div class="floor">
                <div class="floorHeader">
                    <a class="kind">
                        <span><?php echo $rowClass['name']?></span>
                    </a>
                </div>

                <div class="floorFooter">
                    <?php
                        $sqlShop="select shop.* from shop,class where shop.shelf=1 and shop.class_id=class.id and shop.class_id={$rowClass['id']} order by rand() limit 4";
                        $rstShop=mysqli_query($connection,$sqlShop);
                        while($rowShop=mysqli_fetch_assoc($rstShop)){
                            ?>
                <a href="shop.php?shop_id=<?php echo $rowShop['id']; ?>&class_id=<?php echo $rowClass['id']; ?>">
                    <div class="shop">
                        <div class="shopImg">
                            <img src="../public/uploads/thumb_<?php echo $rowShop['img']?>"  style=" height:250px;" alt="">
                </a>
                        </div>
                        <div class="shopInfo">
                            <span class="shopName"><?php echo $rowShop['name']?></span>
                            <span class="shopPrice">NT<?php echo $rowShop['price']?></span>
                        </div>
                    </div>

                        <?php
                        }
                        ?>
                
                </div>
            </div>
            <?php
                }
            ?>
            

        </div>
        
        <div class="nav"></div>
        <?php
            include 'footer.php';
        ?>
    </div>
</body>
</html>