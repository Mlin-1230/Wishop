document.addEventListener("DOMContentLoaded", function () {
    const navbarToggler = document.querySelector(".navbar-toggler");
    const navbarNav = document.querySelector(".navbar-nav");

    // 切換選單的顯示與隱藏
    navbarToggler.addEventListener("click", function () {
        navbarNav.classList.toggle("active");
    });

    // 點擊選單以外的地方時隱藏選單
    document.addEventListener("click", function (event) {
        if (!navbarNav.contains(event.target) && !navbarToggler.contains(event.target)) {
            navbarNav.classList.remove("active");
        }
    });

    // 在窗口大小改變時隱藏選單
    window.addEventListener("resize", function () {
        if (window.innerWidth > 768) {
            navbarNav.classList.remove("active");
        }
    });
});