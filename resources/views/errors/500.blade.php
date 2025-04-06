@extends('layouts.app')

@section('title', 'Error')

@section('content')
<div class="error-container">
    <h1>Oops! Something went wrong</h1>
    <p>We're sorry, but there was an error processing your request.</p>
    <a href="{{ route('home') }}" class="btn">Return to Homepage</a>
</div>
@endsection 