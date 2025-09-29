<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Css -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/Launch.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <?php include "navbar.php"; ?>

    <div class="main">
            <h1><i class='bx bx-plus-circle' ></i>新增商品</h1>
            <form action="manage/Product_php/add_Product.php" method="post" enctype="multipart/form-data" id="checkout">
                <div class="form-group">
                    <label for="Product_Name">商品名稱：</label>
                    <input type="text" id="Product_Name" name="Product_Name" required>
                </div>
                <div class="form-group">
                    <label for="Product_Price">價格：</label>
                    <input type="text" id="Product_Price" name="Product_Price"  required>
                </div>
                <div class="form-group">
                    <label for="Date">預計到貨日期：</label>
                    <input type="text" id="Date" name="Date" placeholder="XXXX-XX-XX">
                </div>
                <div class="form-group">
                    <label for="Description">描述：</label>
                    <textarea id="Description" name="Description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="image">圖片： <span class="aware">(如果上傳圖片長寬不等，格式可能會有所改變)</span></label>
                    <input type="file" id="Image" name="Image" accept="Image/*">
                </div>
                <input type="hidden" id="UDate" name="UDate">
                <div style="float: right;">
                    <button type="button" class="cancel_btn" onclick="backMyProduct()">取消</button>
                    <button type="submit" class="add_btn" onclick="return sendcheck()">新增商品</button>
                </div>
            </form>
        </div>
    
    <!-- Js -->
    <script src="assets/js/sendcheck.js"></script>
    <script src="assets/js/Product.js"></script>
    <script src="assets/js/alert.js"></script>
</body>
</html>