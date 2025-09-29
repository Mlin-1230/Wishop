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
    $Wish_id = $_GET["Wish_id"];
    $sql = "SELECT 
        w.Wish_id,
        w.Wish_Name,
        w.Date,
        w.Address,
        w.Description,
        w.Image,
        u.Phone,
        u.Email,
        u.User_Name AS Buyer_Name,
        u.User_id AS Buyer_id
    FROM 
        Wish w
    LEFT JOIN 
        User u ON w.Buyer_id = u.User_id
    LEFT JOIN 
        Comment c ON w.Buyer_id = c.Buyer_id
    WHERE 
        w.Wish_id = '$Wish_id';";

    $result = mysqli_query($link, $sql);
    if ($row = mysqli_fetch_assoc($result)) {
        $Wish_Name = $row['Wish_Name'];
        $Address = $row['Address'];
        $Date = $row['Date'];
        $Buyer_Name = $row['Buyer_Name'];
        $Buyer_id = $row['Buyer_id'];
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
            <form action="manage/Wish_php/add_Order.php" method="post" id="checkout">
                <input type="hidden" id="Date" name="Date">
                <table class="Order-info" border="1">
                    <h2>願望資訊</h2>
                    <tr>
                        <th>許願編號</th>
                        <td><input type="text" name="Wish_id" value="<?php echo $Wish_id; ?>" readonly></td>
                        <th>許願者</th>
                        <td><input type="text" name="Buyer_Name" value="<?php echo $Buyer_Name; ?>" readonly></td>
                    </tr>
                        <th>願望名稱</th>
                        <td><input type="text" name="Wish_Name" value="<?php echo $Wish_Name; ?>" readonly></td>
                        <th>聯絡電話</th>
                        <td><input type="text" name="Phone" value="<?php echo $Phone ?>" readonly></td>
                    </tr>
                    <tr>
                        <th>許願者地址</th>
                        <td><input type="text" name="Address" value="<?php echo $Address; ?>" readonly></td>
                        <th>電子郵件</th>
                        <td><input type="text" name="Email" value="<?php echo $Email; ?>" readonly></td>
                    </tr>
                </table>
                <table class="Order-input" border="1">
                    <h2>必填資料</h2>
                    <tr>
                        <th>出價</th>
                        <td><input type="text" name="Wish_Price" placeholder="請輸入出價">
                        </td>
                    </tr>
                    <tr>
                    </tr>
                </table>
                <div style="float: right;">
                    <button type="button" class="cancel_btn" onclick="backWish()">取消</button>
                    <?php
                    if ($User_id == $Buyer_id) {
                        echo "你不能接取自己願望";
                    } else {
                        echo '<button type="submit" class="add_btn" onclick="return sendcheck()">接取願望</button>';
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>

    <!-- Js -->
    <script src="assets/js/sendcheck.js"></script>
    <script src="assets/js/Wish.js"></script>
    <script src="assets/js/alert.js"></script>
</body>

</html>