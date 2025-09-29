var Agent_id = parseInt(document.getElementById("getID").getAttribute("Agent_id"));

document.getElementById("view-products").addEventListener("click", function () {
    document.getElementById("iframe-content").src = "manage/AComment_php/View_Products.php?Agent_id=" + Agent_id;
    document.getElementById("iframe-content").style.width = "100%";
    document.getElementById("iframe-content").style.height = "1100";
});

document.getElementById("view-wishes").addEventListener("click", function () {
    document.getElementById("iframe-content").src = "manage/AComment_php/View_Wishes.php?Agent_id=" + Agent_id;
    document.getElementById("iframe-content").style.width = "100%";
    document.getElementById("iframe-content").style.height = "1100";
});

document.getElementById("view-reviews").addEventListener("click", function () {
    document.getElementById("iframe-content").src = "manage/AComment_php/View_Reviews.php?Agent_id=" + Agent_id;
    document.getElementById("iframe-content").style.width = "100%";
    document.getElementById("iframe-content").style.height = "1100";
});

function Place_Order() {
    window.top.location.href = '../../Place_Order.php';
    return false;
}


