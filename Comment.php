<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>個人頁面</title>

    <!-- Css -->
    <!-- <link rel="stylesheet" href="assets/css/main.css"> -->
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/Personal.css">


    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/3daedf892a.js" crossorigin="anonymous"></script>
</head>


<body>
    <!-- Navbar -->
    <?php include "navbar.php"; ?>
    <?php
    $Agent_id = $_GET['Agent_id'];
    require('manage/pa.php');
    //資料查詢
    $Usql ="SELECT Account,User_Name,Avatar,Email,Phone FROM user WHERE User_id=$Agent_id";
    $result = mysqli_query($link, $Usql);
    if($row = mysqli_fetch_assoc($result)){
        $Account = $row['Account'];
        $User_Name=$row['User_Name'];
        $Avatar=$row['Avatar'];
        $Email=$row['Email'];
        $Phone=$row['Phone'];
    }
    //評論查詢
    $Csql = "SELECT
            c.Comment_id,
            u.User_Name AS Buyer_Name,
            c.Score,
            c.Product_Name,
            c.Comment,
            c.Date
        FROM
            Comment c
        LEFT JOIN
            User u ON c.Buyer_id = u.User_id
        WHERE
            c.Agent_id = $Agent_id
        ORDER BY
            c.Comment_id DESC;";
    $result = mysqli_query($link, $Csql);
    $comments = [];
    $sumScores = 0; // 總評分
    $numReviews = 0; // 評價數

    while ($row = mysqli_fetch_assoc($result)) {
        $comments[] = $row;
        // 將評分加到總分數中
        $sumScores += $row['Score'];
        // 增加評價數
        $numReviews++;
    }
    // 計算評論平均評分
    $averageScore = $numReviews > 0 ? $sumScores / $numReviews : 0;

    //商品查詢
    $Psql = "SELECT COUNT(*) AS numProducts FROM Product WHERE Agent_id = $Agent_id";
    $result = mysqli_query($link, $Psql);
    $row = mysqli_fetch_assoc($result);
    $numProducts = $row['numProducts'];

    //願望查詢
    $Wsql = "SELECT COUNT(*) AS numWishes FROM Wish WHERE Buyer_id = $Agent_id";
    $result = mysqli_query($link, $Wsql);
    $row = mysqli_fetch_assoc($result);
    $numWishes = $row['numWishes'];

    //接取訂單數
    $TOsql = "SELECT COUNT(*) AS numTakeOrders
        FROM take_order
        WHERE Agent_id = $Agent_id
        AND Finished NOT IN (-1, 3, 4)";
    $result = mysqli_query($link, $TOsql);
    $row = mysqli_fetch_assoc($result);
    $numTakeOrders = $row['numTakeOrders'];

    $POsql="SELECT COUNT(*) AS numPlaceOrders
    FROM place_order o JOIN product p
    ON o.Product_id = p.Product_id
    WHERE Agent_id = $Agent_id
    AND Finished NOT IN (3, 4);";
    $result = mysqli_query($link, $POsql);
    $row = mysqli_fetch_assoc($result);
    $numPlaceOrders = $row['numPlaceOrders'];

    $TotalOrders=$numTakeOrders+$numPlaceOrders;
    ?>
    
    <div class="container">
        <div class="profile">
            <div class="profile-picture-container">
                <img src="manage/User_php/<?php echo $Avatar ?>" alt="Profile Picture" class="profile-picture">
            </div>
            <div class="profile-info">
                <table>
                    <tr class="title">
                        <td colspan="4" class="section-header"><i class="fa-solid fa-user">他的帳號資訊</td>
                    </tr>
                    <tr>
                        <td>帳號:</td>
                        <td><?php echo $Account ?></td>
                        <td>暱稱:</td>
                        <td><?php echo $User_Name ?></td>
                    </tr>
                    <tr>
                        <td>手機:</td>
                        <td><?php echo $Phone ?></td>
                        <td>信箱:</td>
                        <td><?php echo $Email?></td>
                    </tr>
                    <tr class="title">
                        <td colspan="4" class="section-header"><i class="fa-solid fa-cart-shopping">他的賣場資訊</td>
                    </tr>
                    <tr>
                        <td>商品數量:</td>
                        <td><?php echo $numProducts ?></td>
                        <td>現在許願數量:</td>
                        <td><?php echo $numWishes ?></td>
                    </tr>
                    <tr>
                        <td>評價:</td>
                        <td>
                            <div class="rating">
                                <span>★</span><?php echo round($averageScore,1) ?>(<?php echo $numReviews ?>則評論)
                            </div>
                        </td>
                        <td>正接取訂單數:</td>
                        <td><?php echo $TotalOrders ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="options">
            <div class="option" id="view-products">他的商品</div>
            <div class="option" id="view-wishes">他的願望</div>
            <div class="option" id="view-reviews">他的評論</div>
        </div>
        <iframe src="manage/AComment_php/View_Products.php?Agent_id=<?php echo $Agent_id; ?>" id="iframe-content" frameborder="0" width="100%" height="1100"></iframe>
        <div id="getID" Agent_id="<?php echo $Agent_id; ?>"></div>
        <div id="getID" User_id="<?php echo $User_id; ?>"></div>
    </div>

    <!-- Js -->
    <script src="assets/js/alert.js"></script>
    <script src="assets/js/Apersonal.js"></script>

</body>

</html>