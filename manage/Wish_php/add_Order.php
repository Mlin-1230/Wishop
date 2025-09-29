<?php
function PayCode() {
    return str_pad(random_int(0, 999999999999), 12, '0', STR_PAD_LEFT);
}
$Wish_id = $_POST['Wish_id'];
$Agent_id = $_SESSION['User_id'];
$Number = $_POST['Number'];
$Date = $_POST['Date'];
$Address = $_POST['Address'];
$Finished = -1;
$Price = $_POST['Wish_Price'];
$Pay = PayCode();
require('../pa.php');

$sql = "INSERT INTO take_order (Wish_id, Agent_id, Date, Address, Price, Finished, Pay) VALUES 
        ($Wish_id, $Agent_id, '$Date', '$Address', $Price, $Finished ,$Pay)";
$result = mysqli_query($link, $sql);

if ($result) {
    mysqli_close($link);
    echo '
        <script>
            localStorage.setItem("alertMessage", "接單成功！");
            window.location.href = "../../Wish.php";
        </script>
    ';
} else {
    mysqli_close($link);
    echo '
        <script>
            localStorage.setItem("alertMessage", "接單失敗！");
            window.location.href = "../../Wish.php";
        </script>
    ';
}
