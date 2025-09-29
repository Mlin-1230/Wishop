<?php
$Take_Order_id = $_GET['Take_Order_id'];

require ('../pa.php');

$sql = "UPDATE take_order SET Finished = 1 WHERE Take_Order_id='$Take_Order_id'";
if (mysqli_query($link, $sql)) {
    mysqli_close($link);
    echo '
        <script>
            localStorage.setItem("alertMessage", "訂單已更新！");
            window.location.href = "../../Order.php";
        </script>
    ';
} else {
    mysqli_close($link);
    echo '
        <script>
            localStorage.setItem("alertMessage", "訂單更新失敗！");
            window.location.href = "../../Order.php";
        </script>
    ';
}
?>