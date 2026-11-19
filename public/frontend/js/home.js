if (window.Swiper) {
    new window.Swiper('.swiper1', {
        effect: 'coverflow',
        loop: true,
        slidesPerView: 1,
        spaceBetween: 10,
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 60,
            modifier: 1,
            slideShadows: false,
        },
        autoplay: { delay: 5000 },
        breakpoints: {
            640: { slidesPerView: 2 },
            991: { slidesPerView: 3, spaceBetween: 20 },
        },
        navigation: {
            nextEl: '.swiper-next-btn1',
            prevEl: '.swiper-prev-btn1',
        },
    });
}
