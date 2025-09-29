<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" href="assets/css/Index.css">
    <link rel="stylesheet" href="assets/css/Product.css">
       <!-- PHP Setting -->
       <?php
        require('manage/pa.php');
        if (isset($_SESSION['User_id'])) {
            $User_id = $_SESSION['User_id'];
        }
        
        $sql = "SELECT
                    p.Product_id,
                    p.Product_Name,
                    p.Product_Price,
                    p.Date,
                    p.Description,
                    p.Image,
                    u.User_Name AS Agent_Name,
                    AVG(c.Score) AS average_score,
                    p.Agent_id
                FROM 
                    Product p
                LEFT JOIN 
                    User u ON p.Agent_id = u.User_id
                LEFT JOIN 
                    Comment c ON c.Agent_id = p.Agent_id
                WHERE 
                    p.Deleted = 0
                GROUP BY
                    p.Product_id,
                    p.Product_Name,
                    p.Product_Price,
                    p.Date,
                    p.Description,
                    p.Image,
                    u.User_Name
                ORDER BY
                    p.Product_id DESC;";
    
    $result = mysqli_query($link, $sql);

    $Product = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $row['average_score'] = $row['average_score'];
        $Product[] = $row;
    }
    ?>

    <!-- Alert -->
    <script src="assets/js/alert.js"></script>
</head>
<body>
<?php include "navbar.php"; ?>
    <div class="index_carousel">
        <img src="assets/img/carousel_1.jpg" alt="Background Image 1" class="active">
        <img src="assets/img/carousel_2.jpg" alt="Background Image 2">
        <img src="assets/img/carousel_3.jpg" alt="Background Image 3">
        <div class="overlay"></div>
        <div class="content">
            <h1>許願代購平台</h1>
            <h2>想買卻買不到？那就去許願吧！</h2>
            <h2>輕鬆入手全球商品</h2>
            <div class="rounded-button">
            <?php
            if ((isset($_SESSION['User_id'])) and ($_SESSION['User_id'] != "")) {
                echo '<button onclick="window.location.href=\'Product.php\'">瀏覽商品</button>';
                echo '<button onclick="window.location.href=\'Wish.php\'">許願去</button>';
            } else {
                echo '<button onclick="window.location.href=\'User/Login.html\'">立即登入</button>';
            }
            ?>
            </div>
        </div>
    </div>
    <div class="Info">
        <div id="left" class="column">
            <p>限量版商品。</p>
            <p>豐富的選擇。</p>
            <p>免去複雜手續。</p>
        </div>
        <div id="img" class="column">
            <img src="assets/img/packages.jpg" alt="Placeholder Image">
        </div>
        <div id="right" class="column">
            <p>。購買保障</p>
            <p>。豐富的選擇</p>
            <p>。免去複雜手續</p>
            </ul>
        </div>
    </div>
    <div class="New_Product">
        <h1>最新商品</h1>
    <div class="Product_carousel">
    <div class="carousel-track">
        <?php
        require('manage/Product_php/index.php');
        if ($result && mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo '
                <div class="product" onclick="window.location.href=\'Product.php\'">
                    <div class="product-img">
                        <img src="manage/Product_php/'. $row["Image"] . '" alt="Product Image"> 
                    </div>
                    <div class="product-info">
                        <h3>' . $row["Product_Name"] . '</h3>
                        <p>價格: $' . number_format($row["Product_price"], 2) . '</p>
                        <p>預計到貨日期: ' . $row["Date"] . '</p>
                    </div>
                </div>';
            }
        } else {
            echo "0 results";
        }
        ?>
    </div>

    <!-- Js -->
    <script src="assets/js/Index.js"></script>
</body>
</html>