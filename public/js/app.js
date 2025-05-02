document.addEventListener('DOMContentLoaded', function () {
    // Preloader
    const preloader = document.getElementById('preloader');
    
    window.addEventListener('load', function() {
        setTimeout(function() {
            preloader.classList.add('fade-out');
            setTimeout(function() {
                preloader.style.display = 'none';
                document.body.classList.remove('loading');
            }, 500);
        }, 4000);
    });

  

    initHeroSlider();
    initProductSliders();

    // First, remove any existing custom cursors
    const existingCursors = document.querySelectorAll('.custom-cursor');
    existingCursors.forEach(cursor => cursor.remove());

    // Create new cursor
    const cursor = document.createElement('div');
    cursor.className = 'custom-cursor';
    document.body.appendChild(cursor);

    document.addEventListener('mousemove', function (e) {
        cursor.style.left = e.clientX + 'px';
        cursor.style.top = e.clientY + 'px';
    });

    let lastScrollTop = 0;

    // Initialize intersection observer
    const observer = new IntersectionObserver((entries) => {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        const scrollingDown = scrollTop > lastScrollTop;
        lastScrollTop = scrollTop;

        entries.forEach(entry => {
            const element = entry.target;

            if (entry.isIntersecting) {
                // Add direction class based on scroll direction
                element.classList.add('in-view');
                if (scrollingDown) {
                    element.classList.remove('scroll-up');
                    element.classList.add('scroll-down');
                } else {
                    element.classList.remove('scroll-down');
                    element.classList.add('scroll-up');
                }

                // Add index for staggered animations
                if (element.classList.contains('products-section')) {
                    const cards = element.querySelectorAll('.product-card');
                    cards.forEach((card, index) => {
                        card.style.setProperty('--card-index', scrollingDown ? index : (cards.length - index - 1));
                    });
                }

                if (element.classList.contains('regions-container')) {
                    const cards = element.querySelectorAll('.region-card');
                    cards.forEach((card, index) => {
                        card.style.setProperty('--card-index', scrollingDown ? index : (cards.length - index - 1));
                    });
                }

                if (element.classList.contains('certificates-container')) {
                    const items = element.querySelectorAll('.certificate-item');
                    items.forEach((item, index) => {
                        item.style.setProperty('--card-index', index);
                    });
                }
            } else {
                if (!scrollingDown && entry.boundingClientRect.top > 0) {
                    element.classList.remove('in-view', 'scroll-down', 'scroll-up');
                }
            }
        });
    }, {
        threshold: 0.2,
        rootMargin: '50px'
    });

    // Elements to observe
    const elements = document.querySelectorAll(`
        .about-container,
        .products-section,
        .map-content,
        .regions-container,
        .certificates-container
    `);

  document.getElementById("navbar-toggler").addEventListener("click", function () {
    document.getElementById("navbar-menu").classList.toggle("active");
  });



    elements.forEach(element => observer.observe(element));

    // Navbar scroll behavior
    const navbar = document.querySelector('.navbar');
    const scrollThreshold = 50;

    function handleScroll() {
        if (window.pageYOffset > scrollThreshold) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    }

    // Initial check
    handleScroll();

    // Add scroll event listener with throttling for better performance
    let ticking = false;
    window.addEventListener('scroll', function () {
        if (!ticking) {
            window.requestAnimationFrame(function () {
                handleScroll();
                ticking = false;
            });
            ticking = true;
        }
    });
});

// Hero Slider Configuration
function initHeroSlider() {
    new Swiper('.hero-slider', {
        slidesPerView: 1,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
}

// Products Sliders Configuration
function initProductSliders() {
    const productSliders = document.querySelectorAll('.product-slider');
    productSliders.forEach(slider => {
        new Swiper(slider, {
            slidesPerView: 1,
            spaceBetween: 20,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            },
        });
    });

    // Products Slider
    new Swiper('.products-slider', {
        slidesPerView: 4,
        spaceBetween: 30,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            // Mobile
            320: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            // Tablet
            768: {
                slidesPerView: 2,
                spaceBetween: 30
            },
            // Desktop
            1024: {
                slidesPerView: 4,
                spaceBetween: 30
            }
        }
    });
}
document.addEventListener('DOMContentLoaded', function () {
    // Initialize AOS animation library
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true
    });

    // Add animation to form inputs when focused
    const inputs = document.querySelectorAll('.input-animate');
    inputs.forEach(input => {
        input.addEventListener('focus', function () {
            this.parentElement.classList.add('input-focused');
        });

        input.addEventListener('blur', function () {
            if (this.value === '') {
                this.parentElement.classList.remove('input-focused');
            }
        });
    });

    // // Add animation to submit button
    // const submitBtn = document.querySelector('.submit-btn');
    // submitBtn.addEventListener('mouseenter', function () {
    //     const icon = this.querySelector('i');
    //     icon.classList.add('animate__animated', 'animate__fadeInLeft');

    //     icon.addEventListener('animationend', function () {
    //         icon.classList.remove('animate__animated', 'animate__fadeInLeft');
    //     });
    // });

    // Form submission animation
    const contactForm = document.getElementById('contactForm');
    contactForm.addEventListener('submit', function (e) {
        // You can add a loading animation here if needed
        const submitBtn = this.querySelector('.submit-btn');
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
        // The form will submit normally after this
    });
});