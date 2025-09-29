<?php
    function PayCode() {
        return str_pad(random_int(0, 999999999999), 12, '0', STR_PAD_LEFT);
    }
    $Product_id = $_POST['Product_id'];
    $Buyer_id = $_SESSION['User_id'];
    $Number = $_POST['Number'];
    $Date = $_POST['Date'];
    $Address = $_POST['Address'];
    $Finished = 0;
    $Price = $_POST['Product_Price'] * $Number;
    $Pay = PayCode();
    require ('../pa.php');

    $sql = "INSERT INTO place_order (Product_id, Buyer_id, Number, Date, Address, Price, Finished ,Pay) VALUES 
        ($Product_id, $Buyer_id, $Number, '$Date', '$Address', $Price, $Finished , $Pay)";
    $result = mysqli_query($link, $sql);

if ($result) {
    mysqli_close($link);
    echo '
        <script>
            localStorage.setItem("alertMessage", "下單成功！");
            window.location.href = "../../Product.php";
        </script>
    ';
} else {
    mysqli_close($link);
    echo '
        <script>
            localStorage.setItem("alertMessage", "下單失敗！");
            window.location.href = "../../Product.php";
        </script>
    ';
}
?>