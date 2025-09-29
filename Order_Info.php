<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>

    <!-- Css -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/Order_Info.css">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/3daedf892a.js" crossorigin="anonymous"></script>

    <!-- Finished -->
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
    if (isset($_GET['Place_Order_id'])) {
        $Place_Order_id = $_GET['Place_Order_id'];

        $sql = "SELECT p.Product_Name, o.Product_id,
                    agent.User_Name AS Agent_Name,
                    agent.Phone AS Agent_Phone,
                    buyer.User_Name AS Buyer_Name,
                    buyer.Phone AS Buyer_Phone,
                    o.Number, o.Price, o.Date, o.Finished ,o.Pay
                FROM place_order o
                JOIN product p ON o.Product_id = p.Product_id
                JOIN User AS agent ON p.Agent_id = agent.User_id
                JOIN User AS buyer ON o.Buyer_id = buyer.User_id
                WHERE o.Place_Order_id = $Place_Order_id;";
        $result = mysqli_query($link, $sql);
        if ($row = mysqli_fetch_assoc($result)) {
            $Name = $row['Product_Name'];
            $id = $row['Product_id'];
            $Buyer = $row['Buyer_Name'];
            $Buyer_Phone = $row['Buyer_Phone'];
            $Agent = $row['Agent_Name'];
            $Agent_Phone = $row['Agent_Phone'];
            $Number = $row['Number'];
            $Price = $row['Price'];
            $Date = $row['Date'];
            $Pay =$row['Pay'];
            $Finished = finished($row['Finished']);
        }
    } else {
        $Take_Order_id = $_GET['Take_Order_id'];

        $sql = "SELECT w.Wish_Name, o.Wish_id,
                    agent.User_Name AS Agent_Name,
                    agent.Phone AS Agent_Phone,
                    buyer.User_Name AS Buyer_Name,
                    buyer.Phone AS Buyer_Phone,
                    o.Price, o.Date, o.Finished ,o.Pay
                FROM take_order o
                JOIN wish w ON o.Wish_id = w.Wish_id
                JOIN User AS buyer ON w.Buyer_id = buyer.User_id
                JOIN User AS agent ON o.Agent_id = agent.User_id
                WHERE o.Take_Order_id = $Take_Order_id;";
        $result = mysqli_query($link, $sql);
        if ($row = mysqli_fetch_assoc($result)) {
            $Name = $row['Wish_Name'];
            $id = $row['Wish_id'];
            $Buyer = $row['Buyer_Name'];
            $Buyer_Phone = $row['Buyer_Phone'];
            $Agent = $row['Agent_Name'];
            $Agent_Phone = $row['Agent_Phone'];
            $Number = 1;
            $Price = $row['Price'];
            $Date = $row['Date'];
            $Pay =$row['Pay'];
            $Finished = finished($row['Finished']);
        }
    }

    ?>
</head>

<body>
    <!-- Navbar -->
    <?php include "navbar.php"; ?>

    <div class="main">
        <h1 style="text-align:center">訂單詳細資訊</h1>
        <div class="Order-container">
            <table class="Person-Info" border="1">
                <tr>
                    <th>購買人</th>
                    <td><?php echo $Buyer; ?></td>
                    <th>代購人</th>
                    <td><?php echo $Agent; ?></td>
                </tr>
                <tr>
                    <th>購買人電話</th>
                    <td><?php echo $Buyer_Phone; ?></td>
                    <th>代購人電話</th>
                    <td><?php echo $Agent_Phone; ?></td>
                </tr>
            </table>
            
            <table class="Order-Info" border="1">
                <tr>
                    <th>商品編號</th>
                    <td><?php echo $id; ?></td>
                    <th>商品名稱</th>
                    <td><?php echo $Name; ?></td>
                </tr>
                <tr>
                    <th>訂購數量</th>
                    <td><?php echo $Number; ?></td>
                    <th>總價格</th>
                    <td><?php echo $Price; ?></td>
                </tr>
                <tr>
                    <th>訂單日期</th>
                    <td><?php echo $Date; ?></td>
                    <th>狀態</th>
                    <td>
                        <?php
                        echo $Finished;
                        if (isset($Place_Order_id)) {
                            if ($Finished == "訂單待付款") {
                                if ($_SESSION['User_Name'] == $Buyer) {
                                    echo '<button class="btn cancel_btn" onclick="del_Product_Order(' . $Place_Order_id . ')">取消訂單</button>';
                                    echo '<tr>
                                        <th>'."繳費代碼:".'</th>
                                        <td>' . $Pay . '<button class="btn" onclick="Product_Payed(' . $Place_Order_id . ')">前往付款</button></td>
                                    </tr>';
                                } else {
                                    echo '<button class="btn cancel_btn" onclick="del_Product_Order(' . $Place_Order_id . ')">取消訂單</button>';
                                }
                            } else if ($Finished == "訂單已付款"){
                                if ($_SESSION['User_Name'] == $Agent){
                                    echo '<button class="btn" onclick="finish_Product_Order(' . $Place_Order_id . ')">物品已出貨</button>';
                                }                  
                            } else if ($Finished == "物品已出貨") {
                                if ($_SESSION['User_Name'] == $Buyer) {
                                    echo '<button class="btn" onclick="check_Product_Order(' . $Place_Order_id . ')">已收到貨品</button>';
                                }
                            }
                        } else {
                            if ($Finished == "願望待接受") {
                                if ($_SESSION['User_Name'] == $Buyer) {
                                    echo '<button class="btn accept_btn" onclick="accept_Wish_Order('  . $Take_Order_id . ')">接受出價</button>';
                                    echo '<button class="btn deny_btn" onclick="deny_Wish_Order('  . $Take_Order_id . ')">拒絕出價</button>';
                                } else if ($_SESSION['User_Name'] == $Agent) {
                                    echo '<button class="btn cancel_btn" onclick="del_Wish_Order(' . $Take_Order_id . ')">取消訂單</button>';
                                }
                            } else if ($Finished == "訂單待付款")  {
                                if ($_SESSION['User_Name'] == $Buyer) {
                                    echo '<button class="btn cancel_btn" onclick="del_Wish_Order(' . $Take_Order_id . ')">取消訂單</button>';
                                    echo '<tr>
                                        <th>'."繳費代碼:".'</th>
                                        <td>' . $Pay . '<button class="btn" onclick="Wish_Payed(' . $Take_Order_id . ')">前往付款</button></td>
                                    </tr>';
                                } else {
                                    echo '<button class="btn cancel_btn" onclick="del_Wish_Order(' . $Take_Order_id . ')">取消訂單</button>';
                                }
                            } else if ($Finished == "訂單已付款"){
                                if ($_SESSION['User_Name'] == $Agent){
                                    echo '<button class="btn" onclick="finish_Wish_Order(' . $Take_Order_id . ')">物品已出貨</button>';
                                }                  
                            } else if ($Finished == "物品已出貨") {
                                if ($_SESSION['User_Name'] == $Buyer) {
                                    echo '<button class="btn" onclick="check_Wish_Order(' . $Take_Order_id . ')">已收到貨品</button>';
                                }
                            }
                        }
                        ?>
                    </td>
                </tr>
            </table>
            <button class="back_btn" onclick="backOrder()">返回訂單</button>
        </div>
    </div>

    <!-- Js -->
    <script src="assets/js/Order.js"></script>
</body>

</html>