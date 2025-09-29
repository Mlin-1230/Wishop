<?php
$Place_Order_id = $_GET['Place_Order_id'];

require ('../pa.php');

$sql = "UPDATE place_order SET Finished = 4 WHERE Place_Order_id='$Place_Order_id'";
if (mysqli_query($link, $sql)) {
    mysqli_close($link);
    echo '
        <script>
            localStorage.setItem("alertMessage", "退單成功！");
            window.location.href = "../../Order.php";
        </script>
    ';
} else {
    mysqli_close($link);
    echo '
        <script>
            localStorage.setItem("alertMessage", "退單失敗！");
            window.location.href = "../../Order.php";
        </script>
    ';
}
?>