<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Phatrade')</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.12.2/lottie.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    @stack('styles')
</head>

<body data-page="{{ Request::segment(1) ?: 'home' }}">
    @include('layouts.navbar')

    <!-- class="loading" -->
    <!-- <div id="preloader">
        <div id="lottie-animation"></div>
    </div> -->

    <!-- style="opacity: 0;" -->
    <div id="main-content">
        <main>
            @yield('content')
        </main>

        <footer class="footer">
            <div class="footer-content">
                <div class="location">
                    <h3>OUR LOCATION</h3>
                    <p>3 Street# 194, Western Extension, Industrial Zone, Obour City 11181, Cairo, EGYPT</p>
                    <p>Sadat City factory / farm Km15, Sadat city</p>
                </div>
                <div class="newsletter">
                    <h3>Subscribe to our Newsletter</h3>
                    <form id="subscribeForm" action="{{ route('subscribe') }}" method="POST">
                        @csrf
                        <input type="text" name="name" placeholder="Enter your name" required>
                        <input type="email" name="email" placeholder="Enter your email" required>
                        <button type="submit">Subscribe</button>
                    </form>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('subscribeForm').addEventListener('submit', function(e) {
            e.preventDefault();

            fetch(this.action, {
                    method: 'POST',
                    body: new FormData(this),
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: data.message || 'Thank you for subscribing!',
                            confirmButtonColor: '#3085d6'
                        });
                        this.reset();
                    } else {
                        throw new Error(data.message || 'Something went wrong');
                    }
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: error.message || 'Something went wrong!',
                        confirmButtonColor: '#d33'
                    });
                });
        });
    </script>
    @stack('scripts')
</body>

</html>
