@extends('layouts.app')

@section('title', 'Our Farm')

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <link rel="stylesheet" href="{{ asset('css/farm.css') }}">
@endpush

@section('content')
    <section class="farm-intro" style="background-image: url({{ asset($banner->image) }})!important">
        <h1>{{ $banner->title }}</h1>
        <p>{{ $banner->description }}</p>
    </section>

    <!-- New Image Section -->
    <!-- Farm Images Section -->
        <section class="farm-images">
            <h2>Our Farm Images</h2>
            <div class="image-grid">
                @forelse($farms as $farm)
                    <div class="farm-card">
                        <img src="{{ asset($farm->image_path) }}" alt="{{ $farm->name }}">
                        {{-- <div class="farm-info">
                            <h3>{{ $farm->name }}</h3>
                            <p>{!! Str::limit(strip_tags($farm->description), 100) !!}</p>
                        </div> --}}
                    </div>
                @empty
                    <p>No farms available at the moment.</p>
                @endforelse
            </div>
        </section>

    <div class="farm-container">
        <section class="farming-regions">
            <h2>Regional Production</h2>
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

@push('scripts')
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true
            });
        });
    </script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
@endpush
