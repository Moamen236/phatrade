@extends('admin.layouts.app')

@section('title', 'Edit Banner')

@section('page-title', 'Edit Banner')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.banners.index') }}">Banners</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Banner</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.banners.update', $banner) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label for="type" class="form-label">Banner Type</label>
                            <select class="form-control @error('type') is-invalid @enderror" id="type" name="type"
                                required>
                                <option value="">Select Type</option>
                                @foreach (\App\Enums\BannerType::options() as $value => $label)
                                    <option value="{{ $value }}"
                                        {{ old('type', $banner->type) == $value ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label for="title" class="form-label">Banner Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" value="{{ old('title', $banner->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label for="sub_title" class="form-label">Sub Title</label>
                            <input type="text" class="form-control @error('sub_title') is-invalid @enderror"
                                id="sub_title" name="sub_title" value="{{ old('sub_title', $banner->sub_title) }}">
                            @error('sub_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                rows="3">{{ old('description', $banner->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="image" class="form-label">Banner Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                                name="image" accept="image/*">
                            <small class="text-muted">Leave empty to keep current image</small>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <div class="d-flex">
                                @if ($banner->image)
                                    <div>
                                        <label class="form-label d-block">Current Image</label>
                                        <div class="mb-3">
                                            <img src="{{ asset($banner->image) }}" alt="Current Banner"
                                                class="img-thumbnail" style="max-width: 300px;">
                                        </div>
                                    </div>
                                @endif
                                <div id="image-preview" class="mx-5" style="display: none;">
                                    <label class="form-label d-block">New Image Preview</label>
                                    <img src="#" alt="Preview" class="img-thumbnail" style="max-width: 300px;">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary me-2">Update Banner</button>
                    <a href="{{ route('admin.banners.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.getElementById('image').addEventListener('change', function(e) {
            const preview = document.getElementById('image-preview');
            const img = preview.querySelector('img');

            if (e.target.files && e.target.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    img.src = e.target.result;
                    preview.style.display = 'block';
                }

                reader.readAsDataURL(e.target.files[0]);
            }
        });
    </script>
@endsection
