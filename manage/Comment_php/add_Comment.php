<?php
// 获取表单提交的数据
$Agent_id = $_POST['Agent_id'];
$Buyer_id = $_POST['Buyer_id'];
$Score = $_POST['Score'];
$Comment = $_POST['Comment'];
$Date = $_POST['Date'];
$Product_Name=$_POST['Product_Name'];

// 连接数据库
require('../pa.php');

// 准备 SQL 插入语句
$sql = "INSERT INTO comment (Agent_id, Buyer_id, Product_Name ,Score, Comment, Date) 
VALUES ('$Agent_id', '$Buyer_id', '$Product_Name' ,'$Score', '$Comment', '$Date')";
$result = mysqli_query($link, $sql);

// 检查插入结果
if ($result) {
    mysqli_close($link);
    echo '
        <script>
            localStorage.setItem("alertMessage", "評價成功！");
            window.location.href = "../../index.php";
        </script>
    ';
} else {
    mysqli_close($link);
    echo '
        <script>
            localStorage.setItem("alertMessage", "評價失敗！");
            window.location.href = "../../index.php";
        </script>
    ';
}

?>
