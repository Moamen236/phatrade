@extends('layouts.app')

@section('content')
    <div class="product-detail-container">
        <div class="product-image-section">
            <div class="main-image">
                <img src="{{ asset($product->image_path) }}" alt="{{ $product->name }}">
            </div>
        </div>

        <div class="product-info-section">
            <nav class="product-breadcrumb">
                <a href="{{ route('home') }}">Home</a> /
                <a href="{{ route('products') }}">Products</a> /
                <span>{{ $product->name }}</span>
            </nav>

            <h1 class="product-title">{{ $product->name }}</h1>

            <div class="product-category">
                <span class="category-label">Category:</span>
                <span class="category-name">{{ $product->category->name }}</span>
            </div>

            <div class="product-description">
                <p>{{ $product->description }}</p>
            </div>

            <div class="product-contact">
                <h3 class="m-0">Interested in this product?</h3>
                <a href="{{ route('contact') }}" class="contact-btn">Contact Us</a>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endpush

@push('scripts')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
@endpush
