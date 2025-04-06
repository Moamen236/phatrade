@extends('layouts.app')

@section('title', 'Certificates')

@section('content')
    <section class="cert-banner" style="background-image: url({{ asset($banner->image) }})!important">
        <h1>{{ $banner->title }}</h1>
        <p>{{ $banner->description }}</p>
    </section>

    <div class="certificates-container">
        <div class="certificates-grid">
            @foreach (['cert1', 'cert2', 'cert3', 'cert4', 'cert5', 'cert6'] as $certificate)
                <div class="certificate-card">
                    <a href="{{ asset('images/certificates/' . $certificate . '.pdf') }}" target="_blank">
                        <img src="{{ asset('images/certificates/thumbnails/' . $certificate . '.png') }}"
                            alt="{{ $certificate }} Thumbnail" class="certificate-thumbnail">
                    </a>
                    <a href="{{ asset('images/certificates/' . $certificate . '.pdf') }}" target="_blank"
                        class="download-btn">
                        Download Certificate
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endpush

@push('scripts')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
@endpush
