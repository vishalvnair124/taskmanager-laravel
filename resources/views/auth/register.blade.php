@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="form-wrapper">
    <h1 class="page-title">Create Account</h1>

    {{-- Validation Errors --}}
    @if ($errors->any())
    <div class="alert alert-danger mb-3">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('register.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input
                type="text"
                name="phone"
                value="{{ old('phone') }}"
                class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input
                type="password"
                name="password"
                class="form-control">
        </div>

        <div class="mb-4">
            <label class="form-label">Confirm Password</label>
            <input
                type="password"
                name="password_confirmation"
                class="form-control">
        </div>

        <button type="submit" class="btn btn-primary w-100">
            Register
        </button>
    </form>
    <p class="text-center mt-3 mb-0">
        <small>
            Already have an account?
            <a href="{{ route('login') }}">Login</a>
        </small>
    </p>
</div>
@endsection