<?php
session_start();
if(!$_SESSION['admin_userid']){
    echo "<script>location='../login.php'</script>";
    exit;
}
?>
<?php
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

function thumb($simg,$dw,$dh){
    //原圖大小
    $arr=getimagesize($simg);
    $sw=$arr[0];
    $sh=$arr[1];
    $st=$arr[2];
    $sm=$arr['mime'];

    switch($st){
        case 1:
            $imagecreate="imagecreatefromgif";
            $imageout="imagegif";
            break;

        case 2:
            $imagecreate="imagecreatefromjpeg";
            $imageout="imagejpeg";
            break;

        case 3:
            $imagecreate="imagecreatefrompng";
            $imageout="imagepng";
            break;
    }

    //原圖和目標圖片資源
    $simgr=$imagecreate($simg);

    //等比例計算
    if($sw/$dw > $sh/$dh){
        $b=$sw/$dw;
    }else{
        $b=$sh/$dh;
    }

    $dw2=floor($sw/$b);
    $dh2=floor($sh/$b);

    //目標圖片資源
    $dimgr=imagecreatetruecolor($dw2,$dh2);
    //開始縮放
    imagecopyresampled($dimgr,$simgr,0,0,0,0,$dw2,$dh2,$sw,$sh);
    
    //存到與原圖同一目錄下
    $dir=dirname($simg);
    $file=basename($simg);
    $save=$dir.'/'.'thumb_'.$file;
    $imageout($dimgr,$save);
}

$sname=$_POST['name'];
$price=$_POST['price'];
$stock=$_POST['stock'];
$shelf=$_POST['shelf'];
$class_id=$_POST['class_id'];

//圖片上傳
$src=$_FILES['img']['tmp_name'];
$name=$_FILES['img']['name'];
$ext=array_pop(explode('.',$name));
$dst='../public/uploads/'.time().mt_rand().'.'.$ext;
if(move_uploaded_file($src,$dst)){
    //圖片縮放250x250
    thumb($dst,250,250);

    $img=basename($dst);

    $sql="insert into shop(name,price,stock,shelf,class_id,img) values('{$sname}','{$price}','{$stock}','{$shelf}','{$class_id}','{$img}')";

    if(mysqli_query($connection,$sql)){
        echo'<script>location="index.php"</script>';
    }
}


?>