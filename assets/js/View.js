// 顯示商品
window.onload = function() {
    updatePage();
};

let currentPage = 1;
const productsPerPage = 8; 

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



