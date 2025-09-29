<?php
$Account = $_POST['Account'];
$Email = $_POST['Email'];
$Phone = $_POST['Phone'];
include '../pa.php';
$sql = "SELECT * FROM user WHERE Account = '$Account'";
$result = mysqli_query($link, $sql);
if ($row = mysqli_fetch_array($result)) {
    $dbEmail = $row['Email'];
    $dbPhone = $row['Phone'];
}

if ($dbEmail == $Email and $dbPhone == $Phone) {
    mysqli_close($link);
    header("Location: ../../User/Reset.php?Account=$Account");
} else {
    mysqli_close($link);
        echo '
            <script>
                localStorage.setItem("alertMessage", "資料有誤！");
                window.location.href = "../../User/Forget.html";
            </script>
        ';
}
