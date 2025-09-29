<?php
$User_id = $_POST["User_id"];
$User_Name = $_POST['User_Name'];
$Password = $_POST['Password'];
$CPassword = $_POST['CPassword'];
$NPassword = $_POST['NPassword'];
include '../pa.php';
if ($Password !== $CPassword) {
    mysqli_close($link);
    echo '
        <script>
            localStorage.setItem("alertMessage", "密碼有誤！");
            window.location.href = "../Comment_php/Edit_Profile.php?User_id=' . $User_id . '";
        </script>
    ';
    exit;
}elseif($Password === $NPassword){
    mysqli_close($link);
    echo '
        <script>
            localStorage.setItem("alertMessage", "密碼不能與原密碼重複！");
            window.location.href = "../Comment_php/Edit_Profile.php?User_id=' . $User_id . '";
        </script>
    ';
    exit;
} else {
    if (!empty($User_Name) && !empty($NPassword)) {
        $sql = "UPDATE user SET Password='$NPassword', User_Name='$User_Name' WHERE User_id='$User_id'";
    } elseif (!empty($User_Name)) {
        $sql = "UPDATE user SET User_Name='$User_Name' WHERE User_id='$User_id'";
    } elseif (!empty($NPassword)) {
        $sql = "UPDATE user SET Password='$NPassword' WHERE User_id='$User_id'";
    } else {
        echo '
        <script>
            localStorage.setItem("alertMessage", "沒有欲修改的資料！");
            window.location.href = "../Comment_php/Edit_Profile.php?User_id=' . $User_id . '";
        </script>
    ';
    exit;
    }
    if (mysqli_query($link, $sql)) {
        mysqli_close($link);
        echo '
            <script>
                localStorage.setItem("alertMessage", "修改成功！");
                window.location.href = "../Comment_php/Edit_Profile.php?User_id=' . $User_id . '";
            </script>
        ';
    } else {
        mysqli_close($link);
        echo '
            <script>
                localStorage.setItem("alertMessage", "修改失敗！");
                window.location.href = "../Comment_php/Edit_Profile.php?User_id=' . $User_id . '";
            </script>
        ';
    }
}
?>
