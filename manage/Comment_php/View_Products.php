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
if (isset($_GET['User_id']) && !empty($_GET['User_id'])) {
    $User_id = $_GET['User_id'];
}
?>

<?php
include '../pa.php';
$OrderMethod = isset($_GET['OrderMethod']) ? $_GET['OrderMethod'] : 'Product_id';
$OrderDirection = isset($_GET['OrderDirection']) ? $_GET['OrderDirection'] : 'DESC'; 
$sql = "SELECT 
    p.Product_id,
    p.Product_Name,
    p.Product_Price,
    p.Date,
    p.Description,
    p.Image,
    p.UDate,
    u.User_Name AS Agent_Name,
    c.Score
FROM 
    Product p
LEFT JOIN 
    User u ON p.Agent_id = u.User_id
LEFT JOIN 
    Comment c ON c.Agent_id = p.Agent_id
WHERE
    p.Deleted = 0
    AND p.Agent_id = $User_id
GROUP BY
    p.Product_id,
    p.Product_Name,
    p.Product_Price,
    p.Date,
    p.Description,
    p.Image,
    p.UDate,
    u.User_Name
ORDER BY
    $OrderMethod $OrderDirection;";
$result = mysqli_query($link, $sql);

$Product = array();
while ($row = mysqli_fetch_assoc($result)) {
    $Product[] = $row;
}
?>

<body>
    <div class="main">
        <div class="container">
            <!-- Sort buttons -->
            <div class="sort-buttons">
                <button onclick="sortByPrice()">依價格排序</button>
                <button onclick="sortByName()">依名稱排序</button>
                <button onclick="sortByDate()">依上架日期排序</button>
                <button class="sort" onclick="Sort()">▲▼</button>
            </div>
            <div id="getID" User_id="<?php echo $User_id; ?>"></div>


            <!-- Products -->
            <?php
            foreach ($Product as $row) {
                echo '
                <div class="product">
                    <div class="product-img">
                        <img src="../../manage/Product_php/' . $row['Image'] . '" alt="' . $row['Product_Name'] . '">
                    </div>
                    <div class="product-info">
                        <h3>' . $row['Product_Name'] . '</h3>
                        <p>價格：' . $row['Product_Price'] . '</p>
                        <p>上架日期：' . $row['UDate'] . '</p>
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
    var User_id = '<?php echo $User_id; ?>';
    var OrderMethod = '<?php echo $OrderMethod; ?>';
    var OrderDirection = '<?php echo $OrderDirection; ?>';
    

    function sortByPrice() {
        window.location.href = 'View_Products.php?User_id=' + User_id + '&OrderMethod=Product_Price';
    }

    function sortByName() {
        window.location.href = 'View_Products.php?User_id=' + User_id + '&OrderMethod=Product_Name';
    }

    function sortByDate() {
        window.location.href = 'View_Products.php?User_id=' + User_id + '&OrderMethod=UDate';
    }

    function Sort() {
        var COrderDirection = '<?php echo $OrderDirection === "ASC" ? "ASC" : "DESC"; ?>';
        var NOrderDirection = COrderDirection === "ASC" ? "DESC" : "ASC";
        window.location.href = 'View_Products.php?User_id=' + User_id + '&OrderMethod=' + OrderMethod + '&OrderDirection=' + NOrderDirection;
    }
</script>

</html>