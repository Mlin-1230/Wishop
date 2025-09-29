<?php
$Take_Order_id = $_GET['Take_Order_id'];

require('../pa.php');

$sql = "UPDATE take_order SET Finished = 3 WHERE Take_Order_id='$Take_Order_id'";
if (mysqli_query($link, $sql)) {
    $sql_update_wish = "UPDATE wish SET Deleted = 1 WHERE Wish_id = (SELECT Wish_id FROM take_order WHERE Take_Order_id = '$Take_Order_id')";
    require('../pa.php');
    mysqli_query($link, $sql_update_wish);
    mysqli_close($link);
    echo '
    <script>
        localStorage.setItem("alertMessage", "請填寫您的評價！");
        window.location.href = "../../Write_Comment.php?Take_Order_id=' . $Take_Order_id . '";
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
