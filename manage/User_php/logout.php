<?php
$_SESSION['User_id'] = "";
$_SESSION['Account'] = "";
$_SESSION['User_Name'] = "";
$_SESSION['Email'] = "";
$_SESSION['Phone'] = "";
$_SESSION['Avatar'] = "";

echo '
    <script>
        localStorage.setItem("alertMessage", "登出成功！");
        window.location.href = "../../index.php";
    </script>
';
?>