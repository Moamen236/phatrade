@extends('admin.layouts.app')

@section('title', 'Banners')

@section('page-title', 'Banners Management')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Banners</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-end align-items-center">
            <a href="{{ route('admin.banners.create') }}" class="btn btn-primary">Add New Banner</a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($banners as $banner)
                        <tr>
                            <td>{{ $banner->title }}</td>
                            <td>
                                <span class="badge bg-primary">{{ ucfirst($banner->type) }}</span>
                            </td>
                            <td>
                                <img src="{{ asset($banner->image) }}" alt="{{ $banner->title }}" width="100"
                                    height="60" class="rounded object-fit-cover">
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('admin.banners.show', $banner) }}" class="btn btn-sm btn-info me-2"
                                        title="View">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.banners.edit', $banner) }}"
                                        class="btn btn-sm btn-primary me-2">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.banners.destroy', $banner) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
