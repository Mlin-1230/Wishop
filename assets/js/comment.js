window.onload = function() {
    updatePage();
};

let currentPage = 1;
const commentsPerPage = 10; 

function updatePage() {
    const commentContainer = document.getElementById('commentContainer');
    if (!commentContainer) {
        console.error("找不到 commentContainer 元素！");
        return;
    }

    const comments = commentContainer.querySelectorAll('tbody tr');
    const totalPages = Math.ceil(comments.length / commentsPerPage);

    comments.forEach(comment => {
        comment.style.display = 'none';
    });

    const startIndex = (currentPage - 1) * commentsPerPage;
    const endIndex = startIndex + commentsPerPage;
    for (let i = startIndex; i < endIndex && i < comments.length; i++) {
        comments[i].style.display = 'table-row';
    }

    document.getElementById('currentPage').textContent = `第 ${currentPage} 頁 / 共 ${totalPages} 頁`;
}

updatePage();

function prevPage() {
    if (currentPage > 1) {
        currentPage--;
        updatePage();
    }
}

function nextPage() {
    const commentContainer = document.getElementById('commentContainer');
    if (!commentContainer) {
        console.error("找不到 commentContainer 元素！");
        return;
    }
    
    const comments = commentContainer.querySelectorAll('tbody tr');
    const totalPages = Math.ceil(comments.length / commentsPerPage);
    if (currentPage < totalPages) {
        currentPage++;
        updatePage();
    }
}
