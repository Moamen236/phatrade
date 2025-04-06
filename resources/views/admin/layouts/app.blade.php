<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - @yield('title')</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/vendors/simple-datatables/style.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/fontawesome/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/app.css') }}">
    {{-- <link rel="shortcut icon" href="{{ asset('admin/css/bootstrap.css') }}" type="image/x-icon"> --}}
    @yield('styles')
</head>

<body>
    <div id="app">
        @include('admin.layouts.sidebar')

        <div id="main">
            @include('admin.layouts.header')

            <div class="page-heading">
                <div class="page-title mb-3">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>@yield('page-title')</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    @yield('breadcrumb')
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <section class="section">
                    @yield('content')
                </section>
            </div>

            @include('admin.layouts.footer')
        </div>
    </div>

    <script src="{{ asset('admin/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/jquery/jquery.min.js') }}"></script>
    <script>
        // Active Sidebar
        document.addEventListener('DOMContentLoaded', function() {
            const currentUrl = window.location.href;
            document.querySelectorAll('.sidebar-link').forEach(link => {
                if (link.href === currentUrl) {
                    link.classList.add('active');
                    let parent = link.closest('.sidebar-item');
                    if (parent) {
                        parent.classList.add('active');
                    }
                }
            });
        });

        // Sweet Alert 2
        let errors = @json(json_encode($errors->all()));
        errors = JSON.parse(errors);
        if (errors.length > 0) {
            Swal.fire({
                icon: 'error',
                title: "Error",
                html: errors.join('<br>'),
                showConfirmButton: true,
            })
        }
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            })
        @endif

        // @if (session('error'))
        //     Swal.fire({
        //         icon: 'error',
        //         title: "Error",
        //         html: "<p class='text-center'> {{ __(session('error')) }} </p>",
        //         showConfirmButton: true
        //     })
        // @endif
    </script>

    @yield('scripts')

    <script src="{{ asset('admin/vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script>
        let table1 = document.querySelector('#table1');
        if (table1) {
            new simpleDatatables.DataTable(table1);
        }
    </script>

    <script src="{{ asset('admin/js/main.js') }}"></script>

</body>

</html>
