@extends('layouts.app')

@section('content')
    <div class="banner" style="background-image: url({{ asset($banner->image) }})!important">
        <h1>{{ $banner->title }}</h1>
    </div>

    <div class="products-section">
        <!-- Category Selection -->
        <div class="category-selection">
            <button class="category-btn active" data-category="all">All</button>
            @foreach ($categories as $category)
                <button class="category-btn" data-category="{{ $category->slug }}">{{ $category->name }}</button>
            @endforeach
        </div>

        <!-- Product Grid -->
        <div class="product-grid" id="product-grid">
            @foreach ($products as $product)
                <div class="product-card" data-category="{{ $product->category->slug }}">
                    <div class="product-image">
                        <img src="{{ asset($product->image_path) }}" alt="{{ $product->name }}">
                    </div>
                    <div class="product-content">
                        <h3>{{ $product->name }}</h3>
                        <p>{{ $product->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        document.querySelectorAll('.category-btn').forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons
                document.querySelectorAll('.category-btn').forEach(btn => {
                    btn.classList.remove('active');
                });

                // Add active class to clicked button
                this.classList.add('active');

                const selectedCategory = this.getAttribute('data-category');
                const productCards = document.querySelectorAll('.product-card');

                productCards.forEach(card => {
                    if (selectedCategory === 'all' || card.getAttribute('data-category') ===
                        selectedCategory) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    </script>
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
