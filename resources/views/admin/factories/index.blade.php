@extends('admin.layouts.app')

@section('title', 'Factories')

@section('page-title', 'Factories Management')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Factories</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-end align-items-center">
            <a href="{{ route('admin.factories.create') }}" class="btn btn-primary">Add New Factory</a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Images</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($factories as $factory)
                        <tr>
                            <td>{{ $factory->name }}</td>
                            <td>{!! Str::limit(strip_tags($factory->description), 50) !!}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    @if ($factory->images)
                                        @foreach (json_decode($factory->images, true) ?? [] as $image)
                                            <img src="{{ asset($image['path']) }}" alt="Factory Image" class="img-thumbnail"
                                                style="width: 50px; height: 50px; object-fit: cover;">
                                        @endforeach
                                    @endif
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('admin.factories.edit', $factory) }}" class="btn btn-sm btn-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.factories.destroy', $factory) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this factory?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
