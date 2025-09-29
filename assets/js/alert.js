document.addEventListener("DOMContentLoaded", function() {
    var alertMessage = localStorage.getItem("alertMessage");
    if (alertMessage) {
        alert(alertMessage);
        localStorage.removeItem("alertMessage");
    }
});

function addProduct_Check() {
    const check = "您確定要新增商品嗎？";
    return confirm(check);
}

function delProduct_Check() {
    const check = "您確定要刪除商品嗎？";
    return confirm(check);
}


function addOrder_Check() {
    const check = "您確定要新增訂單嗎？";
    return confirm(check);
}

function delOrder_Check() {
    const check = "您確定要刪除訂單嗎？";
    return confirm(check);
}

function addWish_Check() {
    const check = "您確定要新增願望嗎？";
    return confirm(check);
}

function delWish_Check() {
    const check = "您確定要刪除願望嗎？";
    return confirm(check);
}

function takeOrder_Check() {
    const check = "您確定要接取訂單嗎？";
    return confirm(check);
}

function addComment_Check(){
    const check = "您確定新增評價嗎？";
    return confirm(check);
}

function Edit_Profile(){
    const check = "您確定要修改資料嗎？";
    return confirm(check);
}