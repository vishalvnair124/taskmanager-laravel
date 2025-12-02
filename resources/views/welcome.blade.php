@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<div class="py-5 text-center">
    <h1 class="mb-3">Welcome to TaskManager</h1>
    <p class="text-muted mb-4">
        A simple, user-specific task manager built with Laravel.
    </p>

    <a href="{{ route('register.show') }}" class="btn btn-primary">
        Get Started
    </a>
</div>
@endsection