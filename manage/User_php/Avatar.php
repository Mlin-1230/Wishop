<?php
// 引入数据库连接文件
require('../pa.php');

$User_id = $_POST['User_id'];

$target_dir = "../../assets/img/";



// 处理图片上传
$image_path = "";
if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {

    $image_name = $_FILES['image']['name'];

    $timestamp = time();
    $unique_name = $timestamp . '_' . basename($image_name);

    $image_path = $target_dir . $unique_name;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $image_path)) {


        $sql = "UPDATE user SET Avatar = '$image_path' WHERE User_id = '$User_id'";

        if (mysqli_query($link, $sql)) {
            $_SESSION['Avatar'] = $image_path;
            echo '
                <script>
                    localStorage.setItem("alertMessage", "修改成功！");
                    window.location.href = "../../Personal.php";
                </script>
            ';
        } else {
            echo '
                <script>
                    localStorage.setItem("alertMessage", "修改失敗！");
                    window.location.href = "../../Personal.php";
                </script>
            ';
        }
    } else {
        echo '
            <script>
                localStorage.setItem("alertMessage", "上傳圖片失敗！");
                window.location.href = "../../Personal.php";
            </script>
        ';
    }
} else {
    echo '
        <script>
            localStorage.setItem("alertMessage", "上傳圖片失敗！");
            window.location.href = "../../Personal.php";
        </script>
    ';
}

mysqli_close($link);
