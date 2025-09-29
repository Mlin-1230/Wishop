<?php
$User_id = $_POST["User_id"];
$Password = $_POST['Password'];
$Repassword = $_POST['Repassword'];
if ($Password == $Repassword) {
    require ('../pa.php');
    $sql = "UPDATE user SET Password='$Password' WHERE User_id='$User_id'";

    if (mysqli_query($link, $sql)) {
        mysqli_close($link);
        echo '
            <script>
                localStorage.setItem("alertMessage", "重設成功！");
                window.location.href = "../../User/Login.html";
            </script>
        ';
    } 
} else {
    mysqli_close($link);
        echo '
            <script>
                localStorage.setItem("alertMessage", "重設失敗！");
                window.location.href = "../../User/Reset.php?Account=' . $Account . '";
            </script>
        ';
}
?>