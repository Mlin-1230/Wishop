<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>

    <!-- Css -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/addOrder.css">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/3daedf892a.js" crossorigin="anonymous"></script>

    <!-- PHP Setting -->
    <?php
    require ('manage/pa.php');
    $User_id = $_SESSION['User_id'];
    $Product_id = $_GET["Product_id"];
    $sql = "SELECT 
        p.Product_id,
        p.Product_Name,
        p.Product_Price,
        p.Date,
        p.Description,
        p.Image,
        u.User_Name AS Agent_Name,
        u.User_id AS Agent_id,
        u.Phone,
        u.Email
    FROM 
        Product p
    LEFT JOIN 
        User u ON p.Agent_id = u.User_id
    WHERE
        p.Product_id = '$Product_id';";
    $result = mysqli_query($link, $sql);
    if ($row = mysqli_fetch_assoc($result)) {
        $Product_Name = $row['Product_Name'];
        $Product_Price = $row['Product_Price'];
        $Date = $row['Date'];
        $Agent_Name = $row['Agent_Name'];
        $Phone = $row['Phone'];
        $Agent_id = $row['Agent_id'];
        $Phone = $row['Phone'];
        $Email = $row['Email'];
    }
    ?>
</head>

<body>
    <!-- Navbar -->
    <?php include "navbar.php"; ?>

    <div class="main">
        <div class="Order-form">
            <form action="manage/Product_php/add_Order.php" method="post" id="checkout">
                <input type="hidden" id="Date" name="Date">
                <table class="Order-info" border="1">
                    <h2>商品及代購方資訊</h2>
                    <tr>
                        <th>商品編號</th>
                        <td><input type="text" name="Product_id" value="<?php echo $Product_id; ?>" readonly></td>
                        <th>代購人</th>
                        <td><input type="text" name="Agent_Name" value="<?php echo $Agent_Name; ?>" readonly></td>
                    </tr>
                    <tr>
                        <th>商品名稱</th>
                        <td><input type="text" name="Product_Name" value="<?php echo $Product_Name; ?>" readonly></td>
                        <th>聯絡電話</th>
                        <td><input type="text" name="Phone" value="<?php echo $Phone ?>" readonly></td>
                    </tr>
                    <tr>
                        <th>價格</th>
                        <td><input type="text" name="Product_Price" value="<?php echo $Product_Price; ?>" readonly></td>
                        <th>電子郵件</th>
                        <td><input type="text" name="Email" value="<?php echo $Email ?>" readonly></td>
                    </tr>
                </table>
                <table class="Order-input" border="1">
                    <h2>購買人資訊(必填)</h2>
                    <tr>
                        <th>購買人</th>
                        <td><input type="text" name="Buyer_Name" value="<?php echo $_SESSION['User_Name'] ?>" readonly></td>
                    </tr>
                    <tr>
                        <th>訂購數量</th>
                        <td><input type="number" name="Number" value="1" min="1" required></td>
                    </tr>
                    <tr>
                        <th>送貨地址</th>
                        <td><input type="text" name="Address" required placeholder="請填寫地址"></td>
                    </tr>
                    <tr>
                        <th>繳費方式</th>
                        <td>
                            <select name="Pay">
                                <option value="7-11 IBON繳費">7-11 IBON繳費</option>
                                <option value="其他方式">其他方式</option>
                            </select>
                        </td>
                    </tr>
                </table>

                <div style="float: right;">
                    <button type="button" class="cancel_btn" onclick="backProduct()">取消</button>
                    <?php
                    if ($User_id == $Agent_id) {
                        echo "你不能對自己商品下單";
                    } else {
                        echo '<button type="submit" class="add_btn" onclick="return sendcheck()">送出訂單</button>';
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>
    <!-- Js -->
    <script src="assets/js/sendcheck.js"></script>
    <script src="assets/js/Product.js"></script>
    <script src="assets/js/alert.js"></script>
</body>

</html>