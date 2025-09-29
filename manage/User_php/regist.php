<?php
$Account = $_POST['Account'];
$Password = $_POST['Password'];
$Repassword = $_POST['Repassword'];
$User_Name = $_POST['User_Name'];
$Email = $_POST['Email'];
$Phone = $_POST['Phone'];
$Avatar = '../../assets/img/default.jpg';
if ($Password == $Repassword) {
    require ('../pa.php');
    $sql = "INSERT INTO user(Account,Password,User_Name,Email,Phone,Avatar) VALUES ('$Account', '$Password', '$User_Name', '$Email', '$Phone','$Avatar')";

    if (mysqli_query($link, $sql)) {
        mysqli_close($link);
        echo '
            <script>
                localStorage.setItem("alertMessage", "註冊成功！");
                window.location.href = "../../User/Login.html";
            </script>
        ';
    } 
} else {
    mysqli_close($link);
    echo '
        <script>
            localStorage.setItem("alertMessage", "註冊失敗！");
            window.location.href = "../../User/Regist.html";
        </script>
    ';
}
