<?php
$Product_id = $_GET['Product_id'];

require ('../pa.php');

$sql = "UPDATE product SET Deleted = 1 WHERE Product_id = $Product_id";
if (mysqli_query($link, $sql)) {
    mysqli_close($link);
    echo '
        <script>
            localStorage.setItem("alertMessage", "刪除成功！");
            window.location.href = "../../MyProduct.php";
        </script>
    ';
} else {
    mysqli_close($link);
    echo '
        <script>
            localStorage.setItem("alertMessage", "刪除失敗！");
            window.location.href = "../../MyProduct.php";
        </script>
    ';
}
?>