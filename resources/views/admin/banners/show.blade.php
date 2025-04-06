@extends('admin.layouts.app')

@section('title', $banner->title)

@section('page-title', $banner->title)

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.banners.index') }}">Banners</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $banner->title }}</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 mb-4">
                    <img src="{{ asset($banner->image) }}" class="img-fluid rounded" alt="{{ $banner->title }}"
                        style="max-height: 400px; width: 100%; object-fit: cover;">
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Banner Type</label>
                        <div>
                            <span class="badge bg-primary">{{ ucfirst($banner->type->value) }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Banner Title</label>
                        <p class="mb-0">{{ $banner->title }}</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Sub Title</label>
                        <p class="mb-0">{{ $banner->sub_title ?? 'N/A' }}</p>
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Description</label>
                        <p class="mb-0">{{ $banner->description ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('admin.banners.edit', $banner) }}" class="btn btn-primary me-2">
                    <i class="bi bi-pencil"></i> Edit Banner
                </a>
                <a href="{{ route('admin.banners.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Back to List
                </a>
            </div>
        </div>
    </div>
@endsection
