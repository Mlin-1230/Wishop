<?php
require('manage/pa.php');

// 检查连接
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

// 查询前10个按日期最新的商品信息
$sql = "SELECT Product_Name, Product_price, Image, Date FROM product ORDER BY Date DESC LIMIT 10";
$result = mysqli_query($link, $sql);
?>