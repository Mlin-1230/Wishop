<?php
$Place_Order_id = $_GET['Place_Order_id'];

require ('../pa.php');

$sql = "UPDATE place_order SET Finished = 3 WHERE Place_Order_id='$Place_Order_id'";
if (mysqli_query($link, $sql)) {
    mysqli_close($link);
    echo '
        <script>
            localStorage.setItem("alertMessage", "請填寫您的評價！");
            window.location.href = "../../Write_Comment.php?Place_Order_id=' . $Place_Order_id . '";
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
