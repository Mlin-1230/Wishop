document.addEventListener('DOMContentLoaded', function () {
    var tablinks = document.querySelectorAll('.tablinks');
    var tabcontent = document.querySelectorAll('.tabcontent');

    function openTab(evt, tabName) {
        tabcontent.forEach(function (content) {
            content.classList.remove('active');
        });
        tablinks.forEach(function (link) {
            link.classList.remove('active');
        });
        document.getElementById(tabName).classList.add('active');
        evt.currentTarget.classList.add('active');
    }

    // 为每个tablink绑定点击事件
    tablinks.forEach(function (link) {
        link.addEventListener('click', function (evt) {
            var tabName = link.getAttribute('data-tab');
            openTab(evt, tabName);
        });
    });

    // 預設顯示第一個tab
    document.querySelector('.tablinks').click();

    var allProduct_rows = document.querySelectorAll('#all tbody .Product');
    var allWish_rows = document.querySelectorAll('#all tbody .Wish');
    var placeProduct_rows = document.querySelectorAll('#place tbody .Product');
    var makeWish_rows = document.querySelectorAll('#place tbody .Wish');
    var takeProduct_rows = document.querySelectorAll('#takeOrder tbody .Product');
    var takeWish_rows = document.querySelectorAll('#takeOrder tbody .Wish');
    var bid_rows = document.querySelectorAll('#bid tbody .Wish'); 
    var waitWish_rows = document.querySelectorAll('#wait tbody .Wish');
    var delProduct_rows = document.querySelectorAll('#del tbody .Product');
    var delWish_rows = document.querySelectorAll('#del tbody .Wish');

    allProduct_rows.forEach(function (row) {
        row.addEventListener('click', function () {
            var place_order_id = row.cells[0].innerText;
            window.location.href = 'Order_Info.php?Place_Order_id=' + place_order_id;
        });
    });

    allWish_rows.forEach(function (row) {
        row.addEventListener('click', function () {
            var take_order_id = row.cells[0].innerText;
            window.location.href = 'Order_Info.php?Take_Order_id=' + take_order_id;
        });
    });
    
    placeProduct_rows.forEach(function (row) {
        row.addEventListener('click', function () {
            var place_order_id = row.cells[0].innerText;
            window.location.href = 'Order_Info.php?Place_Order_id=' + place_order_id;
        });
    });

    makeWish_rows.forEach(function (row) {
        row.addEventListener('click', function () {
            var take_order_id = row.cells[0].innerText;
            window.location.href = 'Order_Info.php?Take_Order_id=' + take_order_id;
        });
    });

    takeProduct_rows.forEach(function (row) {
        row.addEventListener('click', function () {
            var place_order_id = row.cells[0].innerText;
            window.location.href = 'Order_Info.php?Place_Order_id=' + place_order_id;
        });
    });

    takeWish_rows.forEach(function (row) {
        row.addEventListener('click', function () {
            var take_order_id = row.cells[0].innerText;
            window.location.href = 'Order_Info.php?Take_Order_id=' + take_order_id;
        });
    });

    bid_rows.forEach(function (row) {
        row.addEventListener('click', function () {
            var take_order_id = row.cells[0].innerText;
            window.location.href = 'Order_Info.php?Take_Order_id=' + take_order_id;
        });
    });

    waitWish_rows.forEach(function (row) {
        row.addEventListener('click', function () {
            var take_order_id = row.cells[0].innerText;
            window.location.href = 'Order_Info.php?Take_Order_id=' + take_order_id;
        });
    });

    delProduct_rows.forEach(function (row) {
        row.addEventListener('click', function () {
            var place_order_id = row.cells[0].innerText;
            window.location.href = 'Order_Info.php?Place_Order_id=' + place_order_id;
        });
    });

    delWish_rows.forEach(function (row) {
        row.addEventListener('click', function () {
            var take_order_id = row.cells[0].innerText;
            window.location.href = 'Order_Info.php?Take_Order_id=' + take_order_id;
        });
    });
});

function backOrder() {
    window.location.href = 'Order.php';
}

function del_Product_Order(id) {
    window.location.href = 'manage/Product_php/delete_Order.php?Place_Order_id=' + id;
}

function finish_Product_Order(id) {
    window.location.href = 'manage/Product_php/finish_Order.php?Place_Order_id=' + id;
}

function check_Product_Order(id) {
    window.location.href = 'manage/Product_php/check_Order.php?Place_Order_id=' + id;
}

function del_Wish_Order(id) {
    window.location.href = 'manage/Wish_php/delete_Order.php?Take_Order_id=' + id;
}

function finish_Wish_Order(id) {
    window.location.href = 'manage/Wish_php/finish_Order.php?Take_Order_id=' + id;
}

function check_Wish_Order(id) {
    window.location.href = 'manage/Wish_php/check_Order.php?Take_Order_id=' + id;
}

function accept_Wish_Order(id) {
    window.location.href = 'manage/Wish_php/accept_Order.php?Take_Order_id=' + id;
}

function deny_Wish_Order(id) {
    window.location.href = 'manage/Wish_php/deny_Order.php?Take_Order_id=' + id;
}

function Product_Payed(id) {
    window.location.href = 'manage/Product_php/Payed.php?Place_Order_id=' + id;
}

function Wish_Payed(id) {
    window.location.href = 'manage/Wish_php/Payed.php?Take_Order_id=' + id;
}