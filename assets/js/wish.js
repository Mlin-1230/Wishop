// 顯示願望
let currentPage = 1;
const wishesPerPage = 15; // 每頁願望數量

// 更新當前頁面
function updatePage() {
    const wishes = document.querySelectorAll('.wish');
    const totalPages = Math.ceil(wishes.length / wishesPerPage);

    // 隱藏所有願望
    wishes.forEach(wish => {
        wish.style.display = 'none';
    });

    // 顯示現在頁面願望
    const startIndex = (currentPage - 1) * wishesPerPage;
    const endIndex = startIndex + wishesPerPage;
    for (let i = startIndex; i < endIndex && i < wishes.length; i++) {
        wishes[i].style.display = 'block';
    }

    // 當前頁面
    document.getElementById('currentPage').textContent = `第 ${currentPage} 頁 / 共 ${totalPages} 頁`;
}

// 更新頁面
updatePage();

// 上一頁
function prevPage() {
    if (currentPage > 1) {
        currentPage--;
        updatePage();
    }
}

// 下一頁
function nextPage() {
    const wishes = document.querySelectorAll('.wish');
    const totalPages = Math.ceil(wishes.length / wishesPerPage);
    if (currentPage < totalPages) {
        currentPage++;
        updatePage();
    }
}

// 彈出式介面
var Wish_id;
function showDetails(id, buyer, name, date, info) {
    Wish_id = id;
    document.getElementById('popup').style.display = 'block';
    document.getElementById('popup-buyer').innerText = '許願者: ' + buyer;
    document.getElementById('popup-name').innerText = '許願商品名稱: ' + name;
    document.getElementById('popup-date').innerText = '許願日期: ' + date;
    document.getElementById('popup-info').innerText = '詳細資訊: \n' + info;
}

function searchWishes(event) {
    if (event.key === 'Enter') {
        var searchKeyword = document.getElementById("search").value;
        window.location.href = 'Wish.php?keyword=' + searchKeyword; 
    }
}

function MysearchWishes(event) {
    if (event.key === 'Enter') {
        var searchKeyword = document.getElementById("search").value;
        window.location.href = 'MyWish.php?keyword=' + searchKeyword; 
    }
}

function closePopup() {
    document.getElementById('popup').style.display = 'none';
}

function backWish() {
    window.location.href = 'Wish.php';
}

function backMyWish() {
    window.location.href = 'MyWish.php';
}

function TakeOrder() {
    window.location.href = 'Take_Order.php?Wish_id=' + Wish_id;
}

function NoSession() {
    var LoginMessage = "請先登入";
    alert(LoginMessage);
}

function MyWish() {
    window.location.href = 'MyWish.php';
}

function AllWish() {
    window.location.href = 'Wish.php';
}

function makeWish() {
    window.location.href = 'Make_Wish.php';
}

function delWish() {
    window.location.href = 'manage/Wish_php/delete_Wish.php?Wish_id=' + Wish_id;
}
