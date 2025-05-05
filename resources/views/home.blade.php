@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <!-- Hero Banner Section -->
    <section class="hero-banner" data-aos="fade-up">
        <div class="hero-slider swiper">
            <div class="swiper-wrapper">
                @foreach ($banners as $banner)
                    <div class="swiper-slide">
                        <div class="hero-slide" style="background-image: url('{{ asset($banner->image) }}')">
                            <div class="hero-content">
                                <h1 data-aos="fade-right">{{ $banner->title }}</h1>
                                <h2 class="subtitle" data-aos="fade-left">{{ $banner->sub_title }}</h2>
                                <p data-aos="fade-up">{{ $banner->description }}</p>
                                <div class="hero-buttons" data-aos="fade-up">
                                    <a href="{{ route('about') }}" class="btn btn-primary">Read More</a>
                                    <a href="{{ route('products') }}" class="btn btn-secondary">All Products</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>

    <section class="about-section">
        <div class="section-title">
            <img src="{{ asset('images/section-decorator.png') }}" alt="" class="decorator left">
            <h2>ABOUT PHATRADE</h2>
            <img src="{{ asset('images/section-decorator.png') }}" alt="" class="decorator right">
        </div>
    </section> <!-- About Section Title -->


    <!-- About Us Section -->
    <section class="about-section" data-aos="fade-up">
        <div class="about-container">
            <div class="about-image">
                <img src="{{ asset('images/about/about-image.jpg') }}" alt="About Phatrade">
            </div>
            <div class="about-content">
                <h2 class="subtitle">WE ARE GETTING BACK TO OUR ROOTS PHATRADE</h2>
                <p>is located in Obour City (about 15 min. to the airport)
                    In this facility we have our head office, factory, laboratory, packing and shipping department. We
                    produce in this factory some of our products such as Chamomile Blue Oil, Cumin Oil, Parsley Oil and some
                    other products. One of the main reasons for the success of our company is quality control, research and
                    development.</p>
                <a href="{{ route('about') }}" class="btn btn-primary">More About Us</a>
            </div>
        </div>
    </section>

    <!-- Products Section Title -->
    <section class="products-section" data-aos="fade-up">
        <div class="section-title">
            <img src="{{ asset('images/section-decorator.png') }}" alt="" class="decorator left">
            <h2 style="text-align:center;">OUR PRODUCTS</h2>
            <img src="{{ asset('images/section-decorator.png') }}" alt="" class="decorator right">
        </div>
    </section>



    <!-- Products Slider Section -->
    <section class="products-section" data-aos="fade-up">
        <div class="products-slider swiper">
            <div class="swiper-wrapper">
                @foreach ($products as $product)
                    <div class="swiper-slide">
                        <div class="product-card" data-aos="zoom-in">
                            <div class="product-image">
                                <img src="{{ asset($product->image_path) }}" alt="{{ $product->name }}">
                            </div>
                            <div class="product-content">
                                <h3>{{ $product->name }}</h3>
                                <p>{{ $product->short_description }}</p>
                                <span class="divider"></span>
                                <a href="{{ route('products.show', $product->id) }}" class="view-more">View More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-section" data-aos="fade-up">
       
        <div class="container">
            <div class="map-container">
                <div class="map-content">
                    <div class="map-text">
                        <h2
                            style="font-weight: 700; color:rgb(255, 255, 255); letter-spacing: 1px; background-color:rgb(75, 159, 255); padding: 15px 20px; border-radius: 32px 0 32px 32px;">
                            Our Quality Control Department</h2>
                        <p style="font-size: 18px; line-height: 1.8;">is <strong>very active</strong>, <strong>very well
                                equipped</strong> and run by <strong>good technicians</strong>.
                            Also they have a <strong>very strict system</strong> for registration which allow us full
                            traceability of any
                            product and prevent any possible mistakes.</p>
                    </div>
                    <div class="map-image">
                        <img src="{{ asset('images/hand.png') }}" alt="Quality Control Department">
                    </div>
                </div>
            </div>
        </div>


    </section>


    <!-- Certificates Section -->
    <section class="certificates-section" data-aos="fade-up">
        <div class="section-title">
            <img src="{{ asset('images/section-decorator.png') }}" alt="" class="decorator left">
            <h2>Certificates</h2>
            <img src="{{ asset('images/section-decorator.png') }}" alt="" class="decorator right">
        </div>

        <div class="certificates-container">
            <div class="certificates-slider">
                <div class="certificate-item">
                    <img src="{{ asset('images/certificates/certificates-01.png') }}" alt="ISO Certificate">
                </div>
                <div class="certificate-item">
                    <img src="{{ asset('images/certificates/certificates-02.png') }}" alt="ISO Certificate">
                </div>
                <div class="certificate-item">
                    <img src="{{ asset('images/certificates/certificates-03.png') }}" alt="ISO Certificate">
                </div>
                <div class="certificate-item">
                    <img src="{{ asset('images/certificates/certificates-04.png') }}" alt="FSSC Certificate">
                </div>
                <div class="certificate-item">
                    <img src="{{ asset('images/certificates/certificates-05.png') }}" alt="Halal Certificate">
                </div>
                <div class="certificate-item">
                    <img src="{{ asset('images/certificates/certificates-06.png') }}" alt="Kosher Certificate">
                </div>
            </div>
        </div>
    </section>


    <div class="farm-container">
        <div class="section-title">
            <img src="{{ asset('images/section-decorator.png') }}" alt="" class="decorator left">
            <h2>Regional Production</h2>
            <img src="{{ asset('images/section-decorator.png') }}" alt="" class="decorator right">
        </div>
        <section class="farming-regions">
            <div class="pha-map">
                <img src="{{ asset('images/egypt-map.png') }}" alt="Egypt Map" class="egypt-map">
            </div>

            <div class="region-grid">
                <div class="region-card" data-aos="fade-up" data-aos-delay="100">
                    <h3>Delta Region</h3>
                    <ul>
                        <li>Jasmine</li>
                        <li>Violet</li>
                        <li>Carnation</li>
                    </ul>
                </div>

                <div class="region-card" data-aos="fade-up" data-aos-delay="200">
                    <h3>Beni Sweif</h3>
                    <ul>
                        <li>Basil</li>
                        <li>Chamomile</li>
                        <li>Onion</li>
                        <li>Geranium</li>
                        <li>Parsley</li>
                    </ul>
                </div>

                <div class="region-card" data-aos="fade-up" data-aos-delay="300">
                    <h3>Fayoum</h3>
                    <ul>
                        <li>Marjoram</li>
                        <li>Chamomile</li>
                        <li>Tagette</li>
                    </ul>
                </div>

                <div class="region-card" data-aos="fade-up" data-aos-delay="400">
                    <h3>Al-Minya</h3>
                    <ul>
                        <li>Marjoram</li>
                        <li>Coriander</li>
                    </ul>
                </div>

                <div class="region-card" data-aos="fade-up" data-aos-delay="500">
                    <h3>Asyout</h3>
                    <ul>
                        <li>Cumin</li>
                        <li>Fennel</li>
                    </ul>
                </div>

                <div class="region-card" data-aos="fade-up" data-aos-delay="600">
                    <h3>Aswan</h3>
                    <ul>
                        <li>Cassie</li>
                    </ul>
                </div>
            </div>
        </section>
    </div>




@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/farm.css') }}">
@endpush

@push('scripts')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize AOS
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true
            });

            // Initialize Hero Slider
            new Swiper('.hero-slider', {
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
            });

            // Initialize Products Slider
            new Swiper('.products-slider', {
                slidesPerView: 1,
                spaceBetween: 30,
                loop: true,
                autoplay: {
                    delay: 3000,
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
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                    },
                    768: {
                        slidesPerView: 3,
                    },
                    1024: {
                        slidesPerView: 4,
                    },
                },
            });
        });
    </script>
@endpush
@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@push('scripts')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
@endpush
