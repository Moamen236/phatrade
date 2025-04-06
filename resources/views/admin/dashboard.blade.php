@extends('admin.layouts.app')

@section('title', 'Home')

@section('content')
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="fas fa-box"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Products</h6>
                                    <h6 class="font-extrabold mb-0">{{ $stats['products'] }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Subscribers</h6>
                                    <h6 class="font-extrabold mb-0">{{ $stats['subscribers'] }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="fas fa-address-book"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Messages</h6>
                                    <h6 class="font-extrabold mb-0">{{ $stats['contacts'] }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Unread Messages</h6>
                                    <h6 class="font-extrabold mb-0">{{ $stats['unread_messages'] }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Recent Subscribers</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-lg">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Subscribed Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($recent_subscribers as $subscriber)
                                            <tr>
                                                <td class="col-3">
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-md">
                                                            <img src="{{ asset('admin/images/faces/2.jpg') }}">
                                                        </div>
                                                        <p class="font-bold ms-3 mb-0">{{ $subscriber->name }}</p>
                                                    </div>
                                                </td>
                                                <td class="col-auto">
                                                    <p class="mb-0">{{ $subscriber->email }}</p>
                                                </td>
                                                <td>{{ $subscriber->created_at->format('d M Y') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h4>Recent Messages</h4>
                </div>
                <div class="card-content pb-4">
                    @foreach ($recent_contacts as $contact)
                        <div class="recent-message d-flex px-4 py-3">
                            <div class="avatar avatar-lg">
                                <img src="{{ asset('admin/images/faces/2.jpg') }}">
                            </div>
                            <div class="name ms-4">
                                <h5 class="mb-1">{{ $contact->name }}</h5>
                                <h6 class="text-muted mb-0">{{ $contact->email }}</h6>
                            </div>
                        </div>
                    @endforeach
                    <div class="px-4">
                        <a href="{{ route('admin.contacts.index') }}"
                            class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>
                            View All Messages
                        </a>
                    </div>
                </div>
            </div>
            {{-- <div class="card">
                <div class="card-header">
                    <h4>Visitors Profile</h4>
                </div>
                <div class="card-body">
                    <div id="chart-visitors-profile"></div>
                </div>
            </div> --}}
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('admin/vendors/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('admin/js/pages/dashboard.js') }}"></script>
@endsection
