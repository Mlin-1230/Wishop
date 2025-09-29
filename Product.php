<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>許願代購平台</title>

    <!-- Css -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/Product.css">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/3daedf892a.js" crossorigin="anonymous"></script>

    <!-- PHP Setting -->
    <?php
    require('manage/pa.php');
    if (isset($_SESSION['User_id'])) {
        $User_id = $_SESSION['User_id'];
    }
    if (isset($_GET['keyword'])) {
        $Keyword = $_GET['keyword'];

        // 創建 SQL 查詢，使用 LIKE 運算子進行搜索
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
                    AND p.Product_Name LIKE '%" . $Keyword . "%'
                GROUP BY
                    p.Product_id,
                    p.Product_Name,
                    p.Product_Price,
                    p.Date,
                    p.Description,
                    p.Image,
                    u.User_Name
                ORDER BY
                    p.Product_id DESC";
    } else {
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
    }
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
    <!-- Navbar -->
    <?php include "navbar.php"; ?>

    <div class="main">
        <div class="search-container">
            <!-- MyProduct -->
            <?php
            if ((isset($_SESSION['User_id'])) and ($_SESSION['User_id'] != "")) {
                echo '<div class="MyProduct" onclick="MyProduct()">我的商品</div>';
            }
            ?>
            <!-- Search -->
            <input type="text" id="search" placeholder="搜尋..." onkeypress="searchProducts(event)">
        </div>

        <!-- Product -->
        <div class="container">
            <?php  

            foreach ($Product as $row) {

                echo '
                    <div class="product" onclick="showDetails(' .
                    $row['Product_id'] . ', \'' .
                    addslashes($row['Product_Name']) . '\', ' .
                    $row['Product_Price'] . ', \'' .
                    $row['Date'] . '\', \'' .
                    addslashes($row['Description']) . '\', \'' .
                    addslashes($row['Agent_Name']) . '\', ' .
                    (isset($row['average_score']) ? $row['average_score'] : "null") . ', ' .
                    $row['Agent_id'] . ')">
                        <div class="product-img">
                            <img src="manage/Product_php/' . addslashes($row['Image']) . '" alt="' . addslashes($row['Product_Name']) . '">
                        </div>
                        <div class="product-info">
                            <h3>' . addslashes($row['Product_Name']) . '</h3>
                            <hr>
                            <p>價格: ' . $row['Product_Price'] . '</p>
                            <p>代購人: ' . addslashes($row['Agent_Name']) . '</p>                    
                        </div>
                    </div>
                ';
            }
            ?>
        </div>

        <!-- Popup -->
        <div id="popup" class="popup">
            <div class="popup-content">
                <span class="close" onclick="closePopup()">&times;</span>
                <div>
                    <h2>商品資訊</h2>
                    <p id="popup-name"></p>
                    <p id="popup-price"></p>
                    <p id="popup-date"></p>
                    <p id="popup-info"></p>
                </div>
                <hr>
                <div>
                    <h2>
                        代購者資訊
                        <button type="button" id="Comment" onclick="viewAgentDetails()">
                            查看代購者詳細資訊
                        </button>
                    </h2>
                    
                    <p id="popup-agent"></p>

                </div>


                <?php
                if (isset($_SESSION['User_id']) && !empty($_SESSION['User_id'])) {
                    echo '<button type="button" id="popup-order" onclick="PlaceOrder()">下訂單</button>';
                } else {
                    echo '<button type="button" id="popup-order" onclick="NoSession()">下訂單</button>';
                }
                ?>
            </div>
            <div id="getID" User_id="<?php echo $User_id; ?>"></div>

        </div>

        <!-- Page -->
        <div id="pagination" class="pagination-container">
            <button onclick="prevPage()">上一頁</button>
            <span id="currentPage"></span>
            <button onclick="nextPage()">下一頁</button>
        </div>
    </div>

    <!-- Js -->
    <script src="assets/js/Product.js"></script>
</body>

</html>