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
    $User_id = $_SESSION['User_id'];
    if (isset($_GET['keyword'])) {
        $Keyword = $_GET['keyword'];
        $sql = "SELECT 
        p.Product_id,
        p.Product_Name,
        p.Product_Price,
        p.Date,
        p.Description,
        p.Image,
        p.UDate,
        u.User_Name AS Agent_Name,
        c.Score
    FROM 
        Product p
    LEFT JOIN 
        User u ON p.Agent_id = u.User_id
    LEFT JOIN 
        Comment c ON c.Agent_id = p.Agent_id
    WHERE
        p.Deleted = 0
        AND p.Agent_id = $User_id
        AND p.Product_Name LIKE '%" . $Keyword . "%'
    GROUP BY
        p.Product_id,
        p.Product_Name,
        p.Product_Price,
        p.Date,
        p.Description,
        p.Image,
        p.UDate,
        u.User_Name
    ORDER BY
        p.Product_id DESC;";}else{
    $sql = "SELECT 
        p.Product_id,
        p.Product_Name,
        p.Product_Price,
        p.Date,
        p.Description,
        p.Image,
        p.UDate,
        u.User_Name AS Agent_Name,
        c.Score
    FROM 
        Product p
    LEFT JOIN 
        User u ON p.Agent_id = u.User_id
    LEFT JOIN 
        Comment c ON c.Agent_id = p.Agent_id
    WHERE
        p.Deleted = 0
        AND p.Agent_id = $User_id
    GROUP BY
        p.Product_id,
        p.Product_Name,
        p.Product_Price,
        p.Date,
        p.Description,
        p.Image,
        p.UDate,
        u.User_Name
    ORDER BY
        p.Product_id DESC;";}
    $result = mysqli_query($link, $sql);

    $Product = array();
    while ($row = mysqli_fetch_assoc($result)) {
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
            <!-- AllProduct -->
            <div class="AllProduct" onclick="AllProduct()">全部商品</div>
            
            <!-- Search -->
            <input type="text" id="search" placeholder="搜尋..." onkeypress="MysearchProducts(event)">

        </div>

        <!-- Product -->
        <div class="container">
            <div class="product"  onclick="Launch()">
                <div class="product-img">
                    <img src="assets/img/addProduct.png">
                </div>
                <div class="product-info">
                    <h3>新增商品</h3>
                </div>
            </div>
            <?php
            foreach ($Product as $row) {
                echo '
                    <div class="product" onclick="showDetails(' .
                    $row['Product_id'] . ', \'' .
                    $row['Product_Name'] . '\', ' .
                    $row['Product_Price'] . ', \'' .
                    $row['Date'] . '\', \'' .
                    $row['Description'] . '\', \'' .
                    $row['Agent_Name'] . '\', ' .
                    $row['Score'] . ')">
                        <div class="product-img">
                            <img src="manage/Product_php/' . $row['Image'] . '" alt="' . $row['Product_Name'] . '">
                        </div>
                        <div class="product-info">
                            <h3>' . $row['Product_Name'] . '</h3>
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
                <button type="button" id="popup-delete" onclick="delProduct()">刪除</button>
            </div>
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
    <script src="assets/js/alert.js"></script>
</body>

</html>