var User_id = parseInt(document.getElementById("getID").getAttribute("User_id"));
// 顯示商品
let currentPage = 1;
const productsPerPage = 15; // 每頁商品數量

// 更新當前頁面
function updatePage() {
    const products = document.querySelectorAll('.product');
    const totalPages = Math.ceil(products.length / productsPerPage);

    // 隱藏所有商品
    products.forEach(product => {
        product.style.display = 'none';
    });

    // 顯示現在頁面商品
    const startIndex = (currentPage - 1) * productsPerPage;
    const endIndex = startIndex + productsPerPage;
    for (let i = startIndex; i < endIndex && i < products.length; i++) {
        products[i].style.display = 'block';
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
    const products = document.querySelectorAll('.product');
    const totalPages = Math.ceil(products.length / productsPerPage);
    if (currentPage < totalPages) {
        currentPage++;
        updatePage();
    }
}


// 彈出式介面
var Product_id;

function showDetails(id, name, price, date, info, agent, score, agent_id) {
    // 设置当前选定的产品ID和代理ID
    Product_id = id;
    Agent_id = agent_id;

    // 显示弹出窗口
    document.getElementById('popup').style.display = 'block';

    // 更新弹出窗口中的产品信息
    document.getElementById('popup-name').innerText = '商品名稱: ' + name;
    document.getElementById('popup-price').innerText = '價格: $' + price;
    document.getElementById('popup-date').innerText = '預計到貨日期: ' + date;
    document.getElementById('popup-info').innerText = '詳細資訊: \n' + info;

    // 显示代购人和评分
    const popupAgent = document.getElementById('popup-agent');
    if (score !== null) {
        popupAgent.innerText = '代購人: ' + agent + ' （評分: ' + score.toFixed(1) + '）';
    } else {
        popupAgent.innerText = '代購人: ' + agent + ' （暫無評分）';
    }
}


    function searchProducts(event) {
        if (event.key === 'Enter') {
            var searchKeyword = document.getElementById("search").value;
            window.location.href = 'Product.php?keyword=' + searchKeyword; 
        }
    }

    
    function MysearchProducts(event) {
        if (event.key === 'Enter') {
            var searchKeyword = document.getElementById("search").value;
            window.location.href = 'MyProduct.php?keyword=' + searchKeyword; 
        }
    }


function viewAgentDetails() {
    if(Agent_id!=User_id){
    window.location.href = 'Comment.php?Agent_id=' + Agent_id;
}else{
    window.location.href = 'Personal.php?User_id=' + User_id;
}
}

function closePopup() {
    document.getElementById('popup').style.display = 'none';
}

function backProduct() {
    window.location.href = 'Product.php';
}

function backMyProduct() {
    window.location.href = 'MyProduct.php';
}

function PlaceOrder() {
    window.location.href = 'Place_Order.php?Product_id=' + Product_id;
}

function NoSession() {
    var LoginMessage = "請先登入";
    alert(LoginMessage);
}

function MyProduct() {
    window.location.href = 'MyProduct.php';
}

function AllProduct() {
    window.location.href = 'Product.php';
}

function Launch() {
    window.location.href = 'Launch.php';
}

function delProduct() {
    window.location.href = 'manage/Product_php/delete_Product.php?Product_id=' + Product_id;
}

