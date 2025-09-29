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
    if (isset($_SESSION['User_id'])) {
        $User_id = $_SESSION['User_id'];
    }
    if (isset($_GET['keyword'])) {
        $Keyword = $_GET['keyword'];
        $sql = "SELECT 
        w.Wish_id,
        w.Wish_Name,
        w.Date,
        w.Description,
        w.Image,
        u.User_Name AS Buyer_Name
    FROM 
        Wish w
    LEFT JOIN 
        User u ON w.Buyer_id = u.User_id
    WHERE 
        w.Deleted = 0
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
        u.User_Name AS Buyer_Name
    FROM 
        Wish w
    LEFT JOIN 
        User u ON w.Buyer_id = u.User_id
    WHERE 
        w.Deleted = 0
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
            <!-- MyWish -->
            <?php
            if ((isset($_SESSION['User_id'])) and ($_SESSION['User_id'] != "")) {
                echo '<div class="MyWish" onclick="MyWish()">我的願望</div>';
            }
            ?>
            <!-- Search -->
            <input type="text" id="search" placeholder="搜尋..." onkeypress="searchWishes(event)">

        </div>

        <!-- Wish -->
        <div class="container">
            <?php
            foreach ($Wish as $row) {
                echo '
                    <div class="wish" onclick="showDetails(' .
                            $row['Wish_id'] . ', \'' .
                            $row['Buyer_Name'] . '\', \'' .
                            $row['Wish_Name'] . '\', \'' .
                            $row['Date'] . '\', \'' .
                            $row['Description'] . '\')">
                        <div class="wish-img">
                            <img src="manage/Wish_php/' . $row['Image'] . '" alt="' . $row['Wish_Name'] . '">
                            <div class="overlay"></div>
                        </div>
                        <div class="wish-name">' . $row['Wish_Name'] . '</div> <!-- 商品名稱 -->
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

                <!-- Login? -->
                <?php
                if (isset($_SESSION['User_id']) && !empty($_SESSION['User_id'])) {
                    echo '<button type="button" id="popup-order" onclick="TakeOrder()">接取願望並出價</button>';
                } else {
                    echo '<button type="button" id="popup-order" onclick="NoSession()">接取願望並出價</button>';
                }
                ?>
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
    <script src="assets/js/Wish.js"></script>
    <script src="assets/js/alert.js"></script>
</body>

</html>