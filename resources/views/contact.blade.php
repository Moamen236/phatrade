@extends('layouts.app')

@section('title', 'Contact Us')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
@endpush

@section('content')
    <div class="page-banner">
        <div class="overlay"></div>
        <div class="banner-content">
            <h1>Contact Us</h1>
            <div class="breadcrumbs">
                <a href="{{ route('home') }}">Home</a> / <span>Contact</span>
            </div>
        </div>
    </div>

    <div class="contact-container">
        <div class="contact-intro">
            <h2>Get In Touch With Us</h2>
            <p>We'd love to hear from you. Please fill out the form below or reach out using our contact information.</p>
        </div>

        <div class="contact-wrapper">
            <div class="contact-info-panel">
                <div class="info-card" data-aos="fade-right" data-aos-delay="100">
                    <div class="icon-wrapper">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="info-content">
                        <h3>Main Office</h3>
                        <p>3 Street# 194, Western Extension,<br>
                            Industrial Zone, Obour City 11181.<br>
                            Cairo, EGYPT</p>
                    </div>
                </div>

                <div class="info-card" data-aos="fade-right" data-aos-delay="200">
                    <div class="icon-wrapper">
                        <i class="fas fa-industry"></i>
                    </div>
                    <div class="info-content">
                        <h3>Factory Location</h3>
                        <p>Sadat City factory / farm Km15,<br>
                            Sadat city/ Kafr Dawood road,<br>
                            Al-Beheira governorate</p>
                    </div>
                </div>

                <div class="info-card" data-aos="fade-right" data-aos-delay="300">
                    <div class="icon-wrapper">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div class="info-content">
                        <h3>Phone</h3>
                        <p>+2 02 4481 0158<br>
                            +2 02 4481 0159</p>
                    </div>
                </div>

                <div class="info-card" data-aos="fade-right" data-aos-delay="400">
                    <div class="icon-wrapper">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="info-content">
                        <h3>Email</h3>
                        <p>Info@phatrade-eg.com</p>
                    </div>
                </div>

                <div class="social-media" data-aos="fade-up" data-aos-delay="500">
                    <h3>Follow Us</h3>
                    <div class="social-icons">
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>

            <div class="contact-form-panel">
                <h2 data-aos="fade-up">Send Us a Message</h2>
                @if (session('success'))
                    <div class="alert alert-success animate__animated animate__fadeIn">
                        <i class="fas fa-check-circle"></i> {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contact.send') }}" method="POST" id="contactForm">
                    @csrf
                    <div class="form-row">
                        <div class="form-group" data-aos="fade-up" data-aos-delay="100">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" name="name" required placeholder="John Doe"
                                class="input-animate">
                        </div>

                        <div class="form-group" data-aos="fade-up" data-aos-delay="200">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" required placeholder="john@example.com"
                                class="input-animate">
                        </div>
                    </div>

                    <div class="form-group" data-aos="fade-up" data-aos-delay="300">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" required placeholder="How can we help you?"
                            class="input-animate">
                    </div>

                    <div class="form-group" data-aos="fade-up" data-aos-delay="400">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" rows="5" required placeholder="Write your message here..."
                            class="input-animate"></textarea>
                    </div>

                    <button type="submit" class="submit-btn" data-aos="fade-up" data-aos-delay="500">
                        Send Message <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>

        <section class="map-section" data-aos="fade-up" data-aos-delay="600">
            <h2>Our Location</h2>
            <div class="map-container">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3446.789949998095!2d31.4661!3d30.2345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzDCsDEyJzE2LjgiTiAzMcKwMjcnNTcuNiJF!5e0!3m2!1sen!2seg!4v1635959562834!5m2!1sen!2seg"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
@endpush
@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
@endpush
