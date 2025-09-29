var User_id = parseInt(document.getElementById("getID").getAttribute("User_id"));
document.getElementById("edit-profile").addEventListener("click", function() {
    document.getElementById("iframe-content").src = "manage/Comment_php/Edit_Profile.php?User_id=" + User_id;
    document.getElementById("iframe-content").style.width = "100%";
    document.getElementById("iframe-content").style.height = "400";
});

document.getElementById("view-products").addEventListener("click", function() {
    document.getElementById("iframe-content").src = "manage/Comment_php/View_Products.php?User_id=" + User_id;
    document.getElementById("iframe-content").style.width = "100%";
    document.getElementById("iframe-content").style.height = "1100";
});

document.getElementById("view-wishes").addEventListener("click", function() {
    document.getElementById("iframe-content").src = "manage/Comment_php/View_Wishes.php?User_id=" + User_id;
    document.getElementById("iframe-content").style.width = "100%";
    document.getElementById("iframe-content").style.height = "1100";
});

document.getElementById("view-reviews").addEventListener("click", function() {
    document.getElementById("iframe-content").src = "manage/Comment_php/View_Reviews.php?User_id=" + User_id;
    document.getElementById("iframe-content").style.width = "100%";
    document.getElementById("iframe-content").style.height = "1100";
});
