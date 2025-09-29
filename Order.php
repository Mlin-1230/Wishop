<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>訂單管理</title>

    <!-- Css -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/Order.css">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/3daedf892a.js" crossorigin="anonymous"></script>

    <!-- Function -->
    <?php
    function finished($Finished)
    {
        if ($Finished == -1) {
            return '願望待接受';
        } else if ($Finished == 0) {
            return '訂單待付款';
        } else if ($Finished == 1) {
            return '訂單已付款';
        } else if ($Finished == 2) {
            return '物品已出貨';
        } else if ($Finished == 3) {
            return '已收到貨品';
        } else {
            return '訂單已被取消';
        }
    }
    ?>

    <!-- PHP Setting -->
    <?php
    require('manage/pa.php');

    $User_id = $_SESSION['User_id'];

    require('manage/Order_sql.php')
    ?>

    <!-- Alert -->
    <script src="assets/js/alert.js"></script>
</head>

<body>
    <!-- Navbar -->
    <?php include "navbar.php"; ?>

    <div class="main">
        <!-- 分頁 -->
        <div class="tabs">
            <button class="tablinks" data-tab="allOrder_table">所有訂單</button>
            <button class="tablinks" data-tab="placeOrder_table">我購買的訂單</button>
            <button class="tablinks" data-tab="takeProduct_table">我接取的訂單</button>
            <button class="tablinks" data-tab="Bid_table">被出價的願望</button>
            <button class="tablinks" data-tab="Wait_table">待接受的願望</button>
            <button class="tablinks" data-tab="delOrder_table">已取消的訂單</button>
        </div>

        <!-- 所有訂單 -->
        <div id="allOrder_table" class="tabcontent">
            <div class="container">
                <h1>所有訂單</h1>
                <?php if ($Place_Product != null or $Take_Product != null or $Make_Wish != null or $Take_Wish != null or $Bid != null or $Wait != null) : ?>
                    <table id="all">
                        <thead>
                            <tr>
                                <th>商品&願望 編號</th>
                                <th>物品名稱</th>
                                <th>訂單日期</th>
                                <th>訂單狀態</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($Place_Product as $row) {
                                echo '<tr class="Product">
                                    <td>' . $row['Place_Order_id'] . '</td>
                                    <td>' . $row['Product_Name'] . '</td>
                                    <td>' . $row['Date'] . '</td>
                                    <td>' . finished($row['Finished']) . '</td>
                                </tr>';
                            }
                            foreach ($Take_Product as $row) {
                                echo '<tr class="Product">
                                    <td>' . $row['Place_Order_id'] . '</td>
                                    <td>' . $row['Product_Name'] . '</td>
                                    <td>' . $row['Date'] . '</td>
                                    <td>' . finished($row['Finished']) . '</td>
                                </tr>';
                            }
                            foreach ($Make_Wish as $row) {
                                echo '<tr class="Wish">
                                    <td>' . $row['Take_Order_id'] . '</td>
                                    <td>' . $row['Wish_Name'] . '</td>
                                    <td>' . $row['Date'] . '</td>
                                    <td>' . finished($row['Finished']) . '</td>
                                </tr>';
                            }
                            foreach ($Take_Wish as $row) {
                                echo '<tr class="Wish">
                                    <td>' . $row['Take_Order_id'] . '</td>
                                    <td>' . $row['Wish_Name'] . '</td>
                                    <td>' . $row['Date'] . '</td>
                                    <td>' . finished($row['Finished']) . '</td>
                                </tr>';
                            }
                            foreach ($Bid as $row) {
                                echo '<tr class="Wish">
                                    <td>' . $row['Take_Order_id'] . '</td>
                                    <td>' . $row['Wish_Name'] . '</td>
                                    <td>' . $row['Date'] . '</td>
                                    <td>' . finished($row['Finished']) . '</td>
                                </tr>';
                            }
                            foreach ($Wait as $row) {
                                echo '<tr class="Wish">
                                    <td>' . $row['Take_Order_id'] . '</td>
                                    <td>' . $row['Wish_Name'] . '</td>
                                    <td>' . $row['Date'] . '</td>
                                    <td>' . finished($row['Finished']) . '</td>
                                </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <p class="NoData">目前沒有任何訂單紀錄</p>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- 我購買的訂單 -->
        <div id="placeOrder_table" class="tabcontent">
            <div class="container">
                <h1>我購買的訂單</h1>
                <?php if ($Place_Product != null or $Make_Wish != null) : ?>
                    <table id="place">
                        <thead>
                            <tr>
                                <th>商品&願望 編號</th>
                                <th>物品名稱</th>
                                <th>訂單日期</th>
                                <th>訂單狀態</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($Place_Product as $row) {
                                if ($row['Buyer_id'] == $User_id) {
                                    echo '<tr class="Product">
                                        <td>' . $row['Place_Order_id'] . '</td>
                                        <td>' . $row['Product_Name'] . '</td>
                                        <td>' . $row['Date'] . '</td>
                                        <td>' . finished($row['Finished']) . '</td>
                                    </tr>';
                                }
                            }
                            foreach ($Make_Wish as $row) {
                                if ($row['Buyer_id'] == $User_id) {
                                    echo '<tr class="Wish">
                                        <td>' . $row['Take_Order_id'] . '</td>
                                        <td>' . $row['Wish_Name'] . '</td>
                                        <td>' . $row['Date'] . '</td>
                                        <td>' . finished($row['Finished']) . '</td>
                                    </tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <p class="NoData">目前沒有任何訂單紀錄</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- 我接取的訂單 -->
        <div id="takeProduct_table" class="tabcontent">
            <div class="container">
                <h1>我接取的訂單</h1>
                <?php if ($Take_Product != null or $Take_Wish != null) : ?>
                    <table id="takeOrder">
                        <thead>
                            <tr>
                                <th>商品&願望 編號</th>
                                <th>物品名稱</th>
                                <th>訂單日期</th>
                                <th>訂單狀態</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($Take_Product as $row) {
                                if ($row['Agent_id'] == $User_id) {
                                    echo '<tr class="Product">
                                        <td>' . $row['Place_Order_id'] . '</td>
                                        <td>' . $row['Product_Name'] . '</td>
                                        <td>' . $row['Date'] . '</td>
                                        <td>' . finished($row['Finished']) . '</td>
                                    </tr>';
                                }
                            }
                            foreach ($Take_Wish as $row) {
                                if ($row['Agent_id'] == $User_id) {
                                    echo '<tr class="Wish">
                                        <td>' . $row['Take_Order_id'] . '</td>
                                        <td>' . $row['Wish_Name'] . '</td>
                                        <td>' . $row['Date'] . '</td>
                                        <td>' . finished($row['Finished']) . '</td>
                                    </tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <p class="NoData">目前沒有任何訂單紀錄</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- 被出價的願望 -->
        <div id="Bid_table" class="tabcontent">
            <div class="container">
                <h1>被出價的願望</h1>
                <?php if ($Bid != null) : ?>
                    <table id="bid">
                        <thead>
                            <tr>
                                <th>願望 編號</th>
                                <th>願望名稱</th>
                                <th>許願日期日期</th>
                                <th>訂單狀態</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($Bid as $row) {
                                if ($row['Buyer_id'] == $User_id) {
                                    echo '<tr class="Wish">
                                        <td>' . $row['Take_Order_id'] . '</td>
                                        <td>' . $row['Wish_Name'] . '</td>
                                        <td>' . $row['Date'] . '</td>
                                        <td>' . finished($row['Finished']) . '</td>
                                    </tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <p class="NoData">目前沒有任何願望被接取</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- 待接受的願望 -->
        <div id="Wait_table" class="tabcontent">
            <div class="container">
                <h1>待接受的願望</h1>
                <?php if ($Wait != null) : ?>
                    <table id="wait">
                        <thead>
                            <tr>
                                <th>願望 編號</th>
                                <th>願望名稱</th>
                                <th>許願日期日期</th>
                                <th>訂單狀態</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($Wait as $row) {
                                if ($row['Agent_id'] == $User_id) {
                                    echo '<tr class="Wish">
                                        <td>' . $row['Take_Order_id'] . '</td>
                                        <td>' . $row['Wish_Name'] . '</td>
                                        <td>' . $row['Date'] . '</td>
                                        <td>' . finished($row['Finished']) . '</td>
                                    </tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <p class="NoData">目前沒有任何願望被接取</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- 已取消的訂單 -->
        <div id="delOrder_table" class="tabcontent">
            <div class="container">
                <h1>已取消的願望</h1>
                <?php if ($b_del_Product != null or $b_del_Wish != null or $a_del_Product != null or $a_del_Wish != null) : ?>
                    <table id="del">
                        <thead>
                            <tr>
                                <th>願望 編號</th>
                                <th>願望名稱</th>
                                <th>許願日期日期</th>
                                <th>訂單狀態</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($b_del_Product as $row) {
                                echo '<tr class="Product">
                                    <td>' . $row['Place_Order_id'] . '</td>
                                    <td>' . $row['Product_Name'] . '</td>
                                    <td>' . $row['Date'] . '</td>
                                    <td>' . finished($row['Finished']) . '</td>
                                </tr>';
                            }
                            foreach ($a_del_Product as $row) {
                                echo '<tr class="Product">
                                    <td>' . $row['Place_Order_id'] . '</td>
                                    <td>' . $row['Product_Name'] . '</td>
                                    <td>' . $row['Date'] . '</td>
                                    <td>' . finished($row['Finished']) . '</td>
                                </tr>';
                            }
                            foreach ($b_del_Wish as $row) {
                                echo '<tr class="Wish">
                                    <td>' . $row['Take_Order_id'] . '</td>
                                    <td>' . $row['Wish_Name'] . '</td>
                                    <td>' . $row['Date'] . '</td>
                                    <td>' . finished($row['Finished']) . '</td>
                                </tr>';
                            }
                            foreach ($a_del_Wish as $row) {
                                echo '<tr class="Wish">
                                    <td>' . $row['Take_Order_id'] . '</td>
                                    <td>' . $row['Wish_Name'] . '</td>
                                    <td>' . $row['Date'] . '</td>
                                    <td>' . finished($row['Finished']) . '</td>
                                </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <p class="NoData">目前沒有任何訂單被取消</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Js -->
    <script src="assets/js/Order.js"></script>
</body>

</html>