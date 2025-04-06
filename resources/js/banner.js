document.addEventListener('DOMContentLoaded', function() {
    const bannerSlider = document.getElementById('bannerSlider');
    
    if (bannerSlider) {
        fetchBanners();
    }

    async function fetchBanners() {
        try {
            const response = await fetch('/api/v1/banners');
            const data = await response.json();
            
            if (data.data && data.data.length > 0) {
                renderBanners(data.data);
                initializeSwiper();
            }
        } catch (error) {
            console.error('Error fetching banners:', error);
        }
    }

    function renderBanners(banners) {
        const wrapper = bannerSlider.querySelector('.swiper-wrapper');
        
        banners.forEach(banner => {
            const slide = document.createElement('div');
            slide.className = 'swiper-slide';
            slide.innerHTML = `
                <div class="banner-content" 
                     style="background-image: url('${banner.image_url}')">
                    <div class="banner-text">
                        <h1>${banner.title}</h1>
                        <p>${banner.description}</p>
                    </div>
                </div>
            `;
            wrapper.appendChild(slide);
        });
    }

    function initializeSwiper() {
        new Swiper(bannerSlider, {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            }
        });
    }
}); 