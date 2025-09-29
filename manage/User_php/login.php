<?php
session_start();
$Account = $_POST['Account'];
$Password = $_POST['Password'];

require ('../pa.php');
$sql = "SELECT DISTINCT * FROM User WHERE Account = '$Account' and Password = '$Password'";
$result = mysqli_query($link, $sql);
if ($row = mysqli_fetch_assoc($result)) {
    $_SESSION['User_id'] = $row['User_id'];
    $_SESSION['Account'] = $Account;
    $_SESSION['User_Name'] = $row['User_Name'];
    $_SESSION['Email'] = $row['Email'];
    $_SESSION['Phone'] = $row['Phone'];
    $_SESSION['Avatar'] = $row['Avatar'];
    mysqli_close($link);
    echo '
        <script>
            localStorage.setItem("alertMessage", "你好！ ' . $_SESSION['User_Name'] . '");
            window.location.href = "../../Product.php";
        </script>
    ';
} else {
    mysqli_close($link);
    echo '
        <script>
            localStorage.setItem("alertMessage", "登入失敗！");
            window.location.href = "../../User/Login.html";
        </script>
    ';
}
?>