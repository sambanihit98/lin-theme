document.addEventListener("DOMContentLoaded", function() {
    const track = document.querySelector(".lin-carousel-track");
    const prevBtn = document.querySelector(".prev-btn");
    const nextBtn = document.querySelector(".next-btn");

    let originalSlides = Array.from(document.querySelectorAll(".lin-carousel-slide"));
    let currentIndex = 0;
    let slidesPerView = getSlidesPerView();
    let isTransitioning = false;
    let autoplayInterval = null;

    function getSlidesPerView() {
        if (window.innerWidth <= 767) return 1;
        if (window.innerWidth <= 991) return 2;
        return 3;
    }

    function setupCarousel() {
        // Clear existing slides
        track.innerHTML = "";
        slidesPerView = getSlidesPerView();

        // Rebuild original slides reference
        originalSlides = originalSlides.map(slide => slide.cloneNode(true));

        const prependClones = originalSlides.slice(-slidesPerView).map(slide => slide.cloneNode(true));
        const appendClones = originalSlides.slice(0, slidesPerView).map(slide => slide.cloneNode(true));

        [...prependClones, ...originalSlides, ...appendClones].forEach(slide => {
            track.appendChild(slide);
        });

        currentIndex = slidesPerView;
        updatePosition(false);

        startAutoplay();
    }

    function updatePosition(animate = true) {
        const slideWidth = track.children[0].getBoundingClientRect().width;
        track.style.transition = animate ? "transform 0.4s ease" : "none";
        track.style.transform = `translateX(-${slideWidth * currentIndex}px)`;
    }

    function nextSlide() {
        if (isTransitioning) return;
        isTransitioning = true;
        currentIndex++;
        updatePosition(true);
    }

    function prevSlide() {
        if (isTransitioning) return;
        isTransitioning = true;
        currentIndex--;
        updatePosition(true);
    }

    track.addEventListener("transitionend", () => {
        const totalOriginal = originalSlides.length;

        // Jump silently if on clones
        if (currentIndex >= totalOriginal + slidesPerView) {
            currentIndex = slidesPerView;
            updatePosition(false);
        }

        if (currentIndex < slidesPerView) {
            currentIndex = totalOriginal + slidesPerView - 1;
            updatePosition(false);
        }

        isTransitioning = false;
    });

    nextBtn.addEventListener("click", () => {
        nextSlide();
        resetAutoplay();
    });

    prevBtn.addEventListener("click", () => {
        prevSlide();
        resetAutoplay();
    });

    // Autoplay
    function startAutoplay() {
        stopAutoplay();
        autoplayInterval = setInterval(() => {
            nextSlide();
        }, 5000);
    }

    function stopAutoplay() {
        if (autoplayInterval) clearInterval(autoplayInterval);
    }

    function resetAutoplay() {
        stopAutoplay();
        startAutoplay();
    }

    // Handle resize
    let resizeTimeout;
    window.addEventListener("resize", () => {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(() => {
            setupCarousel();
        }, 200);
    });

    // Initial setup
    setupCarousel();
});