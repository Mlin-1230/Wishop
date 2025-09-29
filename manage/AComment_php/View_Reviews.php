<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/css/Comment.css">
    <!-- Js -->
    <script src="../../assets/js/comment.js"></script>


</head>


<?php
$Agent_id = $_GET['Agent_id'];
?>

<?php
include '../pa.php';
$OrderMethod = isset($_GET['OrderMethod']) ? $_GET['OrderMethod'] : 'Comment_id';
$OrderDirection = isset($_GET['OrderDirection']) ? $_GET['OrderDirection'] : 'DESC';
$sql = "SELECT
c.Comment_id,
u.User_Name AS Buyer_Name,
c.Score,
c.Product_Name,
c.Comment,
c.Date
FROM
Comment c
LEFT JOIN
User u ON c.Buyer_id = u.User_id
WHERE
c.Agent_id = $Agent_id
ORDER BY
$OrderMethod $OrderDirection;";
$result = mysqli_query($link, $sql);

$Comments = array();
while ($row = mysqli_fetch_assoc($result)) {
    $Comments[] = $row;
}
?>

<body>
    <div class="main">
        <div class="container">
            <!-- Sort buttons -->
            <div class="sort-buttons">
                <button onclick="sortByPrice()">依商品名排序</button>
                <button onclick="sortByName()">依評分排序</button>
                <button onclick="sortByDate()">依評價日期排序</button>
                <button class="sort" onclick="Sort()">▲▼</button>
            </div>
            <div id="getID" Agent_id="<?php echo $Agent_id; ?>"></div>
            <div id="commentContainer">
                <?php if (empty($Comments)) : ?>
                    <p>暫無評價</p>
                <?php else : ?>
                    <table>
                        <thead>
                            <tr>
                                <th>購買者名稱</th>
                                <th>產品名稱</th>
                                <th>評分</th>
                                <th>評論</th>
                                <th>日期</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($Comments as $row) : ?>
                                <tr>
                                    <td><?php echo $row['Buyer_Name']; ?></td>
                                    <td><?php echo $row['Product_Name']; ?></td>
                                    <td><?php echo $row['Score']; ?><span class="rating">★</span></td>
                                    <td><?php echo $row['Comment']; ?></td>
                                    <td><?php echo $row['Date']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
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
        window.location.href = 'View_Reviews.php?Agent_id=' + Agent_id + '&OrderMethod=Product_Name';
    }

    function sortByName() {
        window.location.href = 'View_Reviews.php?Agent_id=' + Agent_id + '&OrderMethod=Score';
    }

    function sortByDate() {
        window.location.href = 'View_Reviews.php?Agent_id=' + Agent_id + '&OrderMethod=Date';
    }

    function Sort() {
        var COrderDirection = '<?php echo $OrderDirection === "ASC" ? "ASC" : "DESC"; ?>';
        var NOrderDirection = COrderDirection === "ASC" ? "DESC" : "ASC";
        window.location.href = 'View_Reviews.php?Agent_id=' + Agent_id + '&OrderMethod=' + OrderMethod + '&OrderDirection=' + NOrderDirection;
    }
</script>

</html>