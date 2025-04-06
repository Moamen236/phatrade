@extends('admin.layouts.app')

@section('title', 'Edit Factory')

@section('page-title', 'Edit Factory')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.factories.index') }}">Factories</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Factory</li>
@endsection

@section('styles')
    <link href="{{ asset('admin/vendors/summernote/summernote-bs4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.factories.update', $factory) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Factory Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name', $factory->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control summernote @error('description') is-invalid @enderror" id="description"
                                name="description" rows="4" required>{{ old('description', $factory->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="images" class="form-label">Add New Images</label>
                            <input type="file" class="form-control @error('images.*') is-invalid @enderror" id="images"
                                name="images[]" accept="image/*" multiple>
                            <small class="text-muted">New images will be added to the end of the current order</small>
                            @error('images.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <label class="form-label">Current Images</label>
                            <div class="row g-2" id="sortable-images">
                                @foreach(json_decode($factory->images, true) ?? [] as $image)
                                    <div class="col-md-3" data-path="{{ $image['path'] }}">
                                        <div class="card">
                                            <img src="{{ asset($image['path']) }}" 
                                                class="card-img-top" 
                                                style="height: 200px; object-fit: cover;"
                                                alt="Factory Image">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span class="order-number">Order: {{ $image['order'] + 1 }}</span>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        onclick="removeImage(this, '{{ $image['path'] }}')">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div id="image-preview" class="row g-2 mt-3">
                            <!-- Preview of new images will be displayed here -->
                        </div>
                    </div>
                </div>

                <input type="hidden" name="removed_images" id="removed-images" value="">
                <input type="hidden" name="image_orders" id="image-orders" value="">

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary me-2">Update Factory</button>
                    <a href="{{ route('admin.factories.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('admin/vendors/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/sortable/sortable.min.js') }}"></script>
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
        let removedImages = [];

        // Initialize Sortable
        new Sortable(document.getElementById('sortable-images'), {
            animation: 150,
            onEnd: function() {
                updateImageOrders();
            }
        });

        // Call updateImageOrders on page load to initialize the orders
        document.addEventListener('DOMContentLoaded', function() {
            updateImageOrders();
        });

        function removeImage(button, imagePath) {
            const imageContainer = button.closest('.col-md-3');
            imageContainer.remove();
            removedImages.push(imagePath);
            document.getElementById('removed-images').value = JSON.stringify(removedImages);
            updateImageOrders();
        }

        function updateImageOrders() {
            const containers = document.querySelectorAll('#sortable-images .col-md-3');
            const orders = {};
            
            containers.forEach((container, index) => {
                const path = container.dataset.path;
                orders[path] = index;
                container.querySelector('.order-number').textContent = `Order: ${index + 1}`;
            });

            document.getElementById('image-orders').value = JSON.stringify(orders);
        }

        // Preview new images
        document.getElementById('images').addEventListener('change', function(e) {
            const previewContainer = document.getElementById('image-preview');
            previewContainer.innerHTML = '';

            Array.from(e.target.files).forEach((file, index) => {
                const col = document.createElement('div');
                col.className = 'col-md-3';

                const card = document.createElement('div');
                card.className = 'card';

                const img = document.createElement('img');
                img.src = URL.createObjectURL(file);
                img.className = 'card-img-top';
                img.style.height = '200px';
                img.style.objectFit = 'cover';

                const cardBody = document.createElement('div');
                cardBody.className = 'card-body text-center';
                cardBody.innerHTML = `<p class="card-text">New Image ${index + 1}</p>`;

                card.appendChild(img);
                card.appendChild(cardBody);
                col.appendChild(card);
                previewContainer.appendChild(col);
            });
        });
    </script>
@endsection