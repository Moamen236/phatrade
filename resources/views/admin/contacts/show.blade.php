@extends('admin.layouts.app')

@section('title', 'View Message')

@section('page-title', 'Message Details')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.contacts.index') }}">Messages</a></li>
    <li class="breadcrumb-item active" aria-current="page">View Message</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3 row">
                        <label class="form-label fw-bold col-sm-3">From:</label>
                        <p class="mb-1 col-sm-9">{{ $contact->name }}</p>
                    </div>
                    <div class="mb-3 row">
                        <label class="form-label fw-bold col-sm-3">Email:</label>
                        <p class="mb-1 col-sm-9">{{ $contact->email }}</p>
                    </div>
                    <div class="mb-3 row">
                        <label class="form-label fw-bold col-sm-3">Date:</label>
                        <p class="mb-1 col-sm-9">{{ $contact->created_at->format('Y-m-d h:i A') }}</p>
                    </div>
                    <div class="mb-3 row">
                        <label class="form-label fw-bold col-sm-3">Status:</label>
                        <span class="badge {{ $contact->is_read ? 'bg-success' : 'bg-warning' }} col-sm-9" style="width: fit-content;height: fit-content;">
                            {{ $contact->is_read ? 'Read' : 'Unread' }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Message:</label>
                        <div class="p-3 bg-light rounded">
                            {{ $contact->message }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <form action="{{ route('admin.contacts.destroy', $contact) }}" 
                      method="POST" 
                      class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="btn btn-danger" 
                            onclick="return confirm('Are you sure you want to delete this message?')">
                        <i class="bi bi-trash"></i> Delete Message
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection