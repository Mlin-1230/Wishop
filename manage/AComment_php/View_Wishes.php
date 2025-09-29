<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/css/View.css">
    <!-- Js -->
    <script src="../../assets/js/view.js"></script>
    <script src="../../assets/js/alert.js"></script>


</head>


<?php
    $Agent_id = $_GET['Agent_id'];
?>

<?php
include '../pa.php';
$OrderMethod = isset($_GET['OrderMethod']) ? $_GET['OrderMethod'] : 'Wish_id';
$OrderDirection = isset($_GET['OrderDirection']) ? $_GET['OrderDirection'] : 'DESC'; 
$sql = "SELECT 
w.Wish_id,
w.Wish_Name,
w.Date,
w.Description,
w.Image,
u.User_Name AS Buyer_Name,
c.Score,
COUNT(o.Wish_id) as waiting
FROM 
Wish w
LEFT JOIN 
Take_order o ON w.Wish_id = o.Wish_id AND o.Finished = -1
LEFT JOIN 
User u ON w.Buyer_id = u.User_id
LEFT JOIN 
Comment c ON w.Buyer_id = c.Buyer_id
WHERE 
w.Deleted = 0
AND w.Buyer_id = $Agent_id
GROUP BY
w.Wish_id,
w.Wish_Name,
w.Date,
w.Description,
w.Image,
u.User_Name
ORDER BY
$OrderMethod $OrderDirection;";
$result = mysqli_query($link, $sql);

$Wish = array();
while ($row = mysqli_fetch_assoc($result)) {
    $Wish[] = $row;
}
?>

<body>
    <div class="main">
        <div class="container">
            <!-- Sort buttons -->
            <div class="sort-buttons">
                <button onclick="sortByPrice()">依出價數排序</button>
                <button onclick="sortByName()">依名稱排序</button>
                <button onclick="sortByDate()">依許願日期排序</button>
                <button class="sort" onclick="Sort()">▲▼</button>
            </div>
            <div id="getID" Agent_id="<?php echo $Agent_id; ?>"></div>


            <!-- Wishes -->
            <?php
            foreach ($Wish as $row) {
                echo '
                <div class="product">
                    <div class="product-img">
                        <img src="../../manage/Wish_php/' . $row['Image'] . '" alt="' . $row['Wish_Name'] . '">
                    </div>
                    <div class="product-info">
                        <h3>' . $row['Wish_Name'] . '</h3>
                        <p>許願日期：' . $row['Date'] . '</p>
                        <p>出價數:' . $row['waiting'] . '</p>

                    </div>
                </div>
                ';
            }
            ?>

        </div>
    </div>

    <!-- Page -->
    <div id="pagination" class="pagination-container">
        <button onclick="prevPage()">上一頁</button>
        <span id="currentPage"></span>
        <button onclick="nextPage()">下一頁</button>
    </div>
    </div>

</body>


<script>
    var Agent_id = '<?php echo $Agent_id; ?>';
    var OrderMethod = '<?php echo $OrderMethod; ?>';
    var OrderDirection = '<?php echo $OrderDirection; ?>';


    function sortByPrice() {
        window.location.href = 'View_Wishes.php?Agent_id=' + Agent_id + '&OrderMethod=waiting';
    }

    function sortByName() {
        window.location.href = 'View_Wishes.php?Agent_id=' + Agent_id + '&OrderMethod=Wish_Name';
    }

    function sortByDate() {
        window.location.href = 'View_Wishes.php?Agent_id=' + Agent_id + '&OrderMethod=Date';
    }

    function Sort() {
        var COrderDirection = '<?php echo $OrderDirection === "ASC" ? "ASC" : "DESC"; ?>';
        var NOrderDirection = COrderDirection === "ASC" ? "DESC" : "ASC";
        window.location.href = 'View_Wishes.php?Agent_id=' + Agent_id + '&OrderMethod=' + OrderMethod + '&OrderDirection=' + NOrderDirection;
    }
</script>

</html>