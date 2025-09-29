<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>default</title>
  <link rel="stylesheet" href="assets/css/navbar.css">
  <script src="https://kit.fontawesome.com/3daedf892a.js" crossorigin="anonymous"></script>
  <script src="assets/js/navbar.js"></script>
</head>

<body>
<!-- 現在位置 -->
<?php
  $current_page = basename($_SERVER['PHP_SELF']);
  $active_pages = [
    'index' => ['index.php'],
    'product' => ['Product.php', 'MyProduct.php', 'Launch.php', 'Place_Order.php'],
    'wish' => ['Wish.php', 'MyWish.php', 'Make_Wish.php', 'Take_Order.php'],
    'order' => ['Order.php', 'Order_Info.php', 'Write_Comment.php'],
    'personal' => ['Personal.php']
];

function isActive($page_group, $current_page, $active_pages) {
  return in_array($current_page, $active_pages[$page_group]);
}
?>

<nav class="navbar">
    <a class="navbar-brand" href="index.php">許願代購平台</a>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link <?php echo isActive('index', $current_page, $active_pages) ? 'active' : ''; ?>"
        href="index.php"><i class="fa-solid fa-house"></i>首頁</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php echo isActive('product', $current_page, $active_pages) ? 'active' : ''; ?>"
        href="Product.php"><i class="fa-solid fa-cart-shopping"></i>代購商品</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php echo isActive('wish', $current_page, $active_pages) ? 'active' : ''; ?>"
        href="Wish.php"><i class="fa-solid fa-wand-magic-sparkles"></i>許願池</a>
      </li>
      <?php if ((isset($_SESSION['User_id'])) and ($_SESSION['User_id'] != "")): ?>
      <li class="nav-item">
        <a class="nav-link <?php echo isActive('order', $current_page, $active_pages) ? 'active' : ''; ?>"
        href="Order.php"><i class="fa-solid fa-clock-rotate-left"></i>訂單紀錄</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php echo isActive('personal', $current_page, $active_pages) ? 'active' : ''; ?>"
        href="Personal.php"><i class="fa-solid fa-user"></i>個人資料</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="manage/User_php/logout.php"><i class="fa-solid fa-sign-out-alt"></i>登出</a>
      </li>
      <?php else: ?>
      <li class="nav-item">
        <a class="nav-link" href="User/Login.html"><i class="fa-solid fa-sign-in-alt"></i>登入</a>
      </li>
      <?php endif; ?>
    </ul>
    <span class="navbar-toggler">&#9776;</span>
  </nav>
</body>

</html>