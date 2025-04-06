@extends('admin.layouts.app')

@section('title', 'Create Factory')

@section('page-title', 'Create Factory')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.factories.index') }}">Factories</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create Factory</li>
@endsection

@section('styles')
    <link href="{{ asset('admin/vendors/summernote/summernote-bs4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.factories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Factory Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control summernote @error('description') is-invalid @enderror" id="description" name="description"
                                rows="4" required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="images" class="form-label">Factory Images</label>
                            <input type="file" class="form-control @error('images.*') is-invalid @enderror"
                                id="images" name="images[]" accept="image/*" multiple required>
                            <small class="text-muted">Images will be ordered as selected</small>
                            @error('images.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div id="image-preview" class="row g-2 mt-3">
                            <!-- Preview images will be displayed here -->
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary me-2">Create Factory</button>
                    <a href="{{ route('admin.factories.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('admin/vendors/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
@endsection
