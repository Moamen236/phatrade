@extends('layouts.app')

@section('title', 'Our Factories')

@section('content')
    <section class="farm-intro" style="background-image: url({{ asset($banner->image) }})!important">
        <h1>{{ $banner->title }}</h1>
        <p>{{ $banner->description }}</p>
    </section>
    <div class="farm-container">
        <div class="factories-container">
            @foreach ($factories as $factory)
                <section class="factory-details">
                    <h2>{{ $factory->name }}</h2>
                    <p>{!! $factory->description !!}</p>
                    <div class="factory-images">
                        @if ($factory->images)
                            @foreach (json_decode($factory->images, true) ?? [] as $image)
                                <img src="{{ asset($image['path']) }}" alt="{{ $factory->name }} Image" class="factory-image">
                            @endforeach
                        @endif
                    </div>
                </section>
            @endforeach
        </div>
    @endsection

    @push('styles')
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
        <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">
        <link rel="stylesheet" href="{{ asset('css/farm.css') }}">
        <link rel="stylesheet" href="{{ asset('css/about.css') }}">
    @endpush

    @push('scripts')
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    @endpush
