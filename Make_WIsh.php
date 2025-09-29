<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Css -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/Launch.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet' id="checkout">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <?php include "navbar.php"; ?>

    <div class="main">
        <div class="container">
            <h1><i class='bx bx-plus-circle'></i> 許願</h1>
            <form action="manage/Wish_php/add_Wish.php" method="post" enctype="multipart/form-data" id="checkout">
                <div class="form-group">
                    <label for="Wish_Name">願望名稱：</label>
                    <input type="text" id="Wish_Name" name="Wish_Name" required>
                </div>
                <div class="form-group">
                    <label for="Address">地址：</label>
                    <input type="text" id="Address" name="Address" required>
                </div>
                <div class="form-group">
                    <label for="Description">描述：</label>
                    <textarea id="Description" name="Description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="Image">圖片： <span class="aware">(如果上傳圖片長寬不等，格式可能會有所改變)</span></label>
                    <input type="file" id="Image" name="Image" accept="image/*">
                </div>
                <input type="hidden" id="Date" name="Date">
                <div style="float: right;">
                    <button type="button" class="cancel_btn" onclick="backMyWish()">取消</button>
                    <button type="submit" class="add_btn" onclick="return sendcheck()">許下願望</button>
                </div>
            </form>
        </div>
    </div>
    <script>
function sendcheck() {
    var inputUDate = document.getElementById("Date");

    let date = new Date();
    const checkdate = date.toISOString().split('T')[0];

    inputUDate.value = checkdate;

    return addWish_Check();
}
</script>
    <!-- Js -->
    <script src="assets/js/Wish.js"></script>
    <script src="assets/js/alert.js"></script>
</body>
</html>