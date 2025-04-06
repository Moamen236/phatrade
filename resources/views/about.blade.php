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
        <h2>OUR HISTORY</h2>
        <img src="{{ asset('images/section-decorator.png') }}" alt="" class="decorator right">
    </div>

    <!-- Timeline Section -->
    <section class="timeline-section">
        <div class="timeline-container">
            <div class="timeline">
                <div class="timeline-item" data-aos="fade-up" data-aos-delay="100">
                    <div class="timeline-content">
                        <h3>1975</h3>
                        <p>PHTRADE was established, initially focusing on spices and herbs.</p>
                    </div>
                </div>
                <div class="timeline-item" data-aos="fade-up" data-aos-delay="200">
                    <div class="timeline-content">
                        <h3>1977</h3>
                        <p>Focused on the American market, developing a strong reputation.</p>
                    </div>
                </div>
                <div class="timeline-item" data-aos="fade-up" data-aos-delay="300">
                    <div class="timeline-content">
                        <h3>1987</h3>
                        <p>Started Essential Oils production as a natural expansion.</p>
                    </div>
                </div>
                <div class="timeline-item" data-aos="fade-up" data-aos-delay="400">
                    <div class="timeline-content">
                        <h3>1989</h3>
                        <p>First order in Essential Oils, marking the beginning of our growth in this field.</p>
                    </div>
                </div>
                <div class="timeline-item" data-aos="fade-up" data-aos-delay="500">
                    <div class="timeline-content">
                        <h3>Present</h3>
                        <p>PHATRADE is now a long-established name in Natural Essential Oils, Concretes, Absolutes, and
                            Vegetable Oils.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- New Section: Contact Us -->
    <section class="contact-us">
        <h2>Contact Us</h2>
        <p>If you have any questions or inquiries, feel free to reach out to us!</p>
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
