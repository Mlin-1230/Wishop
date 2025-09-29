<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>忘記密碼</title>

    <!-- Css -->
    <link rel="stylesheet" href="../assets/css/Login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100..900&display=swap" rel="stylesheet">

    <!-- Alert -->
    <script src="../assets/js/alert.js"></script>

    <!-- PHP Setting -->
    <?php require ('../manage/pa.php');?>
</head>
<body>
<?php
    $Account = $_GET["Account"];
    $sql = "SELECT * FROM user WHERE Account='$Account'";
    $result = mysqli_query($link, $sql);
    if ($row = mysqli_fetch_array($result)) {
        $User_id = $row['User_id'];
        $Account = $row['Account'];
        $Email = $row['Email'];
        $Phone = $row['Phone'];
    }
    mysqli_close($link);
    ?>

    <div class="wrapper">
        <form action="../manage/User_php/reset.php?User_id=<?php echo $User_id;?>" method="post">
            <h1>重設密碼</h1>
            <div class="inputbox">
                <input type="text" name="Password" placeholder="請輸入新密碼" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="inputbox">
                <input type="text" name="Repassword" placeholder="請確認新密碼"required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <button type="submit" class="button">重設密碼</button>
        </form>


    </div>

</body>

</html>