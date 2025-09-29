<?php
$Take_Order_id = $_GET['Take_Order_id'];

require ('../pa.php');

$sql = "UPDATE take_order SET Finished = 4 WHERE Take_Order_id='$Take_Order_id'";
if (mysqli_query($link, $sql)) {
    mysqli_close($link);
    echo '
        <script>
            localStorage.setItem("alertMessage", "已拒絕出價！");
            window.location.href = "../../Order.php";
        </script>
    ';
} else {
    mysqli_close($link);
    echo '
        <script>
            localStorage.setItem("alertMessage", "拒絕失敗！");
            window.location.href = "../../Order.php";
        </script>
    ';
}
?>