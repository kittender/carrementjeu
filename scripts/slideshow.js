(function() {
    const carousel = document.querySelector('.cj-slideshow');

    const products = carousel.querySelectorAll('.cj-slide');
    const carouselPrev = carousel.querySelector('.cj-slidebtn.--previous');
    const carouselNext = carousel.querySelector('.cj-slidebtn.--next');

    products.forEach(p => {
        p.addEventListener('focus', (event) => {
            event.preventDefault();
        });
    });

    let firstVisibleSlide = 0;

    carouselNext.onclick = function() {
        if(firstVisibleSlide < products.length - responsive()) {
            firstVisibleSlide++;
            moveSlides(firstVisibleSlide);
        }
    }
    carouselPrev.onclick = function() {
        if(firstVisibleSlide > 0) {
            firstVisibleSlide--;
            moveSlides(firstVisibleSlide);
        }
    }

    function moveSlides(denominator) {
        products.forEach((p, i) => {
            p.removeAttribute("style");
            p.style.transform = "translateX(-"+(100*denominator)+"%)";
            if(i <= (denominator - 1)) {
                p.style.marginLeft = 0;
            }
        });
    }

    function responsive() {
        if(window.innerWidth >= 860) {
            return 2;
        }
        return 1;
    }


    // Auto-slideshow
    setInterval(() => {
        // Next
        if(firstVisibleSlide < products.length - responsive()) {
            firstVisibleSlide++;
            moveSlides(firstVisibleSlide);
        } else {
            firstVisibleSlide = 1;
            moveSlides(firstVisibleSlide);
        }
    }, 2500);
})();