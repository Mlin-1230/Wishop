<?php
// 代購商品(買方)
$sql = "SELECT o.Place_Order_id, p.Product_Name, o.Date, o.Finished, o.Buyer_id, p.Agent_id
FROM place_order o
JOIN product p ON o.Product_id = p.Product_id
WHERE o.Buyer_id = $User_id AND o.Finished != 4
ORDER BY o.Finished ASC, o.Date DESC;";
$result = mysqli_query($link, $sql);
$Place_Product = array();
while ($row = mysqli_fetch_assoc($result)) {
$Place_Product[] = $row;
}

// 許願(買方)
$sql = "SELECT o.Take_Order_id, w.Wish_Name, o.Date, o.Finished, o.Agent_id, w.Buyer_id, o.Price
FROM take_order o
JOIN wish w ON o.Wish_id = w.Wish_id
WHERE w.Buyer_id = $User_id AND o.Finished != 4 AND o.Finished != -1
ORDER BY o.Finished ASC, o.Date DESC;";
$result = mysqli_query($link, $sql);
$Make_Wish = array();
while ($row = mysqli_fetch_assoc($result)) {
$Make_Wish[] = $row;
}

// 代購商品(賣方)
$sql = "SELECT o.Place_Order_id, p.Product_Name, o.Date, o.Finished, o.Buyer_id, p.Agent_id
FROM place_order o
JOIN product p ON o.Product_id = p.Product_id
WHERE p.Agent_id = $User_id AND o.Finished != 4
ORDER BY o.Finished ASC, o.Date DESC;";
$result = mysqli_query($link, $sql);
$Take_Product = array();
while ($row = mysqli_fetch_assoc($result)) {
$Take_Product[] = $row;
}

// 許願(賣方)
$sql = "SELECT o.Take_Order_id, w.Wish_Name, o.Date, o.Finished, o.Agent_id, w.Buyer_id, o.Price
FROM take_order o
JOIN wish w ON o.Wish_id = w.Wish_id
WHERE o.Agent_id = $User_id AND o.Finished != 4 AND o.Finished != -1
ORDER BY o.Finished ASC, o.Date DESC;";
$result = mysqli_query($link, $sql);
$Take_Wish = array();
while ($row = mysqli_fetch_assoc($result)) {
$Take_Wish[] = $row;
}

// 等待許願成立(買方)
$sql = "SELECT o.Take_Order_id, w.Wish_Name, o.Date, o.Finished, o.Agent_id, w.Buyer_id, o.Price
FROM take_order o
JOIN wish w ON o.Wish_id = w.Wish_id
WHERE w.Buyer_id = $User_id AND o.Finished = -1
ORDER BY w.Wish_Name ASC, w.Wish_Name ASC, o.Date DESC;";
$result = mysqli_query($link, $sql);
$Bid = array();
while ($row = mysqli_fetch_assoc($result)) {
$Bid[] = $row;
}

// 等待許願成立(賣方)
$sql = "SELECT o.Take_Order_id, w.Wish_Name, o.Date, o.Finished, o.Agent_id, w.Buyer_id, o.Price
FROM take_order o
JOIN wish w ON o.Wish_id = w.Wish_id
WHERE o.Agent_id = $User_id AND o.Finished = -1
ORDER BY o.Finished ASC, o.Date DESC;";
$result = mysqli_query($link, $sql);
$Wait = array();
while ($row = mysqli_fetch_assoc($result)) {
$Wait[] = $row;
}

// 被取消的代購商品(買方)
$sql = "SELECT o.Place_Order_id, p.Product_Name, o.Date, o.Finished, o.Buyer_id, p.Agent_id
FROM place_order o
JOIN product p ON o.Product_id = p.Product_id
WHERE o.Buyer_id = $User_id AND o.Finished = 4
ORDER BY o.Finished ASC, o.Date DESC;";
$result = mysqli_query($link, $sql);
$b_del_Product = array();
while ($row = mysqli_fetch_assoc($result)) {
$b_del_Product[] = $row;
}

// 被取消的(買方)
$sql = "SELECT o.Take_Order_id, w.Wish_Name, o.Date, o.Finished, o.Agent_id, w.Buyer_id, o.Price
FROM take_order o
JOIN wish w ON o.Wish_id = w.Wish_id
WHERE w.Buyer_id = $User_id AND o.Finished = 4 
ORDER BY o.Finished ASC, o.Date DESC;";
$result = mysqli_query($link, $sql);
$b_del_Wish = array();
while ($row = mysqli_fetch_assoc($result)) {
$b_del_Wish[] = $row;
}

// 被取消的代購商品(賣方)
$sql = "SELECT o.Place_Order_id, p.Product_Name, o.Date, o.Finished, o.Buyer_id, p.Agent_id
FROM place_order o
JOIN product p ON o.Product_id = p.Product_id
WHERE p.Agent_id = $User_id AND o.Finished = 4
ORDER BY o.Finished ASC, o.Date DESC;";
$result = mysqli_query($link, $sql);
$a_del_Product = array();
while ($row = mysqli_fetch_assoc($result)) {
$a_del_Product[] = $row;
}

// 被取消的許願(賣方)
$sql = "SELECT o.Take_Order_id, w.Wish_Name, o.Date, o.Finished, o.Agent_id, w.Buyer_id, o.Price
FROM take_order o
JOIN wish w ON o.Wish_id = w.Wish_id
WHERE o.Agent_id = $User_id AND o.Finished = 4
ORDER BY o.Finished ASC, o.Date DESC;";
$result = mysqli_query($link, $sql);
$a_del_Wish = array();
while ($row = mysqli_fetch_assoc($result)) {
$a_del_Wish[] = $row;
}
?>