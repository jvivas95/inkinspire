import './bootstrap';
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

document.addEventListener('DOMContentLoaded', function () {
    const carousel = document.querySelector('.favorites-carousel');
    if (carousel) {
        setInterval(() => {
            const maxScroll = carousel.scrollWidth - carousel.clientWidth;
            if (carousel.scrollLeft >= maxScroll) {
                carousel.scrollLeft = 0;
            } else {
                carousel.scrollLeft += 160;
            }
        }, 6000);
    }
});
