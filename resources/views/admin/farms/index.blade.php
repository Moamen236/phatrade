@extends('admin.layouts.app')

@section('title', 'Farms')

@section('page-title', 'Farms Management')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Farms</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-end align-items-center">
            <a href="{{ route('admin.farms.create') }}" class="btn btn-primary">Add New Farm</a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($farms as $farm)
                        <tr>
                            <td>{{ $farm->name }}</td>
                            <td>{!! Str::limit(strip_tags($farm->description), 100) !!}</td>
                            <td>
                                @if($farm->image_path)
                                    <img src="{{ asset($farm->image_path) }}" alt="Farm Image" class="img-thumbnail"
                                        style="max-height: 50px">
                                @else
                                    <span class="badge bg-light-secondary">No Image</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.farms.edit', $farm) }}" class="btn btn-sm btn-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.farms.destroy', $farm) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
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
