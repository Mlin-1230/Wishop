<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="../../assets/js/alert.js"></script>
    <!-- Css -->
    <link rel="stylesheet" href="../../assets/css/Edit_Profile.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    include '../pa.php';
    if (isset($_GET['User_id']) && !empty($_GET['User_id'])) {
        $User_id = $_GET['User_id'];
        $sql="SELECT Password FROM user WHERE User_id = '$User_id'";
        $result=mysqli_query($link, $sql);
        if($row = mysqli_fetch_assoc($result)){
            $Password = $row['Password'];
        }
    }
    ?>
    <div class="container">
        
        <form action="../User_php/Edit.php" method="post" class="edit-profile-form">
        <input type="hidden" id="User_id" name="User_id" value="<?php echo $User_id?>">
        <input type="hidden" id="Password" name="Password" value="<?php echo $Password?>">
            <div class="form-group">
                <label for="Cpassword">輸入原密碼:</label>
                <input type="password" id="CPassword" name="CPassword" placeholder="輸入原密碼" required>
            </div>
            <div class="form-group">
                <label for="User_Name">輸入新暱稱:</label>
                <input type="text" id="User_Name" name="User_Name" placeholder="請輸入新暱稱(選填)">
            </div>
            <div class="form-group">
                <label for="NPassword">輸入新密碼:</label>
                <input type="Password" id="NPassword" name="NPassword" placeholder="請輸入新密碼(選填)">
            </div>
            <button type="submit" class="btn" onclick="return Edit_Profile()">修改資料</button>
        </form>
    </div>
</body>

</html>