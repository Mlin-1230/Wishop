<?php
$Wish_Name = $_POST['Wish_Name'];
$Date = $_POST['Date'];
$Address = $_POST['Address'];
$Description = $_POST['Description'];
$Buyer_id = $_SESSION['User_id'];

// 連接到資料庫
require ('../pa.php');

// 設置目標目錄
$target_dir = "../../assets/img/";


// 處理圖片上傳
$image_path = "";
if (isset($_FILES['Image']) && $_FILES['Image']['error'] == UPLOAD_ERR_OK) {
    // 獲取上傳的文件名
    $image_name = $_FILES['Image']['name'];
    
    // 確保文件名唯一
    $timestamp = time();
    $unique_name = $timestamp . '_' . basename($image_name);
    
    // 設置目標路徑
    $image_path = $target_dir . $unique_name;
    
    // 將文件移動到目標目錄
    move_uploaded_file($_FILES['Image']['tmp_name'], $image_path);
} else {
    mysqli_close($link);
    echo '
        <script>
            localStorage.setItem("alertMessage", "上傳圖片失敗！");
            window.location.href = "../../Wish.php";
        </script>
    ';
}

// 构造SQL语句，使用图片路径代替原来$Image
$sql = "INSERT INTO wish (Buyer_id, Wish_Name, Date, Description, Image,Address,Deleted) VALUES 
('$Buyer_id', '$Wish_Name', '$Date', '$Description', '$image_path','$Address',0)";

// 執行SQL語句
if (mysqli_query($link, $sql)) {
    mysqli_close($link);
    echo '
        <script>
            localStorage.setItem("alertMessage", "許願成功！");
            window.location.href = "../../Wish.php";
        </script>
    ';
} else {
    mysqli_close($link);
    echo '
        <script>
            localStorage.setItem("alertMessage", "許願失敗！");
            window.location.href = "../../Wish.php";
        </script>
    ';
}
?>