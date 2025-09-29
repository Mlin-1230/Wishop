<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Css -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/addComment.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100..900&display=swap" rel="stylesheet">

    <!-- Js -->
    <script src="assets/js/alert.js"></script>
</head>
<?php

require('manage/pa.php');


$Place_Order_Id = isset($_GET['Place_Order_id']) ? $_GET['Place_Order_id'] : null;
$Take_Order_Id = isset($_GET['Take_Order_id']) ? $_GET['Take_Order_id'] : null;


if ($Place_Order_Id) {
    $sql = "SELECT p.Agent_id, o.Buyer_id FROM place_order o
            JOIN product p ON o.Product_id = p.Product_id
            WHERE o.Place_Order_id = $Place_Order_Id";
} else {
    $sql = "SELECT w.Buyer_id, o.Agent_id FROM take_order o
            JOIN wish w ON o.Wish_id = w.Wish_id
            WHERE o.Take_Order_id = $Take_Order_Id";
}

$result = mysqli_query($link, $sql);
if ($row = mysqli_fetch_assoc($result)) {
    $Agent_id = $row['Agent_id'];
    $Buyer_id = $row['Buyer_id'];
}
?>

<body>
    <!-- Navbar -->
    <?php include "navbar.php"; ?>

    <div class="main">
        <div class="product-info">
            <h2>商品資訊</h2>
            <?php
            
            if ($Place_Order_Id) {
                $sql_product = "SELECT p.Product_Name, u.User_Name AS Agent_Name, p.Image
                            FROM product p
                            JOIN user u ON p.Agent_id = u.User_id
                            JOIN place_order o ON p.Product_id = o.Product_id
                            WHERE o.Place_Order_id = $Place_Order_Id";
            } else {
                $sql_product = "SELECT w.Wish_Name AS Product_Name, u.User_Name AS Buyer_Name, w.Image, a.User_Name AS Agent_Name
                            FROM wish w
                            JOIN user u ON w.Buyer_id = u.User_id
                            JOIN take_order o ON w.Wish_id = o.Wish_id
                            JOIN user a ON o.Agent_id = a.User_id
                            WHERE o.Take_Order_id = $Take_Order_Id";
            }
            $result_product = mysqli_query($link, $sql_product);
            if ($row_product = mysqli_fetch_assoc($result_product)) {
                
                echo '<div class="form-group">';
                echo '<label for="product-name">商品名稱：</label>';
                echo '<input type="text" id="product-name" name="product-name" value="' . htmlspecialchars($row_product['Product_Name']) . '" readonly>';
                echo '</div>';
                
                echo '<div class="form-group">';
                echo '<label for="agent-name">代購人名稱：</label>';
                echo '<input type="text" id="agent-name" name="agent-name" value="' . htmlspecialchars($row_product['Agent_Name']) . '" readonly>';
                echo '</div>';
                
                echo '<div class="form-group">';
                echo '<label for="product-image">商品圖片：</label>';
                echo '<img id="product-image" src="manage/Product_php/' . htmlspecialchars($row_product['Image']) . '" alt="' . htmlspecialchars($row_product['Product_Name']) . '" style="max-width: 100%; border-radius: 4px;">';
                echo '</div>';
            }
            ?>
        </div>

        <hr>

        <!-- 填寫評價 -->
        <div class="comment-form">
            <h2>填寫您的評價</h2>
            <!-- 評價表單 -->
            <form action="manage/Comment_php/add_Comment.php" method="post" id="checkout">
                <input type="hidden" name="Agent_id" value="<?php echo $Agent_id; ?>">
                <input type="hidden" name="Buyer_id" value="<?php echo $Buyer_id; ?>">
                <input type="hidden" readonly name="Product_Name" value="<?php echo $row_product['Product_Name']; ?>">
                
                <div class="form-group">
                    <label for="Score">評分（1-5）：</label>
                    <input type="number" id="Score" name="Score" min="1" max="5" required>
                </div>
                
                <div class="form-group">
                    <label for="Comment">評論：</label>
                    <textarea id="Comment" name="Comment" required></textarea>
                </div>
                <input type="hidden" id="Date" name="Date">
                
                <div style="float: right">
                    <button type="submit" class="btn" onclick="return sendcheck()">提交評價</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Js -->
    <script src="assets/js/sendcheck.js"></script>
</body>

</html>