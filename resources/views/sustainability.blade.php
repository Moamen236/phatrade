@extends('layouts.app')

@section('title', 'Sustainability')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/sustainability.css') }}">
@endpush

@section('content')
<article class="sustainability-page">
    {{-- 1. Hero Section --}}
    <header class="sustainability-hero">
        <div class="container">
            <h1 class="hero-title">Sustainability</h1>
            <p class="hero-subtitle">We are committed to eco-friendly production, from farm to bottle. Our essential oils and natural products are crafted with respect for people and the planet.</p>
            {{-- Replace with real banner: <img> or div with background-image --}}
            <div class="hero-image image-placeholder" role="img" aria-label="Sustainability banner"></div>
        </div>
    </header>

    {{-- 2. Vision Section --}}
    <section class="sustainability-vision" aria-labelledby="vision-title">
        <div class="container">
            <div class="section-inner">
                <div>
                    <h2 id="vision-title" class="section-title">Our Vision</h2>
                    <p class="section-text">To be a leading global supplier of premium essential oils, concretes, and absolutes from Egypt, recognised for quality, sustainability, and integrity. We aim to connect the richness of Egyptian nature with the world while protecting the environment and supporting local communities.</p>
                    {{-- Replace paragraph above with content from your document if needed --}}
                    <p class="section-text">Our vision is rooted in sustainable farming, transparent supply chains, and long-term partnerships with international clients who share our values.</p>
                </div>
                {{-- Replace with real image: factory, nature, or farming --}}
                <div class="image-placeholder" aria-hidden="true"></div>
            </div>
        </div>
    </section>

    {{-- 3. Mission Section --}}
    <section class="sustainability-mission" aria-labelledby="mission-title">
        <div class="container">
            <div class="section-inner">
                <div>
                    <h2 id="mission-title" class="section-title">Our Mission</h2>
                    <p class="section-text">We are dedicated to producing the finest essential oils and natural extracts through sustainable practices, strict quality controls, and continuous improvement. We work closely with farmers and partners to ensure traceability, fair practices, and minimal environmental impact.</p>
                    {{-- Replace with content from your document --}}
                    <p class="section-text">Our mission is to deliver products that meet the highest international standards while contributing positively to the communities and ecosystems we touch.</p>
                </div>
                {{-- Replace with real image beside or below text --}}
                <div class="image-placeholder" aria-hidden="true"></div>
            </div>
        </div>
    </section>

    {{-- 4. Quality & Compliance Section --}}
    <section class="sustainability-quality" aria-labelledby="quality-title">
        <div class="container">
            <h2 id="quality-title" class="section-title">Quality & Compliance</h2>
            <p class="section-text">We adhere to internationally recognised standards including HACCP (Hazard Analysis Critical Control Points), EU regulations, FDA requirements, and CODEX guidelines. Our facilities and processes are designed to ensure food safety, traceability, and consistent quality for fragrance and flavour applications worldwide.</p>
            {{-- Replace with content from your document --}}
            <div class="gallery">
                {{-- Replace with real images (e.g. certificates, facility, lab) --}}
                <div class="image-placeholder" aria-hidden="true"></div>
                <div class="image-placeholder" aria-hidden="true"></div>
                <div class="image-placeholder" aria-hidden="true"></div>
            </div>
        </div>
    </section>

    {{-- 5. Sustainability Commitment Section --}}
    <section class="sustainability-commitment" aria-labelledby="commitment-title">
        <div class="container">
            <div class="section-inner">
                <div>
                    <h2 id="commitment-title" class="section-title">Our Sustainability Commitment</h2>
                    <ul class="commitment-list">
                        <li><span class="icon-circle" aria-hidden="true"></span> Sustainable sourcing and support for local farmers and communities.</li>
                        <li><span class="icon-circle" aria-hidden="true"></span> Responsible use of water and energy in our distillation and extraction processes.</li>
                        <li><span class="icon-circle" aria-hidden="true"></span> Minimising waste and promoting recycling and reuse where possible.</li>
                        <li><span class="icon-circle" aria-hidden="true"></span> Traceability from raw material to finished product for transparency and quality.</li>
                        <li><span class="icon-circle" aria-hidden="true"></span> Continuous improvement in environmental and social performance.</li>
                    </ul>
                    {{-- Replace list items with content from your document --}}
                </div>
                {{-- Optional image placeholder on the right --}}
                <div class="image-placeholder" aria-hidden="true"></div>
            </div>
        </div>
    </section>

    {{-- 6. Trusted Supplier Section --}}
    <section class="sustainability-trusted" aria-labelledby="trusted-title">
        <div class="container">
            <h2 id="trusted-title" class="section-title">Your Trusted Materials Supplier in Egypt</h2>
            <p class="section-text">With decades of experience and two production facilities in Egypt, we are your reliable partner for essential oils, concretes, and absolutes. We combine traditional expertise with modern technology to deliver products that meet the demands of the global fragrance and flavour industry.</p>
            {{-- Replace with real full-width image --}}
            <div class="image-placeholder" aria-hidden="true"></div>
        </div>
    </section>

    {{-- 7. Call To Action Section --}}
    <section class="sustainability-cta" aria-labelledby="cta-text">
        <div class="container">
            <p id="cta-text" class="cta-text">Get in Touch with us for the best quality of essential oils, concretes and absolutes.</p>
            {{-- WhatsApp-style CTA: replace href with https://wa.me/YOUR_NUMBER (e.g. 201234567890) for WhatsApp --}}
            <a href="{{ route('contact') }}" class="cta-button">Get in Touch</a>
        </div>
    </section>
</article>
@endsection
