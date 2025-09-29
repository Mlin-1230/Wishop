<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>許願代購平台</title>

    <!-- Css -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/Wish.css">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/3daedf892a.js" crossorigin="anonymous"></script>

    <!-- PHP Setting -->
    <?php
    require('manage/pa.php');
    $User_id = $_SESSION['User_id'];
    if (isset($_GET['keyword'])) {
        $Keyword = $_GET['keyword'];
        $sql = "SELECT 
        w.Wish_id,
        w.Wish_Name,
        w.Date,
        w.Description,
        w.Image,
        u.User_Name AS Buyer_Name,
        c.Score
    FROM 
        Wish w
    LEFT JOIN 
        User u ON w.Buyer_id = u.User_id
    LEFT JOIN 
        Comment c ON w.Buyer_id = c.Buyer_id
    WHERE 
        w.Deleted = 0
        AND w.Buyer_id = $User_id
        AND w.Wish_Name LIKE '%" . $Keyword . "%'
    GROUP BY
        w.Wish_id,
        w.Wish_Name,
        w.Date,
        w.Description,
        w.Image,
        u.User_Name
    ORDER BY
        w.Wish_id DESC;";
    } else {
        $sql = "SELECT 
        w.Wish_id,
        w.Wish_Name,
        w.Date,
        w.Description,
        w.Image,
        u.User_Name AS Buyer_Name,
        c.Score
    FROM 
        Wish w
    LEFT JOIN 
        User u ON w.Buyer_id = u.User_id
    LEFT JOIN 
        Comment c ON w.Buyer_id = c.Buyer_id
    WHERE 
        w.Deleted = 0
        AND w.Buyer_id = $User_id
    GROUP BY
        w.Wish_id,
        w.Wish_Name,
        w.Date,
        w.Description,
        w.Image,
        u.User_Name
    ORDER BY
        w.Wish_id DESC;";
    }
    $result = mysqli_query($link, $sql);

    $Wish = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $Wish[] = $row;
    }
    ?>
</head>

<body>
    <!-- Navbar -->
    <?php include "navbar.php"; ?>

    <div class="main">
        <div class="search-container">
            <!-- AllWish -->
            <div class="AllWish" onclick="AllWish()">全部願望</div>

            <!-- Search -->
            <input type="text" id="search" placeholder="搜尋..." onkeypress="MysearchWishes(event)">

        </div>

        <!-- Wish -->
        <div class="container">
            <div class="wish" onclick="makeWish()">
                <div class="wish-img">
                    <img src="assets/img/addWish.jpg">
                    <div class="overlay"></div>
                </div>
                <div class="wish-name">
                    <h3>許願</h3>
                </div>
            </div>
            <?php
            foreach ($Wish as $row) {
                echo '
                    <div class="wish" onclick="showDetails(' .
                    $row['Wish_id'] . ', \'' .
                    $row['Buyer_Name'] . '\', \'' .
                    $row['Wish_Name'] . '\', \'' .
                    $row['Date'] . '\', \'' .
                    $row['Description'] . '\')">
                        <div class="wish-img" onclick="()">
                            <img src="manage/Wish_php/' . $row['Image'] . '" alt="' . $row['Wish_Name'] . '">
                            <div class="overlay"></div>
                        </div>
                        <!-- 刪除商品表單 -->
                        <form action="manage/Wish_php/delete_Wish.php" method="post" onsubmit="return confirmSubmission()">
                            <!-- 商品圖片和表單 -->
                            <input type="hidden" name="Wish_id" value="' . $row['Wish_id'] . '">
                        </form>

                        <!-- 商品名稱 -->
                        <div class="wish-name">' . $row['Wish_Name'] . '</div>
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
                    <h2>願望資訊</h2>
                    <p id="popup-buyer"></p>
                    <p id="popup-name"></p>
                    <p id="popup-date"></p>
                    <p id="popup-info"></p>
                </div>
                <button type="button" id="popup-delete" onclick="delWish()">刪除願望</button>
            </div>
        </div>


        <!-- Page -->
        <div id="pagination" class="pagination-container">
            <button onclick="prevPage()">上一頁</button>
            <span id="currentPage"></span>
            <button onclick="nextPage()">下一頁</button>
        </div>



        <!-- Js -->
        <script src="assets/js/Wish.js"></script>
        <script src="assets/js/alert.js"></script>
</body>

</html>