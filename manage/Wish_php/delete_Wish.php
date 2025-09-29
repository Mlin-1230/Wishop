<?php
$Wish_id = $_GET['Wish_id'];

require ('../pa.php');

$sql = "UPDATE wish SET Deleted = 1 WHERE Wish_id = $Wish_id";
if (mysqli_query($link, $sql)) {
    mysqli_close($link);
    echo '
        <script>
            localStorage.setItem("alertMessage", "刪除成功！");
            window.location.href = "../../MyWish.php";
        </script>
    ';
} else {
    mysqli_close($link);
    echo '
        <script>
            localStorage.setItem("alertMessage", "刪除失敗！");
            window.location.href = "../../MyWish.php";
        </script>
    ';
}
?>