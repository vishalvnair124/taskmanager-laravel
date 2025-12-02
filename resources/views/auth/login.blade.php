@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="form-wrapper">
    <h1 class="page-title">Login</h1>

    @if ($errors->any())
    <div class="alert alert-danger mb-3">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('login.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input
                type="password"
                name="password"
                class="form-control">
        </div>

        <div class="mb-3 form-check">
            <input
                type="checkbox"
                name="remember"
                class="form-check-input"
                id="rememberCheck">
            <label class="form-check-label" for="rememberCheck">
                Remember me
            </label>
        </div>

        <button type="submit" class="btn btn-primary w-100">
            Login
        </button>
    </form>

    <p class="text-center mt-3 mb-0">
        <small>
            Don't have an account?
            <a href="{{ route('register.show') }}">Register</a>
        </small>
    </p>
</div>
@endsection