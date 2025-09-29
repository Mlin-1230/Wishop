document.addEventListener('DOMContentLoaded', (event) => {
    const images = document.querySelectorAll('.index_carousel img');
    let currentIndex = 0;
    const totalImages = images.length;

    images[currentIndex].classList.add('active');

    const showNextImage = () => {
        images[currentIndex].classList.remove('active');
        currentIndex = (currentIndex + 1) % totalImages;
        images[currentIndex].classList.add('active');
    };

    setInterval(showNextImage, 3000); // 切換間隔時間為3秒
});

// Carousel
let currentIndex = 0;
const carouselTrack = document.querySelector('.carousel-track');
const items = document.querySelectorAll('.product');
const totalItems = items.length;
const visibleItems = 3;
let autoSlideInterval;

function updateCarousel() {
    const offset = currentIndex * -33;
    carouselTrack.style.transform = `translateX(${offset}%)`;
}

function nextSlide() {
    currentIndex = (currentIndex + 1) % totalItems;
    if (totalItems - currentIndex < visibleItems) {
        currentIndex = 0;
    }
    updateCarousel();
}

function prevSlide() {
    currentIndex = (currentIndex - 1 + totalItems) % totalItems;
    if (totalItems - currentIndex > totalItems - visibleItems) {
        currentIndex = totalItems - visibleItems;
    }
    updateCarousel();
}

function startAutoSlide() {
    autoSlideInterval = setInterval(nextSlide, 2000); // 每3秒自动切换到下一张
}

function stopAutoSlide() {
    clearInterval(autoSlideInterval);
}

document.addEventListener('DOMContentLoaded', () => {
    // 如果商品數量少於4個，克隆它們來填充
    if (totalItems < visibleItems) {
        for (let i = 0; i < visibleItems - totalItems; i++) {
            const cloneItem = items[i % totalItems].cloneNode(true);
            carouselTrack.appendChild(cloneItem);
        }
    }
    updateCarousel();
    startAutoSlide();
});