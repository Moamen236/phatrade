@extends('layouts.app')

@section('title', 'About Us')

@section('content')
    <section class="about-banner" style="background-image: url({{ asset($banner->image) }})!important">
        <h1>{{ $banner->title }}</h1>
        <p>{{ $banner->description }}</p>
    </section>

    <!-- History Section Title -->
    <div class="section-title">
        <img src="{{ asset('images/section-decorator.png') }}" alt="" class="decorator left">
        <h2 style="font-size:24px; padding:2rem; " >Our Story – PHATRADE: A Legacy of Nature, Quality, and Innovation</h2>
        <img src="{{ asset('images/section-decorator.png') }}" alt="" class="decorator right">
    </div>

    <!-- Timeline Section -->
    <section class="timeline-section">
        <div class="timeline-container">
            <div class="timeline">
                <div class="timeline-item" data-aos="fade-up" data-aos-delay="100">
                    <div class="timeline-content">
                        <h3>1975</h3>
                        <p>a vision took root—a vision to bring the finest spices and herbs from Egypt to the world. That vision became PHATRADE, a company built on passion, expertise, and an unwavering commitment to quality.</p>
                    </div>
                </div>
                <div class="timeline-item" data-aos="fade-up" data-aos-delay="200">
                    <div class="timeline-content">
                        <h3>1977</h3>
                        <p>we had already made our mark in the American market, earning a reputation for excellence in natural ingredients.</p>
                    </div>
                </div>
                <div class="timeline-item" data-aos="fade-up" data-aos-delay="300">
                    <div class="timeline-content">
                        <h3>1987</h3>
                        <p>we ventured into Essential Oil production, a natural evolution given our deep understanding of raw materials. But our journey didn’t stop there. As demand for pure, aromatic extracts grew, we saw an opportunity to expand our expertise. </p>
                    </div>
                </div>
                <div class="timeline-item" data-aos="fade-up" data-aos-delay="400">
                    <div class="timeline-content">
                        <h3>Just two years later, in 1989</h3>
                        <p>we fulfilled our first major order—a milestone that set the stage for decades of leadership in the industry.</p>
                    </div>
                </div>
                <div class="timeline-item" data-aos="fade-up" data-aos-delay="500">
                    <div class="timeline-content">
                        <h3>Present</h3>
                        <p>Today, PHATRADE stands as a globally trusted name in Natural Essential Oils, Concretes, Absolutes, and Aroma Chemicals. With two state-of-the-art distillation and extraction facilities in Egypt (Obour City - Cairo & Sadat City), we blend cutting-edge technology with sustainable farming, growing select crops on our own farm to ensure purity from seed to bottle.
                        Trusted by the Best, Driven by Excellence</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- New Section: Contact Us -->
    <section class="contact-us">
        <h2>Our oils, concrete, and Absolute</h2>
        <p style="font-size:16px; padding-left:4rem; padding-right:4rem; text-align:left; ">Are chosen by premium manufacturers across the USA and Europe, a testament to our uncompromising quality and traceability. Behind every batch is our dedicated Quality Control team—technicians and doctors who uphold rigorous standards, backed by a strict registration system that guarantees full transparency at every step.
        A Future Rooted in Nature, Perfected by Science <br> <br> For nearly 50 years, we’ve bridged nature’s finest ingredients with the ever-changing needs of the global fragrance and flavor industries. At PHTRADE, we don’t just produce essential oils—we craft experiences, preserving the soul of nature in every drop.</p>
        <a href="{{ route('contact') }}" class="btn btn-primary">Get in Touch</a>
    </section>



@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    <link rel="stylesheet" href="{{ asset('css/farm.css') }}">
@endpush

@push('scripts')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
@endpush
