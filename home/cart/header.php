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

    .header{
        height: 80px;
        background: #87ceeb;
    }

    .headerTitle{
        color:#FFBFFF;
        font-size: 50px;
        font-weight:bold;
        display: inline-block;
    }

    .headerRight{
        float: right;
        padding-top: 20px;
        padding-right: 10px;
    }

    .headerRight a{
        color:#ffdead;
        font-size: 25px;
        font-weight: bold;
    }

    .headerRight a{
        margin-left: 15px;
    }

    .nav{
        height: 5px;
        background: #ffe4e1;
    }

    .ads{
       height: 500px;
    }
        
   
    .floor{
        margin-top: 10px;
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
    .left{
        float: left;
        font-size: 20px;
        color: #808080;
        font-weight: bold;
    }
    .left a{
        color: #000;
        font-weight: bold;
    }

</style>
<div class="header">
    <a class="headerTitle">
        <span> MEIMEI の 甜點窩</span>
   
    <div class="headerRight">
        <?php
            if(!$_SESSION['home_userid']){
                echo "";
            }else{
                echo "<span>歡迎 " . $_SESSION['home_username'] . " 登入</span><a href='../logout.php'>登出</a>";
            }
        ?>
        <a href="../index.php">首頁</a>
        <a href="../register.php">註冊</a>
        <a href="../person/index.php">會員中心</a>
        <a href="../cart/index.php">購物車</a>
    </div>
    </a>
</div>