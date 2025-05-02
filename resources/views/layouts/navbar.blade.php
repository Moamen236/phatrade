<nav class="navbar">
    <div class="container">
        <div class="navbar-brand">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Phatrade Logo" class="logo">
            </a>
            <button class="navbar-toggler" id="navbar-toggler">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
        
        <div class="navbar-menu" id="navbar-menu">
            <ul class="navbar-nav">
                <li><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                <li><a href="{{ route('about') }}" class="nav-link">About Us</a></li>
                <li><a href="{{ route('products') }}" class="nav-link">Products</a></li>
                <li><a href="{{ route('farm') }}" class="nav-link">Farm</a></li>
                <li><a href="{{ route('factories') }}" class="nav-link">Factories</a></li>
                <li><a href="{{ route('certificates') }}" class="nav-link">Certificates</a></li>
                <li><a href="{{ route('contact') }}" class="nav-link">Contact Us</a></li>
            </ul>
        </div>
    </div>
</nav> 
@push('scripts')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
@endpush