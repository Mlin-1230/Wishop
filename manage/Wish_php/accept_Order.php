<?php
$Take_Order_id = $_GET['Take_Order_id'];
function PayCode() {
    return str_pad(random_int(0, 999999999999), 12, '0', STR_PAD_LEFT);
}
$Pay = PayCode();

require ('../pa.php');

$sql = "UPDATE take_order SET Finished = 0 , Pay = $Pay WHERE Take_Order_id='$Take_Order_id'";
if (mysqli_query($link, $sql)) {
    mysqli_close($link);
    echo '
        <script>
            localStorage.setItem("alertMessage", "已接受出價！");
            window.location.href = "../../Order.php";
        </script>
    ';
} else {
    mysqli_close($link);
    echo '
        <script>
            localStorage.setItem("alertMessage", "接受失敗！");
            window.location.href = "../../Order.php";
        </script>
    ';
}
?>