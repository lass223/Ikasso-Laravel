
document.addEventListener('DOMContentLoaded', () => {
    const carousel = document.querySelector('.slider');
    const items = document.querySelectorAll('.slider-item');
    const nextButton = document.querySelector('.slider-control.next');
    const prevButton = document.querySelector('.slider-control.prev');
    let currentIndex = 0;

    function updateCarousel() {
        const offset = -currentIndex * 100;
        carousel.style.transform = `translateX(${offset}%)`;
    }

    nextButton.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % items.length;
        updateCarousel();
    });

    prevButton.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + items.length) % items.length;
        updateCarousel();
    });
});

